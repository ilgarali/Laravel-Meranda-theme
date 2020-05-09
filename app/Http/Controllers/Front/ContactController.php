<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;

class ContactController extends Controller
{

   
    public function contact() {
        return view('front.contact');
    }
 
    public function contactus(Request $request){
     $request->validate([
         'fname' => 'required | min:5 | max:55',
         'lname' => 'required | min:5 | max:55',
         'eaddress' => 'required | min:5 | max:55 | email',
         'tel' => 'required | min:5 | max:55',
         'message' => 'required | min:5 ',
     ]);
 
    
         $contact = new Contact();
         $contact->first = $request->fname;
         $contact->last = $request->lname;
         $contact->email = $request->eaddress;
         $contact->number = $request->tel;
         $contact->message = $request->message;
         $contact->save();
         return redirect()->route('contact')->with('success','Mesajiniz gonderildi');
     
 
    }
}
