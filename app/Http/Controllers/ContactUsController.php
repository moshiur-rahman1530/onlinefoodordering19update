<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUs;
use App\Mail\ContactReply;
use App\sendMail;
Use Auth;


class ContactUsController extends Controller
{
   

    public function contactUS(){
        return view('pages.contact');
        }
        public function send(Request $request)
        {
         $this->validate($request, [
          'name'     =>  'required|min:4|alpha|max:40',
          'email'  =>  'required|email',
          'message' =>  'required|min:4|string'
         ]);
    
            $data = array(
                'name'      =>  $request->name,
                'email'      =>  $request->email,
                'message'   =>   $request->message
            );
        sendMail::create($request->all());
         Mail::to('moshiurmanderpur@gmail.com')->send(new contactUs($data));
         //Notification::send($user, new contactUs($data));
         return back()->with('success', 'Thanks for contacting us!');
    
        }

        public function showMessege( Request $request,$id){
            $contact=sendMail::find($id);
            //dd($contact);
            return view('admin.partial.viewmessage',compact('contact'));
        }
        public function contact_reply(Request $request)
        {
            $data=$request->all();
            $message=$data['reply'];
           // dd($message);
            $contact=sendMail::find($data['id']);
            Mail::to($contact->email)->send(new ContactReply($data));
            echo 'Succes';
        }
    }

