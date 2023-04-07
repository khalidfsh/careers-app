<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch (Request $request)
    {
        $language = $request->input('locale', config('app.locale'));

        if (!in_array($language, config('app.available_locales'))) {
            return redirect()->back();
        }

        App::setLocale($language);
        Session::put('locale', $language);

        return redirect()->back();
    }
}
