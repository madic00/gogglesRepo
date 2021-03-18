<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

class ContactController extends MyBaseController
{
    
    public function index() 
    {
        return view('client.pages.contact', $this->data);
    }

    public function store(ContactRequest $request) 
    {
        $name = $request->name;
        $subject = $request->subject;
        $email = $request->email;
        $message = $request->message;

        $toEmail = "goggles@alemadic.com";
        $body = "<h2>Contact Request</h2>
                <h4>Name</h4><p>{$name}</p>
                <h4>Email</h4><p>{$email}</p>
                <h4>Message</h4><p>{$message}</p> 
        ";

        // Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

        // Additional Headers
        $headers .= "From: " .$name. "<".$email.">". "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
            return response(['message' => 'Your email has been sent'], Response::HTTP_OK);
            
        } else {
            return response(['message' => 'Your email was not sent. Try again later'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
