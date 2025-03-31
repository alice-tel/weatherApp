<?php

namespace App\Services;

class RoleViewManagement {
    public static function getNavItems($userRole) {
        dump($userRole + "in nav items");

        $roles = [
            1 => [ // Admin
                ['route' => 'administrator.superAdminPage', 'label' => 'Admin Panel'],

            ],

        ];

        return $roles[$userRole] ?? []; // user_role kan op t moment ook null zijn.
    }
}
