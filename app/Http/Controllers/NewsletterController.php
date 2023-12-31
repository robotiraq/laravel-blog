<?php

namespace App\Http\Controllers;

use App\services\MailchimpNewsletter;

use App\services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{


    public function __invoke(Newsletter $newsletter)

    {
        request()->validate(['email'=>'required|email']);
        try {
            $newsletter->subscribe(request('email'));

        } catch (Exception $e){

            throw  ValidationException::withMessages([
                'email'=>'this email could not be added'
            ]);
        }


        return redirect('/')->with('success','You are signed up to our newsletter');
    }
}
