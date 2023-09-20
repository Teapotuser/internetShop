<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FeedbackRequest;
use App\Mail\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use View;

class SubscriptionController extends Controller
{
    public function show()
    {
        return view('subscription');
    }

   /*  public function save(FeedbackRequest $request)
    {
        $user_email_feedback = $request->validated('email');
        
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(
                new Feedback(
                    $request->validated('name'),
                    $request->validated('last_name'),
                    $request->validated('email'),
                    $request->validated('phone_number'),
                    $request->validated('message')
                )
            );
        } */

        // return view('feedback')->with(['message' => 'Ваше обращение отправлено']);
        /* return to_route('feedback.confirmation')->with(compact('user_email_feedback'));
    } */
}

