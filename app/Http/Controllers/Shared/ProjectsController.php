<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\LocationRequest;
use App\Http\Requests\Projects\CreateProjecteRequest;
use App\Http\Resources\Location\LocationResource;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function list(Request $request)
    {
        $projects = Project::query()->when($request->searsh,function ($query) use($request){
            return $query->where('name','like','%'.$request->searsh.'%');
        })->select(['id', 'name'])->get();
        return sendSuccessResponse(data:$projects);
    }


    public function store(CreateProjecteRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data['project']);
        $project->location = $project->locations()->create($data['location']);

        return sendSuccessResponse('Project created successfully', data:ProjectResource::make($project));
    }

    public function projectLocation(Project $project, LocationRequest $request):JsonResponse
    {
        $data = $request->validated();
        $location = $project->locations()->create($data);
        return sendSuccessResponse('Location created successfully',data: LocationResource::make($location));
    }

    public function index(Project $project,Request $request):JsonResponse
    {
        $locations = $project->locations()->when($request->serash, function ($query) use($request){
            return $query->where('neighborhood','like','%'.$request->searsh.'%');
        })->get();
        return sendSuccessResponse(data:  LocationResource::collection($locations));
    }



}
