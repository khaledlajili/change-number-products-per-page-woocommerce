<?php

// Hook the 'loop_shop_per_page' filter hook , run the function named 'cnpppw_loop_shop_per_page'

add_filter( 'loop_shop_per_page', 'cnpppw_loop_shop_per_page', 30 );

//getting the Number of Products To Display Per Page

define("cnpppw_products_per_page", intval(get_option('cnpppw_products_per_page')));

// Define the function named 'cnpppw_loop_shop_per_page()' , which Change the Number of WooCommerce Products Displayed Per Page

function cnpppw_loop_shop_per_page() {
    return cnpppw_products_per_page;
}


/*
 * Add 'Number of Products Displayed Per Page' menu to the Admin Control Panel
 */


// Hook the 'admin_menu' action hook, run the function named 'cnpppw_Add_Admin_Link()'

add_action( 'admin_menu', 'cnpppw_Add_Admin_Link' );

// Add 'Number of Products Displayed Per Page' menu link to the ACP

function cnpppw_Add_Admin_Link()
{
    add_submenu_page(
        'woocommerce', //  The slug name for the parent menu
        'change number of products displayed per page for WooCommerce', // Title of the page
        'Number of Products Per Page', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'change-number-products-per-page', // The slug name to refer to this menu by
        'cnpppw_change_number_products_per_page_callback' // function to execute when clicking the link
    );
}

// Define the function named 'cnpppw_change_number_products_per_page_callback()' , which display the page 'change number of products displayed per page for WooCommerce'

function cnpppw_change_number_products_per_page_callback() {
    require_once (plugin_dir_path(__FILE__) . 'change-number-products-per-page-acp-page.php');
}