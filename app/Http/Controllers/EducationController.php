<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    // list for admin page
    public function list()
    {
        return view('education.list', [
            'education' => Education::where('user_id', '=', Auth::user()->id)->get()
        ]);
    }

    // add form for admin page
    public function addForm()
    {
        return view('education.add', [
            'levels' => EducationLevel::all(),
        ]);
    }

    // add education for admin page
    public function add()
    {

        $attributes = request()->validate([
            'institution' => 'required',
            'field' => 'required',
            'start' => 'required',
            'completion' => 'required',
            'education_level_id' => 'required',
        ]);

        $education = new Education();
        $education->institution = $attributes['institution'];
        $education->field = $attributes['field'];
        $education->start = $attributes['start'];
        $education->completion = $attributes['completion'];
        $education->education_level_id = $attributes['education_level_id'];
        $education->user_id = Auth::user()->id;
        $education->save();

        return redirect('/console/education/list')
            ->with('message', 'Education has been added!');
    }

    // edit form for admin page
    public function editForm(Education $education)
    {
        return view('education.edit', [
            'education' => $education,
            'levels' => EducationLevel::all(),
        ]);
    }

    // edit education
    public function edit(Education $education)
    {
        $attributes = request()->validate([
            'institution' => 'required',
            'field' => 'required',
            'start' => 'required',
            'completion' => 'required',
            'education_level_id' => 'required',
        ]);

        $education->institution = $attributes['institution'];
        $education->field = $attributes['field'];
        $education->start = $attributes['start'];
        $education->completion = $attributes['completion'];
        $education->education_level_id = $attributes['education_level_id'];
        $education->save();

        return redirect('/console/education/list')
            ->with('message', 'Education has been edited!');
    }

    // delete for admin page
    public function delete($id)
    {
        Education::destroy($id);

        return redirect('/console/education/list')
            ->with('message', 'Education has been deleted!');
    }

    // API -> GET: api/education
    public function getAll()
    {
        return Education::all();
    }
}
