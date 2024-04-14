<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Resources\Visit\VisitResource;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function visitsRepote(Request $request): JsonResponse
    {
        $visits = Visit::query()
            ->when($request->start_date && $request->end_date,function($quary) use($request){

                return $quary->whereBetween('created_at',
                    [
                        Carbon::parse($request->start_date)->startOfDay(),
                        Carbon::parse($request->end_date)->endOfDay()
                    ]
                );
            })
            ->when($request->broker_id,function($query) use($request){
                return $query->where('broker_id',$request->broker_id);
            })
            ->get();

        return sendSuccessResponse(data:VisitResource::collection($visits));
    }
}
