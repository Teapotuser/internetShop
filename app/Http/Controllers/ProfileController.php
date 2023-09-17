<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileUpdatePasswordRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.general');
    }

    public function orders()
    {
        $orders=auth()->user()->orders()->paginate(1);

        return view('profile.profile-ordershistory', compact(['orders']));
    }

    public function userdata()
    {
        return view('profile.userdata');
    }

    public function subscription()
    {
        return view('profile.subscription');
    }

    public function subscription_update(Request $request)
    {
        $request->user()->is_subscribe = intval($request->has('is_subscribe'));
        $request->user()->save();
        return to_route('profile.subscription.show')->with('message', 'Подписка изменена');
    }

    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
   /*  public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    } */

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
       /*  $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated'); */

        $validated = $request->validated();
        if ($request->file('picture') || $request->validated('removeImage')) {
            if ($request->user()->picture) {
                Storage::deleteDirectory('/public/users/' . $request->user()->id);
                $request->user()->picture = null;
            }
        }
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $picture = Storage::url(Storage::put('/public/users/' . $request->user()->id, $file));
            $validated['picture'] = $picture;
        }

        $request->user()->fill($validated);
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return Redirect::back()->with('message', 'Профиль обновлен');
    }

    public function update_password_view()
    {
        return view('profile.password');
    }

    public function update_password(ProfileUpdatePasswordRequest $request)
    {
        Auth::user()->update([
            'password' => \Hash::make($request->validated('password'))
        ]);

        return to_route('profile.userdata.show')->with('message', 'Пароль успешно обновлен');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
