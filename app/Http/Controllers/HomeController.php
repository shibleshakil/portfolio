<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Resources\SkillResource;

class HomeController extends Controller
{
    public function welcome(){

        $skills = SkillResource::collection(Skill::all());

        return Inertia::render('Welcome', compact('skills'));
    }
}
