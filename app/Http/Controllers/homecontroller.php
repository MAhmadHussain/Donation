<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
class homecontroller extends Controller
{
    function loadcontact(Request $req){
      $contact = new contact;
      $contact->name = $req->name;
      $contact->email = $req->email;
      $contact->subject = $req->subject;
      $contact->message = $req->message;
      $contact->save();
      return redirect('/');
    }
}
