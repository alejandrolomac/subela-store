<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function message(Request $request)
    {
        $message = new Contact;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->body = $request->body;
        $message->save();
        return redirect('/contact')->with('status', 'Mensaje Enviado');
    }

    public function messages()
    {
        $messages = Contact::paginate();

        return view('contact.index', compact('messages'));
    }
    
}
