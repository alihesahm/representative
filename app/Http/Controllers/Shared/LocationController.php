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
    public function index(Client $client,Request $request):JsonResponse
    {
        $locations = $client->locations()->when($request->serash, function ($query) use($request){
            return $query->where('neighborhood','like','%'.$request->searsh.'%');
        })->get();
        return sendSuccessResponse(data:  LocationResource::collection($locations));
    }

    public function store(Client $client, LocationRequest $request):JsonResponse
    {
        $data = $request->validated();
        $location = $client->locations()->create($data);
        return sendSuccessResponse('Location created successfully',data: LocationResource::make($location));
    }

}
