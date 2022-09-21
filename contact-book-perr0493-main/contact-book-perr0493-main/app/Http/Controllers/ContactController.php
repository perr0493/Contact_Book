<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

  public function index() {

    $title = 'Contacts';
    $search = request('search');

    if ($search) {
      $contacts = Contact::where('name', 'LIKE', "%$search%")
        ->orWhere('email', 'LIKE', "%$search%")
        ->get();
    } else {
      $contacts = Contact::all();
    }
      return response()->json($contacts, 200);
  }

  public function show ($id) {
    $contact = Contact::find($id);
    return response()->json($contact, 200);
  }

  public function store () {
    $contact = new Contact();
    $contact->first_name = request('first_name');
    $contact->last_name = request('last_name');
    $contact->email = request('email');
    $contact->save();

    return response()->json($contact, 201);
  }

  public function update ($id) {
    $contact = Contact::find($id);
    $contact->first_name = request('first_name');
    $contact->last_name = request('last_name');
    $contact->email = request('email');
    $contact->save();

    return response()->json($contact, 200);
  }

  public function destroy ($id) {
    $contact = Contact::find($id);
    $contact->delete();

    return response()->json($contact, 200);
  }

}