<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $user = Auth::user();

        $viewData = [
            'user' => $user,
        ];

        return view('user.index')->with(['viewData' => $viewData]);
    }
}
