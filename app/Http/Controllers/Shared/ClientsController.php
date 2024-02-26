<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\CreateClientRequest;
use App\Models\Client;


class ClientsController extends Controller
{

    public function list()
    {
        $clients = Client::query()->select(['id', 'name'])->get();
        return sendSuccessResponse(data:$clients);
    }
    public function start(CreateClientRequest $request)
    {
        $data = $request->validated();
        Client::create($data);
        return sendSuccessResponse();
    }
}
