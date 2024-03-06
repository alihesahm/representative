<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\LocationRequest;
use App\Http\Resources\Location\LocationResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Client $client):JsonResponse
    {
        $locations = $client->locations;
        return sendSuccessResponse(data:  LocationResource::collection($locations));
    }

    public function store(Client $client, LocationRequest $request):JsonResponse
    {
        $data = $request->validated();
        $location = $client->locations()->create($data);
        return sendSuccessResponse('Location created successfully',data: LocationResource::make($location));
    }

}
