<?php

namespace App\Http\Controllers;

use App\Models\Subscripe;
use Illuminate\Http\Request;
use App\Mail\CloudHostingProduct;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail()
    {
       $name = 'Cloudways';
       $emails = Subscripe::all();

       foreach ($emails as  $email) {
         Mail::to($email)->send(new CloudHostingProduct($name));
        }

       
       return 'Email sent Successfully';
    }

    public function sendemail(Request $request)
    {
      $details = [
                  'title' => $request->content,
                ];
      $emails = Subscripe::all();

    foreach ($emails as  $email) 
        {
          Mail::to($email)->send(new \App\Mail\MyTestMail($details));

        }

        return redirect()->back();

    }
}
