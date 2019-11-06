<?php

return [
    # prefix of admin panel
    'prefix'      => env('ADMIN_PREFIX', 'admin'),
    # super admin role name
    'super_admin' => env('SUPER_ADMIN', 'super_admin'),
    # footer
    'footer'      => '三养株式会社',
    # slips of per page
    'per_page'    => 15,
    # resource version
    'resource_version' => 2019103002,
    # name of admin panel
    'admin_name' => env('APP_NAME', 'Laravel'),
    # name of admin panel header
    'admin_header_part_1' => env('ADMIN_HEADER_PANEL_1', 'Lara'),
    'admin_header_part_2' => env('ADMIN_HEADER_PANEL_2', 'vel'),

];
