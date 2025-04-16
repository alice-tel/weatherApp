<?php

namespace App\Services;

class RoleViewManagement {
    public static function getNavItems($userRole) {
        if (!isset($userRole) || $userRole === '') {// more bebugging
            return [];
        }

        $roles = [
            6 => [ // Admin
                ['route' => 'administrator.superAdminPage', 'label' => 'Admin Panel'],
                ['route' => 'administrator.showUsers', 'label' => 'EditUsers'],
                ['route' => 'administrator.showRoles', 'label' => 'EditRoles'],

            ],
        ];

        return $roles[$userRole] ?? []; // Ensure safe access
    }

}


