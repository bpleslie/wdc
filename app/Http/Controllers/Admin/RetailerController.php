<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RetailerCreateRequest;
use App\Http\Requests\RetailerUpdateRequest;
use App\Retailer;

class RetailerController extends Controller
{
    protected $fields = [
        'name' => '',
        'street' => '',
        'city' => '',
        'state' => '',
        'postcode' => '',
        'country' => '',
        'meta_description' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
    ];

    /**
     * Display a listing of the tags.
     */
    public function index()
    {
        $retailers = Retailer::all();

        return view('admin.retailer.index')
            ->withRetailers($retailers);
    }

    /**
     * Show form for creating new retailer
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.retailer.create', $data);
    }

    /**
     * Store the newly created retailer in the database.
     *
     * @param RetailerCreateRequest $request
     * @return Response
     */
    public function store(RetailerCreateRequest $request)
    {
        $retailer = new Retailer();
        foreach (array_keys($this->fields) as $field) {
            $retailer->$field = $request->get($field);
        }
        
        // calculate the lat / long & save
        $latLong = $this->getLatLong($request);

        if ( $latLong[0] ) {
            $retailer->lat = $latLong[0];
        }

        if ( $latLong[1] ) {
            $retailer->long = $latLong[1];
        }

        $retailer->save();

        return redirect('/admin/retailer')
            ->withSuccess("The retailer '$retailer->retailer' was created.");
    }

    /**
     * Show the form for editing a retailer
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $retailer = Retailer::findOrFail($id);
        $data = ['id' => $id, 'retailer' => $retailer ];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $retailer->$field);
        }

        $latLong = $this->getLatLong($data);
        $data['lat'] = old('lat', $latLong[0]);
        $data['long'] = old('long', $latLong[1]);

        return view('admin.retailer.edit', $data);
    }

    /**
     * Update the retailer in storage
     *
     * @param RetailerUpdateRequest $request
     * @param int  $id
     * @return Response
     */
    public function update(RetailerUpdateRequest $request, $id)
    {
        $retailer = Retailer::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['retailer'])) as $field) {
            $retailer->$field = $request->get($field);
        }

        // calculate the lat / long & save
        $latLong = $this->getLatLong($request);

        if ( $latLong[0] ) {
            $retailer->lat = $latLong[0];
        }

        if ( $latLong[1] ) {
            $retailer->long = $latLong[1];
        }

        // save retailer
        $retailer->save();

        return redirect("/admin/retailer/$id/edit")
            ->withSuccess("Changes saved.");
    }

    /**
     * Delete the retailer
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $retailer = Retailer::findOrFail($id);
        $retailer->delete();

        return redirect('/admin/retailer')
            ->withSuccess("The '$retailer->retailer' retailer has been deleted.");
    }

    public function getLatLong( $request )
    {
        if ( is_array($request) ) {
            $address = str_replace(" ", "+", $request['street'] ) . '+'. $request['city'] . '+' . $request['state'] . '+' . $request['postcode'];
            $region = $request['state'];
        }
    else {
            $address = str_replace(" ", "+", $request->street ) . '+'. $request->city . '+' . $request->state . '+' . $request->postcode;
            $region = $request->state;
        }

        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
        $json = json_decode($json);

        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

        return [$lat , $long];
    }
}
