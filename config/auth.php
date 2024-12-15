<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        // 'guard' => 'web',
        'guard' => 'customer',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        // // 'web' => [
        // //     'driver' => 'session',
        // //     'provider' => 'users',
        // // ],
        // //
        // // 'api' => [
        // //     'driver' => 'token',
        // //     'provider' => 'users',
        // //     'hash' => false,
        // // ],
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'user-api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        // //super-admin
        // 'super-admin' => [
        //     'driver' => 'session',
        //     'provider' => 'super-admins',
        // ],

        // 'super-admin-api' => [
        //     'driver' => 'token',
        //     'provider' => 'super-admins',
        //     'hash' => false,
        // ],

        //admin
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
            'hash' => false,
        ],

        //manager
        'manager' => [
            'driver' => 'session',
            'provider' => 'managers',
        ],

        'manager-api' => [
            'driver' => 'token',
            'provider' => 'managers',
            'hash' => false,
        ],

        //customer
        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],

        'customer-api' => [
            'driver' => 'token',
            'provider' => 'customers',
            'hash' => false,
        ],

        //employee
        'employee' => [
            'driver' => 'session',
            'provider' => 'employees',
        ],

        'employee-api' => [
            'driver' => 'token',
            'provider' => 'employees',
            'hash' => false,
        ],

        //front-desk
        'front-desk' => [
            'driver' => 'session',
            'provider' => 'front-desks',
        ],

        'front-desk-api' => [
            'driver' => 'token',
            'provider' => 'front-desks',
            'hash' => false,
        ],

        // 'service-provider' => [
        //     'driver' => 'session',
        //     'provider' => 'service-providers',
        // ],

        // 'service-provider-api' => [
        //     'driver' => 'token',
        //     'provider' => 'service-providers',
        //     'hash' => false,
        // ],

        // 'admin-staff' => [
        //     'driver' => 'session',
        //     'provider' => 'admin-staffs',
        // ],

        // 'admin-staff-api' => [
        //     'driver' => 'token',
        //     'provider' => 'admin-staffs',
        //     'hash' => false,
        // ],

        // 'dist-user' => [
        //     'driver' => 'session',
        //     'provider' => 'dist-users',
        // ],

        // 'dist-user-api' => [
        //     'driver' => 'token',
        //     'provider' => 'dist-users',
        //     'hash' => false,
        // ],

        // 'vndr-user' => [
        //     'driver' => 'session',
        //     'provider' => 'vndr-users',
        // ],

        // 'vndr-user-api' => [
        //     'driver' => 'token',
        //     'provider' => 'vndr-users',
        //     'hash' => false,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'super-admins' => [
        //     'driver' => 'eloquent',
        //     'model' => App\SuperAdmin::class,
        // ],


        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],


        'front-desks' => [
            'driver' => 'eloquent',
            'model' => App\FrontDesk::class,
        ],

        'employees' => [
            'driver' => 'eloquent',
            'model' => App\Employee::class,
        ],

        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Customer::class,
        ],

        'managers' => [
            'driver' => 'eloquent',
            'model' => App\Manager::class,
        ],

        // 'service-providers' => [
        //     'driver' => 'eloquent',
        //     'model' => App\ServiceProvider::class,
        // ],

        // 'admin-staffs' => [
        //     'driver' => 'eloquent',
        //     'model' => App\AdminStaff::class,
        // ],
        // // 'users' => [
        // //     'driver' => 'database',
        // //     'table' => 'users',
        // // ],

        // 'dist-users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\DistributorUser::class,
        // ],

        // 'vndr-users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\VendorUser::class,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        // 'admin-staffs' => [
        //     'provider' => 'admin-staffs',
        //     'table' => 'password_resets',
        //     'expire' => 60,
        // ],
        // 'dist-users' => [
        //     'provider' => 'dist-users',
        //     'table' => 'password_resets',
        //     'expire' => 60,
        // ],
        // 'vndr-users' => [
        //     'provider' => 'vndr-users',
        //     'table' => 'password_resets',
        //     'expire' => 60,
        // ],
        'managers' => [
            'provider' => 'managers',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'clients' => [
            'provider' => 'clients',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'employees' => [
            'provider' => 'employees',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'front-desks' => [
            'provider' => 'front-desks',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
