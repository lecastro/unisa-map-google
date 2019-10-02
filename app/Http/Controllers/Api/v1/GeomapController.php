<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Geomap;

class GeomapController extends Controller
{
    private $geomap;

    public function __construct(Geomap $geomap)
    {
        $this->geomap = $geomap;
    }

    public function index()
    {
        $response = $this->geomap->getResults();

        return response()->json($response);
    }

}
