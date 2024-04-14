<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\CreateClientRequest;
use App\Http\Resources\Client\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function list(Request $request)
    {
        $clients = Client::query()->when($request->searsh,function ($query) use($request){
            return $query->where('name','like','%'.$request->searsh.'%');
        })->select(['id', 'name'])->get();
        return sendSuccessResponse(data:$clients);
    }


    public function store(CreateClientRequest $request)
    {
        $data = $request->validated();
        $client = auth()->user()->clients()->create($data['client']);
        $client->location = $client->locations()->create($data['location']);
        return sendSuccessResponse('Client created successfully',data: ClientResource::make($client));
    }
}
