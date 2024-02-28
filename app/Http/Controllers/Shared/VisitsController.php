<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\CreateVisitRequest;
use App\Http\Resources\Visit\VisitResource;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function store(CreateVisitRequest $request)
    {
        $data = $request->validated();
        $visit = auth()->user()->visits()->create($data);
        return sendSuccessResponse('Visit created successfully', data:VisitResource::make($visit));
    }
}
