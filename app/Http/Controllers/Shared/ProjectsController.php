<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CreateProjecteRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function list()
    {
        $projects = Project::query()->select(['id', 'name'])->get();
        return sendSuccessResponse(data:$projects);
    }
    public function store(CreateProjecteRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data);
        return sendSuccessResponse('Project created successfully', data:ProjectResource::make($project));
    }
}
