<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'School App',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>School</b> App',
    'logo_img' => 'images/logo/logo.jpg',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'School App',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => true,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'logout_method' => 'POST',

    'register_url' => false,

    'password_reset_url' => false,

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        
        ['header' => 'SALES'],
        [
            'text'    => 'Inquires',
            'route'  => 'inquiry',
        ],
        [
            'text'    => 'Purchase Request',
            'route'  => 'purchaseRequest',
        ],
        [
            'text'    => 'Order History',
            'route'  => 'admin.orderHistory',
        ],
        ['header' => 'COMPLAINTS'],
        [
            'text'    => 'User Complaints',
            'route'  => 'usercomplaint',
        ],

        ['header' => 'PAGES'],
        [
            'text'    => 'About',
            'route'  => 'admin.pages.about',
        ],
        [
            'text'    => 'Contact Details',
            'route'  => 'admin.pages.contact',
        ],
        [
            'text'    => 'Gretting',
            'route'  => 'admin.pages.gretting',
        ],

        ['header' => 'UI ELEMENTS'],
        [
            'text'    => 'Hero Section',
            'active' => ['herosection', 'herosection', 'herosection/*', 'regex:@^herosection/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL',
                    'route'  => 'herosection.index',
                ],
                [
                    'text' => 'Generate New',
                    'route'  => 'herosection.create',
                ],
            ],
        ],
        [
            'text'    => 'Top Features',
            'active' => ['topfeatures', 'topfeatures', 'topfeatures/*', 'regex:@^topfeatures/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL',
                    'route'  => 'topfeatures.index',
                ],
                [
                    'text' => 'Add New',
                    'route'  => 'topfeatures.create',
                ],
            ],
        ],
        
        ['header' => 'SETTINGS'],
        [
            'text'    => 'Social Links',
            'active' => ['sociallinks', 'sociallinks', 'sociallinks/*', 'regex:@^sociallinks/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL',
                    'route'  => 'sociallinks.index',
                ],
                [
                    'text' => 'Generate New',
                    'route'  => 'sociallinks.create',
                ],
            ],
        ],
        [
            'text'    => 'Testimonial',
            'active' => ['testimonial', 'testimonial', 'testimonial/*', 'regex:@^testimonial/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL Testimonial',
                    'route'  => 'testimonial.index',
                ],
                [
                    'text' => 'Add New Testimonial',
                    'route'  => 'testimonial.create',
                ],
            ],
        ],
        [
            'text'    => 'Newfeatures',
            'active' => ['newfeatures', 'newfeatures', 'newfeatures/*', 'regex:@^newfeatures/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL Newfeatures',
                    'route'  => 'newfeatures.index',
                ],
                [
                    'text' => 'Add New Newfeatures',
                    'route'  => 'newfeatures.create',
                ],
            ],
        ],
        [
            'text'    => 'Counter',
            'active' => ['counter', 'counter', 'counter/*', 'regex:@^counter/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL Counter',
                    'route'  => 'counter.index',
                ],
                [
                    'text' => 'Add New Counter',
                    'route'  => 'counter.create',
                ],
            ],
        ],
        [
            'text'    => 'Bot Message',
            'active' => ['botmessage', 'botmessage', 'botmessage/*', 'regex:@^botmessage/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL Bot Message',
                    'route'  => 'botmessage.index',
                ],
                [
                    'text' => 'Add New Bot Message',
                    'route'  => 'botmessage.create',
                ],
            ],
        ],
        [
            'text'    => 'Plan Create',
            'active' => ['plans', 'plans', 'plans/*', 'regex:@^plans/[0-9]+$@'],
            'submenu' => [
                [
                    'text' => 'Show ALL',
                    'route'  => 'plans.index',
                ],
                [
                    'text' => 'Create New Plans',
                    'route'  => 'plans.create',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        [
            'name' => 'Custom',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/css/custom.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/custom.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.ckeditor.com/4.14.1/basic/ckeditor.js',
                ],
            ],
        ],
    ],
];
