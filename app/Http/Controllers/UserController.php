<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $user = Auth::user();
        
        // $path = request()->path();
        // $newBreadCrumb = explode('/', trim($path, '/'));
        // array_unshift($newBreadCrumb, 'Home');
        // Session::put('breadCrumb', $newBreadCrumb);

        $viewData = [
            'user' => $user,
        ];

        return view('user.index')->with(['viewData' => $viewData]);
    }
}
