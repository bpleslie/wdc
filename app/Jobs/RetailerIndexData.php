<?php

namespace App\Jobs;

use App\Retailer;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\SelfHandling;

class RetailerIndexData extends Job implements SelfHandling
{
    protected $retailer;

    /**
     * Constructor
     *
     * @param string|null $retailer
     */
    public function __construct($retailer)
    {
        $this->retailer = $retailer;
    }

    /**
     * Execute the command.
     *
     * @return array
     */
    public function handle()
    {
        if ($this->retailer) {
            return $this->retailerIndexData($this->retailer);
        }

        return $this->normalIndexData();
    }

    /**
     * Return data for normal index page
     *
     * @return array
     */
    protected function normalIndexData()
    {
        $retailers = Retailer::all();

        return [
            'name' => config('retailer.name'),
            'street' => config('retailer.street'),
            'retailers' => $retailers,
            'meta_description' => config('retailer.description'),
            'reverse_direction' => false,
            'retailer' => null,
        ];
    }

    /**
     * Return data for a retailer index page
     *
     * @param string $retailer
     * @return array
     */
    protected function retailerIndexData($retailer)
    {
        $retailer = Retailer::where('id', $retailer->id)->firstOrFail();
        $reverse_direction = (bool)$retailer->reverse_direction;

        return [
            'title' => $retailer->title,
            'subtitle' => $retailer->subtitle,
            'retailer' => $retailer,
            'reverse_direction' => $reverse_direction,
            'meta_description' => $retailer->meta_description ?: config('retailer.description'),
        ];
    }
}
