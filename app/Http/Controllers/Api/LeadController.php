<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use App\Mail\NewLeadMarkdown;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        // validate user inputs
        $validator = Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if($validator->fails())
        {
            // return an error response
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // create a lead into db
        $newLead = Lead::create($request->all());

        // send email
        Mail::to('noreply@boolfolio.com')->send(new NewLeadMarkdown($newLead));

        return response()->json([
            'success' => true,
            'results' => $request->all(),
        ]);
    }
}
