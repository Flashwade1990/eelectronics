<?php

/**
 * The application configuration file, used to setup globally used values throughout the application
 */
return array(
    /**
     * Default metas
     */
    '_metas' => array(
        'title' => 'Quick Admin',
    ),
    
    /**
     * Common titles
     */
    '_site' => array(
        'title' => 'Quick Admin',
        'footer_title' => 'Silu'
    ),
    
    /**
     * The menu items shown at the menu of the application
     */

   'menu_items' => array(

        '/' => array(
            'type' => 'simple',
            'name' => 'Dashboard',
            'icon' => 'dashboard'
        ),  
        
        'categories' => array(
            'type' => 'nested',
            'name' => 'Categories',
            'icon' => 'plus-circle',
         'items' => array(
                'categories' => array(
                    'name' => 'List',
                    'role' => 'admin',
                ),
                'categories/edit' => array(
                    'name' => 'Create category',
                    'role' => 'admin',
                )
            )


        ),
        

                 'products' => array(
            'type' => 'nested',
            'name' => 'Products',
            'icon' => 'laptop',
            'role' => 'admin',
            'items' => array(
                'products' => array(
                    'name' => 'List',
                    'role' => 'admin',
                ),
                'products/edit' => array(
                    'name' => 'Create product',
                    'role' => 'admin',
                )
            )
        ),
                 'users' => array(
            'type' => 'nested',
            'name' => 'Users',
            'icon' => 'user',
            'role' => 'admin',
            'items' => array(
                'users' => array(
                    'name' => 'List',
                    'role' => 'admin',
                ),
                'users/edit' => array(
                    'name' => 'Create user',
                    'role' => 'admin',
                )
            )

        ), 
         'adminka/orders' => array(
            'type' => 'nested',
            'name' => 'Orders',
            'icon' => 'plus',
            'role' => 'admin',
            'items' => array(
                'adminka/orders' => array(
                    'name' => 'New',
                    'role' => 'admin',
                ),
                'adminka/orders/old' => array(
                    'name' => 'Archive',
                    'role' => 'admin',
                )
            )

        )     
    )
);
