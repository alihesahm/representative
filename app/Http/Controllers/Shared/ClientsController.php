<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\CreateClientRequest;
use App\Models\Client;
use phpDocumentor\Reflection\Types\This;


class ClientsController extends Controller
{

    public function list()
    {
        $clients = Client::query()->select(['id', 'name'])->get();
        return sendSuccessResponse(data:$clients);
    }
    public function store(CreateClientRequest $request)
    {
        $data = $request->validated();
        auth()->user()->clients()->create($data);
        return sendSuccessResponse();
    }
}
