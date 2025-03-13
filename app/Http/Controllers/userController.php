<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class userController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        $viewData = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('user.index')->with(['viewData' => $viewData]);
    }
}
