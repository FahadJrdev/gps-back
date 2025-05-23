<?php

namespace App\Http\Controllers;

use App\Http\Requests\GpsDeviceStoreRequest;
use App\Http\Requests\GpsDeviceUpdateRequest;
use App\Http\Resources\GpsDeviceCollection;
use App\Http\Resources\GpsDeviceResource;
use App\Models\GpsDevice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GpsDeviceController extends Controller
{
    public function index(Request $request): Response
    {
        $gpsDevices = GpsDevice::all();

        return new GpsDeviceCollection($gpsDevices);
    }

    public function store(GpsDeviceStoreRequest $request): Response
    {
        $gpsDevice = GpsDevice::create($request->validated());

        return new GpsDeviceResource($gpsDevice);
    }

    public function show(Request $request, GpsDevice $gpsDevice): Response
    {
        return new GpsDeviceResource($gpsDevice);
    }

    public function update(GpsDeviceUpdateRequest $request, GpsDevice $gpsDevice): Response
    {
        $gpsDevice->update($request->validated());

        return new GpsDeviceResource($gpsDevice);
    }

    public function destroy(Request $request, GpsDevice $gpsDevice): Response
    {
        $gpsDevice->delete();

        return response()->noContent();
    }
}
