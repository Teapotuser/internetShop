<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


use App\Http\Requests\Admin\Subscription\Send;
use App\Http\Requests\BulkUpdateSubscriptionsRequest;
use App\Mail\Feedback;
// use App\Mail\Subscription;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::query()->paginate(10);       
        return view('admin.subscription.index', compact(['subscriptions']));
    }

    public function send(Send $request)
    {
        $file = null;

        if ($request->file('picture')) {

            $file = Storage::disk('public')->putFileAs('subscriptions', $request->file('picture'), $request->file('picture')->getClientOriginalName());
        }
        $subscriptions = Subscription::where('is_active', '=', 1)->get();


        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(
                new \App\Mail\Subscription(
                    $request->validated('name'),
                    $request->validated('description'),
                    $file
                )
            );
        }
        if ($file) {
            Storage::delete($file);
        }

        return to_route('dashboard.subscription.index')->with([
            'success' => 'Рассылка успешно отправлена',
        ]);
//        return view('admin.subscription.index', compact(['subscriptions']));
    }

    public function bulkUpdate(BulkUpdateSubscriptionsRequest $request)
    {
        $errors = 0;
        foreach ($request->get('is_subscribe') as $key => $is_active_recieved) {
            try {
                $subscription = Subscription::find($key);
                $is_active = 0;
                if ($is_active_recieved == 'on' || $is_active_recieved == 1) {
                    $is_active = 1;
                }
                $subscription->update(['is_active' => $is_active]);
            } catch (\Exception $e) {
                $errors++;
            }
        }
        $with = [
            'success' => 'Подписки успешно изменены',
        ];
        $errors == 0 ?: $with['error'] = 'Возникли ошибки при обновлении списка';

        return to_route('dashboard.subscription.index')->with($with);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return to_route('dashboard.subscription.index')->with(['success' => 'Подписка ' . $subscription->email . ' успешно удалена']);
    }

}
