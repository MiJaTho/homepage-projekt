<?php declare(strict_types=1);

return
[
    'ALL::' => [
        'controller' => 'Home',
        'action' => 'index',
        'login' => false,
    ],

        
    'GET::contakt' => [
        'controller' => 'Contakt',
        'action' => 'index',
        'login' => false
    ],
    'GET::users' => [
        'controller' => 'Users',
        'action' => 'index',
        'login' => true
    ],

    'POST::contakt' => [
        'controller' => 'Contakt',
        'action' => 'store',
        'login' => false
    ],
    'GET::posts' => [
        'controller' => 'Posts',
        'action' => 'index',
        'params' => [ 'id' => 'number' ],
        'login' => true
    ],
    'POST::posts' => [
        'controller' => 'Posts',
        'action' => 'store',
        'login' => true
    ],
    'GET::posts/:id/delete' => [
        'controller' => 'Posts',
        'action' => 'destroy',
        'params' => [ 'id' => 'number' ],
        'login' => true
    ],
    'GET::posts/:id/edit' => [
        'controller' => 'Posts',
        'action' => 'create',
        'params' => [ 'id' => 'number' ],
        'login' => true
    ],
    'POST::posts/:id/edit' => [
        'controller' => 'Posts',
        'action' => 'edit',
        'params' => [ 'id' => 'number' ],
        'login' => true
    ],
    'GET::gallery' => [
        'controller' => 'Gallery',
        'action' => 'index',
        'login' => false
    ],
    'GET::resume' => [
        'controller' => 'Resume',
        'action' => 'index',
        'login' => true
    ],
    'GET::impressum' => [
        'controller' => 'Impressum',
        'action' => 'index',
        'login' => false
    ],
    'GET::home' => [
        'controller' => 'Home',
        'action' => 'index',
        'login' => false
    ],
    'GET::portfolio' => [
        'controller' => 'Portfolio',
        'action' => 'index',
        'login' => false
    ],
    // Authentication & Registration
    'GET::login'     => [ 'controller' => 'Login', 'action' => 'create' ],
    'POST::login'    => [ 'controller' => 'Login', 'action' => 'store' ],
    'GET::logout'    => [ 'controller' => 'Login', 'action' => 'destroy' ],
    'GET::register'  => [ 'controller' => 'Registration', 'action' => 'create' ],
    'POST::register' => [ 'controller' => 'Registration', 'action' => 'store' ],
];
