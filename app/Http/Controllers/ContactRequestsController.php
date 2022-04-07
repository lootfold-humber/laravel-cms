<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestsController extends Controller
{
    public function list()
    {
        return view('contactRequests.list', [
            'contact_requests' => ContactRequest::all()
        ]);
    }

    public function getAll()
    {
        return ContactRequest::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        return ContactRequest::create($request->all());
    }
}
