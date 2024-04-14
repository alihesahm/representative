<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function visitsRepote(Request $request): JsonResponse
    {
        $visits = Visit::query()
            ->whereBetween('created_at',
                [
                    Carbon::parse($request->start_date)->startOfDay(),
                    Carbon::parse($request->end_date)->endOfDay()
                ]
            );
        return sendSuccessResponse();
    }
}
