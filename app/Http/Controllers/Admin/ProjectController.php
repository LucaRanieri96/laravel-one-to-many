<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc("id")->get();
        
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        //dd($request->all());

        $valData =  $request->validated();

        $valData['slug'] = Project::generateSlug($valData['name']);

        $valData['repoUrl'] = Project::generateRepoUrl($valData['slug']);

        $valData["startingDate"] = date("Y-m-d") . " " . date("H:i:s");

        //dd($valData);

        Project::create($valData);

        return to_route("admin.projects.index")->with("message", "Project successfully inserted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $valData =  $request->validated();

        $valData['slug'] = Project::generateSlug($valData['name']);

        $valData['repoUrl'] = Project::generateRepoUrl($valData['slug']);

        $valData["startingDate"] = date("Y-m-d") . " " . date("H:i:s");

        Project::create($valData);

        return to_route("admin.projects.index")->with("message", "Project successfully inserted");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route("admin.projects.index")->with("message", "Project deleted");
    }
}
