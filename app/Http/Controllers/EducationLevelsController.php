<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelsController extends Controller
{
    // list for admin page
    public function list()
    {
        return view('educationLevels.list', [
            'education_levels' => EducationLevel::all()
        ]);
    }

    // add form for admin page
    public function addForm()
    {
        return view('educationLevels.add');
    }

    // add education level for admin page
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $education_level = new EducationLevel();
        $education_level->name = $attributes['name'];
        $education_level->save();

        return redirect('/console/educationlevels/list')
            ->with('message', 'Education Level has been added!');
    }

    // edit form for admin page
    public function editForm(EducationLevel $education_level)
    {
        return view('educationLevels.edit', [
            'edu' => $education_level,
        ]);
    }

    // edit education level
    public function edit(EducationLevel $education_level)
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $education_level->name = $attributes['name'];
        $education_level->save();

        return redirect('/console/educationlevels/list')
            ->with('message', 'Education Level has been edited!');
    }

    // delete for admin page
    public function delete($id)
    {
        EducationLevel::destroy($id);

        return redirect('/console/educationlevels/list')
            ->with('message', 'Education Level has been deleted!');
    }

    // API -> GET: api/educationlevels
    public function getAll()
    {
        return EducationLevel::all();
    }
}
