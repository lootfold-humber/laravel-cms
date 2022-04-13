<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactRequestsController extends Controller
{
    // list for admin page
    public function list()
    {
        return view('contactRequests.list', [
            'contact_requests' => ContactRequest::where('user_id', '=', Auth::user()->id)->get()
        ]);
    }

    // delete for admin page
    public function delete($id)
    {
        ContactRequest::destroy($id);

        return redirect('/console/contactrequests/list')
            ->with('message', 'Contact Request has been deleted!');
    }

    // API -> GET: api/contactrequests/{userId}
    public function getAll($userId)
    {
        return ContactRequest::where('user_id', '=', $userId)->get();;
    }

    // API -> POST: api/contactrequests
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'user_id' => 'required',
        ]);

        return ContactRequest::create($request->all());
    }
}
