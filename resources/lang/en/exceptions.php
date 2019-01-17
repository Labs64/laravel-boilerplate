<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'users' => [
                'cant_deactivate_self'  => 'You can not do that to yourself.',
                'cant_delete_self'      => 'You can not delete yourself.',
                'create_error'          => 'There was a problem creating this user. Please try again.',
                'delete_error'          => 'There was a problem deleting this user. Please try again.',
                'email_error'           => 'That email address belongs to a different user.',
                'mark_error'            => 'There was a problem updating this user. Please try again.',
                'not_found'             => 'That user does not exist.',
                'restore_error'         => 'There was a problem restoring this user. Please try again.',
                'role_needed_create'    => 'You must choose at lease one role. User has been created but deactivated.',
                'role_needed'           => 'You must choose at least one role.',
                'update_error'          => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],

        /**
         * General labels
         */
        'already_exists'=> 'That record already exists. Please choose a different name.',
        'create_error'  => 'There was a problem creating this record. Please try again.',
        'delete_error'  => 'There was a problem deleting this record. Please try again.',
        'not_found'     => 'That record does not exist.',
        'update_error'  => 'There was a problem updating this record. Please try again.',
        'mark_error'    => 'There was a problem updating this record. Please try again.',
    ]
];