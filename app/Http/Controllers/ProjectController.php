<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ProjectResource::collection(Project::with('skill')->get());
        return Inertia::render('Projects/Index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();

        return Inertia::render('Projects/Create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'skill_id' => ['required'],
            'name' => ['required', 'min:3'],
            'image' => ['nullable', 'image'],
        ]);

        $image = NULL;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects');
        }
        Project::create([
            'skill_id' => $request->skill_id,
            'name' => $request->name,
            'image' => $image,
            'project_url' => $request->project_url
        ]);

        return Redirect::route('projects.index')->with('message', 'Project Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $skills = Skill::all();
        return Inertia::render('Projects/Edit', compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'skill_id' => ['required'],
            'name' => ['required', 'min:3'],
            'image' => ['nullable', 'image'],
        ]);

        $image = $project->image;

        if ($request->hasFile('image')) {
            if ($project->image && Storage::exists($project->image)) {
                Storage::delete($project->image);
            }
            $image = $request->file('image')->store('skills');
        }

        $project->update([
            'skill_id' => $request->skill_id,
            'name' => $request->name,
            'image' => $image,
            'project_url' => $request->project_url
        ]);

        return Redirect::route('projects.index')->with('message', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image && Storage::exists($project->image)) {
            Storage::delete($project->image);
        }

        $project->delete();
        return Redirect::route('projects.index')->with('message', 'Project Deleted Successfully');
    }
}
