<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateRequest;
use App\Models\Contact;
class ContactController extends Controller
{
    public function submit(ValidateRequest $req) {

        $contact = new Contact();
        $contact->login =$req->input('login');
        $contact->password =$req->input('password');
        $contact->save();

        return redirect()->route('home')->with('success','Данные были сохранены');
    }

    public function allContacts() {
        return view('contactsList',['data' => Contact::all()]);
    }
}
