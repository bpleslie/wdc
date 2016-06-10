<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorCreateRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Doctor;

class DoctorController extends Controller
{
    protected $fields = [
        'name' => '',
        'street' => '',
        'city' => '',
        'state' => '',
        'postcode' => '',
        'country' => '',
        'description' => '',
        'type' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
    ];

    /**
     * Display a listing of the tags.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('admin.doctor.index')
            ->withDoctors($doctors);
    }

    /**
     * Show form for creating new doctor
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.doctor.create', $data);
    }

    /**
     * Store the newly created doctor in the database.
     *
     * @param DoctorCreateRequest $request
     * @return Response
     */
    public function store(DoctorCreateRequest $request)
    {
        $doctor = new Doctor();
        foreach (array_keys($this->fields) as $field) {
            $doctor->$field = $request->get($field);
        }
        $doctor->save();

        return redirect('/admin/doctor')
            ->withSuccess("The doctor '$doctor->doctor' was created.");
    }

    /**
     * Show the form for editing a doctor
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $doctor->$field);
        }

        return view('admin.doctor.edit', $data);
    }

    /**
     * Update the doctor in storage
     *
     * @param DoctorUpdateRequest $request
     * @param int  $id
     * @return Response
     */
    public function update(DoctorUpdateRequest $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['doctor'])) as $field) {
            $doctor->$field = $request->get($field);
        }
        $doctor->save();

        return redirect("/admin/doctor/$id/edit")
            ->withSuccess("Changes saved.");
    }

    /**
     * Delete the doctor
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect('/admin/doctor')
            ->withSuccess("The '$doctor->doctor' doctor has been deleted.");
    }
}
