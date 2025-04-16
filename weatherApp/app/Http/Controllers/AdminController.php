<?php

namespace App\Http\Controllers;



use App\Models\User;
class AdminController extends Controller
{
    public function adminIndex()
    {
        return view('administrator.superAdminPage');
    }

    public function showRoles()
    {

        return view('administrator.EditRoles');
    }

    public function showUsers()
    {
        $users = User::with('userRole')->get();
        return view('administrator.EditUsers', compact('users'));
    }

    public function updateRoles()
    {
        return view('administrator.EditRoles');
    }

    public function updateUsers()
    {
        return view('administrator.EditUsers');
    }
}
