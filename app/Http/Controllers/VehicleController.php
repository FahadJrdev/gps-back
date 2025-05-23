<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    public function index(Request $request): Response
    {
        $vehicles = Vehicle::all();
    }

    public function store(VehicleStoreRequest $request): Response
    {
        $vehicle = Vehicle::create($request->validated());

        return new VehicleResource($vehicle);
    }

    public function show(Request $request, Vehicle $vehicle): Response
    {
        {{ body }}
    }

    public function update(VehicleUpdateRequest $request, Vehicle $vehicle): Response
    {
        $vehicle->update($request->validated());

        return new VehicleResource($vehicle);
    }

    public function destroy(Request $request, Vehicle $vehicle): Response
    {
        $vehicle->delete();

        return response()->noContent();
    }
}
