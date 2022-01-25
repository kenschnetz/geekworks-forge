<?php

	namespace App\Utilities;

	class Admin {
        public static function Tools() {
            return collect([
                (object)[
                    'route' => 'admin-users',
                    'name' => 'Users',
                    'description' => 'View and update Users as required.'
                ],
                (object)[
                    'route' => 'admin-user-violations',
                    'name' => 'User Violations',
                    'description' => 'Manage User policy violations.'
                ],
                (object)[
                    'route' => 'admin-user-mutes',
                    'name' => 'User Mutes',
                    'description' => 'Manage muting of Users.'
                ],
                (object)[
                    'route' => 'admin-flags',
                    'name' => 'Content Flags',
                    'description' => 'Review flagged content.'
                ],
//                (object)[
//                    'route' => 'admin-post-types',
//                    'name' => 'Post Types',
//                    'description' => 'Manage Post Types.'
//                ],
                (object)[
                    'route' => 'admin-systems',
                    'name' => 'Systems',
                    'description' => 'RPG Systems within Forge.'
                ],
                (object)[
                    'route' => 'admin-categories',
                    'name' => 'Categories',
                    'description' => 'Post Categories within Forge.'
                ],
                (object)[
                    'route' => 'admin-tags',
                    'name' => 'Tags',
                    'description' => 'Manage Post Tags.'
                ],
                (object)[
                    'route' => 'admin-attributes',
                    'name' => 'Attributes',
                    'description' => 'Manage Post Attributes.'
                ],
                (object)[
                    'route' => 'admin-actions',
                    'name' => 'Actions',
                    'description' => 'Manage Post Actions.'
                ],
            ]);
        }
	}
