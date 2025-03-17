<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(10);
        $viewData = [
            'users' => $users,
        ];

        return view('admin.user.index')->with('viewData', $viewData);
    }
}
