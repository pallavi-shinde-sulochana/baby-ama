<?php

use App\Core\Adapters\Theme;

return array(
    // Main menu
    'main'       => array(
        //// Dashboard
        array(
            'title' => 'Dashboard',
            'path'  => 'admin/index',
            'icon'  => Theme::getSvgIcon("icons/duotone/Design/PenAndRuller.svg", "svg-icon-2"),
        ),
        //  array(
        //     'title' => 'Front Pages',
        //     'path'  => 'admin/pages',
        //     'icon'  => Theme::getSvgIcon("icons/duotone/Home/Wood2.svg", "svg-icon-2"),
        // ),

        // Account
        // array(
        //     'title'      => 'Account',
        //     'icon'       => array(
        //         'svg'  => Theme::getSvgIcon("icons/duotone/General/User.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-person fs-2"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'  => 'Settings',
        //                 'path'   => 'account/settings',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //         ),
        //     ),
        // ),

        // System
        

        // Separator
        // array(
        //     'content' => '<div class="separator mx-1 my-4"></div>',
        // ),
        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'roles' => ['super_admin','admin'],
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Admin Area</span>',
        ),

        // Changelog
        // array(
        //     'title' => 'Products ',
        //     'icon'  => Theme::getSvgIcon("icons/duotone/Home/Book-open.svg", "svg-icon-2"),
        //     'path'  => 'admin/news',
        // ),
        // // Changelog
        // array(
        //     'title' => 'Orders ',
        //     'icon'  => Theme::getSvgIcon("icons/duotone/Interface/Briefcase.svg", "svg-icon-2"),
        //     'path'  => 'admin/press-release',
        // ),
        // Users
        array(
            'title' => 'Users ',
            'roles' => ['super_admin','admin'],
            'icon'       => array(
                'svg'  => Theme::getSvgIcon("icons/duotone/Communication/Group.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'  => 'Admin',
                        'path'   => 'admin/users/list/administrator',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Doctors',
                        'path'   => 'admin/users/list/doctor',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Staff',
                        'path'   => 'admin/users/list/pharmacy',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Therapist',
                        'path'   => 'admin/users/list/therapist',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                   /* array(
                        'title'  => 'Patients',
                        'path'   => 'admin/users/patients',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    )*/
                ),
            ),
        ),
        // Patients
         // Separator
        array(
            'content' => '<div class="separator mx-1 my-1"></div>',
        ),
         //// Modules
        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Patients</span>',
        ),
        array(
            'title'      => 'Patients Management',
            'icon'       => array(
                'svg'  => Theme::getSvgIcon("icons/duotone/Interface/User.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'  => 'Patients',
                        'path'   => 'admin/patients',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Appointment',
                        'path'   => 'admin/appointments',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
        // array(
        //     'title' => 'Media Resources ',
        //     'icon'  => Theme::getSvgIcon("icons/duotone/Media/AirPlay.svg", "svg-icon-2"),
        //     'path'  => 'admin/media-resource',
        // ),
        // array(
        //     'title' => 'CSR ',
        //     'icon'  => Theme::getSvgIcon("icons/duotone/General/Attachment1.svg", "svg-icon-2"),
        //     'path'  => 'admin/csr',
        // ),
        // Separator
        array(
            'content' => '<div class="separator mx-1 my-1"></div>',
        ),
         //// Modules
        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">System</span>',
        ),
        array(
            'title'      => 'System',
            'icon'       => array(
                'svg'  => Theme::getSvgIcon("icons/duotone/Layout/Layout-4-blocks.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'  => 'System Log',
                        'path'   => 'log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),

    // Horizontal menu
    'horizontal' => array(
        ),
);
