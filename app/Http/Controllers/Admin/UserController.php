<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Список пользователей
    public function index()
    {
        $users = User::paginate(6);       
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //  Отображение (форма) View пользователя
    public function show(User $user)
    {
        return view('admin.user.show', compact('user')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // Станица (форма) редактирования пользователя
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, User $user)
    {
        /* $validated = $request->validated();
        if ($request->file('picture')||$request->validated('removeImage')) {
            if ($user->picture) {                
                Storage::deleteDirectory('/public/users/' . $request->user()->id);
                $user->picture=null;
            }
        }
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $picture = Storage::putFile('/public/users/' . $validated['email'], $file);
            $validated['picture'] = $picture;
        }
        $user->update($validated);
        return redirect(route('dashboard.user.index'))->with('success', 'Пользователь "' . $user->name . ' ' . $user->last_name . '" успешно сохранен');
 */


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

        // $request->user()->fill($validated);
        $user->fill($validated);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->save();

        // return Redirect::back()->with('message', 'Профиль обновлен');
        return redirect(route('dashboard.user.index'))->with('success', 'Пользователь "' . $user->name . ' ' . $user->last_name . '" успешно сохранен');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function changepassword()
    {
        return view('admin.user.changepassword');
    }
}
