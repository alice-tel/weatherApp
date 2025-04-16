<?php

namespace App\Services;

class RoleViewManagement {
    public static function getNavItems($userRole) {
        if (!isset($userRole) || $userRole === '') {// more bebugging
            return [];
        }

        $roles = [
            6 => [ // Admin
                ['route' => 'show.register', 'label' => 'Register'],
                ['route' => 'administrator.showUsers', 'label' => 'Admin page'],


            ],
        ];

        return $roles[$userRole] ?? []; // Ensure safe access
    }

}
