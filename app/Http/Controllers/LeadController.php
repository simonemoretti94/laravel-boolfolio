<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function create()
    {
        return view('guests.leads.create');
    }

    public function store(Request $request)
    {
        //dd($request);

        //validate
        $val_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:2000',
        ]);

        //create
        $newLead = Lead::create($val_data);

        //send email
        Mail::to('noreply@boolfolio.com')->send(new NewLeadMarkdown($newLead));

        //redirect
        return back()->with('Message' , 'Message sent successfully');
    }
}
