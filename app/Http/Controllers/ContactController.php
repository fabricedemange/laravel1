<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use \App\Mail\Contact;
 
class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
 
    public function store(ContactRequest $request)
    {
        Mail::to('270b66f919aaeb@mailtrap.io')
            ->send(new Contact($request->except('_token')));
        return view('confirm');
    }
}