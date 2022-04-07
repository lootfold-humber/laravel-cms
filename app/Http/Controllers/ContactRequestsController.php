<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestsController extends Controller
{
    public function getAll()
    {
        return ContactRequest::collection(ContactRequest::all());
    }

    public function list()
    {
        return view('contactRequests.list', [
            'contact_requests' => ContactRequest::all()
        ]);
    }
}
