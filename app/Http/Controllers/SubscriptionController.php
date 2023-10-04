<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function show(Request $request)
    {
        $email = isset($_GET['email']) ? $_GET['email'] : null;

        return view('subscription', compact('email'));
    }

    public function newSubscription(Request $request){        
        $request->validate(['subsribe-email' => [
            'required',
            'email',]]);
        $email = $request->get('subsribe-email');
        return to_route('subscription.form', compact('email'));
    }

    public function save(SubscriptionRequest $request)
    {
        $user_email = $request->validated('subsribe-email');
        $unsubscribe = $request->validated('subscription_choice') == 'unsubscribe';
        if ($unsubscribe) {
            $subscription = Subscription::query()->where('email', $user_email)->firstOrCreate();
            $subscription->update(['is_active' => 0]);
        } else {
           /*  Subscription::create(
                [
                    'email' => $user_email
                ]
            ); */
            Subscription::query()->updateOrCreate(
                ['email' => $user_email,],
                ['is_active' => 1]
            );
        }
        return to_route('subscription.confirmation')->with(compact(['user_email', 'unsubscribe']));
    }
}

