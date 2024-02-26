<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\CreateVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function store(CreateVisitRequest $request)
    {
        $data = $request->validated();
        Visit::create($data);
        return sendSuccessResponse();
    }
}
