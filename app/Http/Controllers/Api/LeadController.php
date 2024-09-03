<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewLeadMarkdownMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'message' => 'required|min:30',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('info@boolean.com')->send(new NewLeadMarkdownMessage($newLead));

        return response()->json([
            'success' => true
        ]);
    }
}
