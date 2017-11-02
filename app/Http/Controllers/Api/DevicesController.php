<?php

namespace App\Http\Controllers\Api;

use App\Device;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    /**
     * Return all devices
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Device $devices)
    {
        return $devices::all();
    }
}
