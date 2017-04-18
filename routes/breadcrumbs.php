<?php

use DaveJamesMiller\Breadcrumbs\Generator;

Breadcrumbs::register('admin.users', function (Generator $breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
    $breadcrumbs->push('Users');
});

Breadcrumbs::register('admin.users.show', function (Generator $breadcrumbs, \App\Models\Auth\User\User $user) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
    $breadcrumbs->push('Users', route('admin.users'));
    $breadcrumbs->push($user->name, route('admin.users.show', [$user->id]));
});


