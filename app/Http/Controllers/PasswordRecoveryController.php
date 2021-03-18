<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Http\Response;
use App\Http\Requests\CreatePasswordRequest;

class PasswordRecoveryController extends MyBaseController
{
    public function create() 
    {
        return view('client.pages.passwordReset', $this->data);
    }

    public function reset(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $token = random_bytes(32);

        $url = "http://www.goggles.alemadic.com/password/new?validator=" . bin2hex($token);

        $expires = date("U") + 3600;

        $pwd = PasswordReset::where('email', '=', $request->email)->delete();

        $newPwd = PasswordReset::create(['email' => $request->email, 'token' => password_hash($token, PASSWORD_DEFAULT), 'expires' => $expires]);

        $subject = "Reset your password for goggles.com";
        $email = "goggless@alemadic.com";
        
        $message = "<p>We received a password reset request. The link to reset your password is bellow. If you didn't make this request, you can ignore this email</p>";
        $message .= "<p>Here is your password reset link: <br />";
        $message .= "<a href='$url'>$url</a></p>";

        $toEmail = $request->email;
        $body = "<h2>{$subject}</h2>
                <h4>Email</h4><p>info@goggles.com</p>
                <h4>Message</h4>{$message} 
        ";

        // Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

        // Additional Headers
        $headers .= "From: goggles.com " . "<".$email.">". "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
            return response(['message' => 'Check your email!'], Response::HTTP_OK);
        } else {
            return response(['message' => 'Your email was not sent. Try again later'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function edit() 
    {
        return view('client.pages.passwordNew', $this->data);
    }

    public function update(CreatePasswordRequest $request) 
    {
        $currentDate = date("U");

        $passObj = PasswordReset::where("token", "=", $request->validatorToken)
                                ->where("expires", '>=', $currentDate)    
                                ->first();

        if($passObj) {
            $userObj = User::where('email', '=', $passObj->email)->first();

            if($userObj) {
                $userObj->password = md5($request->password);

                $userObj->save();

                return response(['message' => 'You have been successfully changed your password'], Response::HTTP_OK);
            } else {
                return response(['message' => 'You must submit a new request from the beginning'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } else {
            return response(['message' => 'You need to re-submit you reset request.'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }

}
