<?php

// remove sidebar on certain pages
    // add_action( 'get_header', 'bbloomer_remove_storefront_sidebar' );
    
    function bbloomer_remove_storefront_sidebar() {
        if ( is_product() || is_cart() || is_checkout() ) {
            remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
        }
    }

// category description below products
    add_action('woocommerce_archive_description', 'custom_archive_description', 2 );
    function custom_archive_description(){
        if( is_product_category() ) :
            remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
            add_action( 'woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description', 5 );
        endif;
    }

?>