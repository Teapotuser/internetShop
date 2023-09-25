<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function delivery()
    {
        return view('staticpages.delivery');
    }

    /* public function payment()
    {
        return view('staticpages.payment');
    }

    public function contacts()
    {
        return view('staticpages.contacts');
    }

    public function about()
    {
        return view('staticpages.about');
    } */
}
