<?php

namespace App\Http\Controllers;



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
        return view('administrator.EditUsers');
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
