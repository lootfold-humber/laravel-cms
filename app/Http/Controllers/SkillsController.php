<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    // list for admin page
    public function list()
    {
        return view('skills.list', [
            'skills' => Skill::where('user_id', '=', Auth::user()->id)->get()
        ]);
    }

    // add form for admin page
    public function addForm()
    {
        return view('skills.add');
    }

    // add skill for admin page
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'confidence' => 'required',
            'reference_url' => 'nullable|url',
        ]);

        $skill = new Skill();
        $skill->name = $attributes['name'];
        $skill->reference_url = $attributes['reference_url'];
        $skill->confidence = $attributes['confidence'];
        $skill->user_id = Auth::user()->id;
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been added!');
    }

    // edit form for admin page
    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function edit(Skill $skill)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'confidence' => 'required',
            'reference_url' => 'nullable|url',
        ]);

        $skill->name = $attributes['name'];
        $skill->reference_url = $attributes['reference_url'];
        $skill->confidence = $attributes['confidence'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been edited!');
    }

    // delete for admin page
    public function delete($id)
    {
        Skill::destroy($id);

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been deleted!');
    }

    // API -> GET: api/skills
    public function getAll()
    {
        return Skill::all();
    }
}
