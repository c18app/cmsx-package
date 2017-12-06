<?php

namespace Cms18\CmsX\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginProcess(Request $request)
    {
        $request->session()->put('admin_pass', $request->input('password'));
        return redirect()->route('admin');
    }

    public function logOut(Request $request)
    {
        $request->session()->forget('admin_pass');
        return redirect('/');
    }
}
