<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceHistoryStoreRequest;
use App\Http\Requests\ServiceHistoryUpdateRequest;
use App\Http\Resources\ServiceHistoryCollection;
use App\Http\Resources\ServiceHistoryResource;
use App\Models\ServiceHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceHistoryController extends Controller
{
    public function index(Request $request): Response
    {
        $serviceHistories = ServiceHistory::all();

        return new ServiceHistoryCollection($serviceHistories);
    }

    public function store(ServiceHistoryStoreRequest $request): Response
    {
        $serviceHistory = ServiceHistory::create($request->validated());

        return new ServiceHistoryResource($serviceHistory);
    }

    public function show(Request $request, ServiceHistory $serviceHistory): Response
    {
        return new ServiceHistoryResource($serviceHistory);
    }

    public function update(ServiceHistoryUpdateRequest $request, ServiceHistory $serviceHistory): Response
    {
        $serviceHistory->update($request->validated());

        return new ServiceHistoryResource($serviceHistory);
    }

    public function destroy(Request $request, ServiceHistory $serviceHistory): Response
    {
        $serviceHistory->delete();

        return response()->noContent();
    }
}
