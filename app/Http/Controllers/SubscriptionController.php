<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use View;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function show()
    {
        return view('subscription');
    }

    public function save(SubscriptionRequest $request)
    {
        $user_email = $request->validated('subsribe-email');
        $unsubscribe = $request->validated('subscription_choice') == 'unsubscribe';
        if ($unsubscribe) {
            $subscription = Subscription::query()->where('email', $user_email)->firstOrCreate();
            $subscription->update(['is_active' => 0]);
        } else {
            Subscription::create(
                [
                    'email' => $user_email
                ]
            );
        }
        return to_route('subscription.confirmation')->with(compact(['user_email', 'unsubscribe']));
    }
}

