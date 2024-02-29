<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Broker\StoreBrokerRequest;
use App\Http\Resources\Broker\BrokerResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $data = $request->validated();
        $broker = Broker::query()->create($data);
        return sendSuccessResponse('Broker created successfully',data: BrokerResource::make($broker));
    }

}
