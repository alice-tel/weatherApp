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
        $data = User::all();
        return view('administrator.EditUsers',['users' => $data]);
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
