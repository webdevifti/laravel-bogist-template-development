<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactAddress;
use Exception;
use Illuminate\Http\Request;

class ContactAddressController extends Controller
{
    //
    public function index(){
        $contact_data = ContactAddress::limit(1)->first();
        return view('admin.contact.index', compact('contact_data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'contact_content' => 'required',
            'contact_address' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required'
        ]);

        try{
            $contact = ContactAddress::findOrFail($id);
            $contact->contact_content = $request->contact_content;
            $contact->address = $request->contact_address;
            $contact->contact_number = $request->contact_number;
            $contact->email_address = $request->email_address;
            $contact->save();
            return back()->with('success', 'Save Changed!');
        }catch(Exception $e){
            return back()->with('error', 'Somwthing happened Wrong!');
        }
    }
}
