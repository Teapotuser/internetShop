<?php

namespace App\Listeners;

use App\Events\OrderCreated;
/* use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue; */

use App\Models\Order;
use App\Models\User;
use App\Notifications\Admin\NewOrder as AdminNewOrder;
use App\Notifications\Client\NewOrder as ClientNewOrder;
use Illuminate\Support\Facades\Notification;

class OrderCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /* public function __construct()
    {
        
    } */

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        
        $order = $event->order;
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new AdminNewOrder($order));
        }

        if (isset($order->user_id) && $order->user()) {
            $order->user->notify(new ClientNewOrder($order));
        } else {
            Notification::route('mail', [
                $order->email => $order->name . ' ' . $order->last_name,
            ])->notify(new ClientNewOrder($order));
        }
    }
    
}
