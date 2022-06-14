<?php

/*
@package Fount Theme
  ===============
   ADMIN PAGE
  ================

*/

function fount_load_admin_scripts($hook ){
    //echo $hook;
    if ( 'toplevel_page_fay_fount' != $hook ){
        return;
    }

     wp_register_style( 'fount_admin' , get_template_directory_uri() .'/css/fount-admin.css', array(), '5.9.3', 'all');
     wp_enqueue_style( 'fount_admin' );

     wp_register_style('owl-carousel' , get_template_directory_uri(). '/css/owl.carousel.min.css', array(), '2.3.4', 'all');
     wp_enqueue_style( 'owl-carousel' );

     wp_register_style('owl.theme.default.min' , get_template_directory_uri(). '/css/owl.theme.default.min.css', array(), '2.3.4', 'all');
     wp_enqueue_style( 'owl.theme.default.min' );


     wp_enqueue_media();

     wp_register_script('fount_admin_script' , get_template_directory_uri(). '/js/fount.js', array(), '5.9.3', 'all'); 
     wp_enqueue_script('fount_admin_script');

     
     wp_register_script('owl.carousel.min' , get_template_directory_uri(). '/js/owl.carousel.min.js', array(), '2.3.4', 'all'); 
     wp_enqueue_script('owl.carousel.min');
     
     //wp_enqueue_script('owl-carousel.js' , get_template_directory_uri(). '/assets/js/owl.carousel.min.js');
     //wp_enqueue_script('sliders.js' , get_template_directory_uri(). '/assets/js/slider.js');
}

//hook
add_action( 'admin_enqueue_scripts' , 'fount_load_admin_scripts');

