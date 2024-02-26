<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CreateProjecteRequest;
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
        Project::create($data);
        return sendSuccessResponse();
    }
}
