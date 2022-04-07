<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestsController extends Controller
{
    // list for admin page
    public function list()
    {
        return view('contactRequests.list', [
            'contact_requests' => ContactRequest::all()
        ]);
    }

    // delete for admin page
    public function delete($id)
    {
        ContactRequest::destroy($id);

        return redirect('/console/contactrequests/list')
            ->with('message', 'Contact Request has been deleted!');
    }

    // API -> GET: api/contactrequests
    public function getAll()
    {
        return ContactRequest::all();
    }

    // API -> POST: api/contactrequests
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
