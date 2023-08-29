<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\Admin\NewOrder as AdminNewOrder;
use App\Notifications\Client\NewOrder as ClientNewOrder;
use Illuminate\Support\Facades\Notification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
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

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
