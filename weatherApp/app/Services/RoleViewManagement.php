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
            ],
        ];

        return $roles[$userRole] ?? []; // Ensure safe access
    }

}
