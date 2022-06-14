<?php
/*
@package Fount Theme
  ==================
  ADMIN PAGE
  ==================
*/

// create a custom function in php, it must have unique name
function fount_add_admin_page(){
      
    // wordpress hook to activate administration page (parameters)
    //---page title---menu title---capabilities---unique  menu slug---function---custom icon---position
    add_menu_page(  'Fount Theme Options', 
                    'Fount', 
                    'manage_options',
                    'fay_fount', 
                    'fount_theme_create_page',
                    get_template_directory_uri() . '/img/fave.png', 
                    110 
                );

      // create fount admin sub-pages parent slug page title capabilty menu-slug function
      add_submenu_page( 'fay_fount', 
                        'Fount sidebar Options',
                        'Sidebar', 
                        'manage_options', 
                        'fay_fount',
                        'fount_theme_create_page' 
                      );

      add_submenu_page( 'fay_fount',
                        'Fount Theme Options',
                        'Theme Options',
                        'manage_options',
                        'fount_theme' , 
                        'fount_theme_support_page'
                      );

      add_submenu_page( 'fay_fount',
                        'Fount CSS Options',
                        'Custom CSS',
                        'manage_options',
                        'fay_fount_css' , 
                        'fount_theme_settings_page'
                      );

      add_submenu_page( 'fay_fount',
                        'Fount custom',
                        'Custom slider',
                        'manage_options',
                        'fay_fount_custom' , 
                        'fount_theme_customs_page'
                      );

      //Activate custom settings
      //admin_init is triggered before any other hook when a user accesses the admin area.
      add_action( 'admin_init','fount_custom');
}

// trigger function using function 
//admin_menu action is used to add extra submenus and menu options to the admin panel's menu structure
add_action(   'admin_menu' , 'fount_add_admin_page');

// register_settings registers a setting and its data.
function fount_custom() {

      register_setting( 'fount-settings-group',   'profile_picture' );  
      register_setting( 'fount-settings-group',   'user_description' );    
      register_setting( 'fount-settings-group',   'first_name' );
      register_setting( 'fount-settings-group',   'last_name' );
      register_setting( 'fount-settings-group',   'twitter_handler', 'fount_sanitize_twitter_handler' );   
      register_setting( 'fount-settings-group',   'facebook_handler' );  
      register_setting( 'fount-settings-group',   'instagram_handler' );  

    // define new settings sections for an admin page or sub menu page
    add_settings_section('fount-sidebar-options', 'Side Sidebar Options', 'fount_sidebar','fay_fount' ); 
          //gives us the ability to generate custom html input Adds a new field to a section of a settings page.
              add_settings_field( 'sidebar-profile',
                                  'Profile Picture',
                                  'fount_profile',
                                  'fay_fount',
                                  'fount-sidebar-options'
                                );

              add_settings_field( 'sidebar-description',
                                  'User Description', 
                                  'fount_description',
                                  'fay_fount',
                                  'fount-sidebar-options'
                                );

              add_settings_field( 'sidebar-name',
                                  'First Name', 
                                  'fount_sidebar_name',
                                  'fay_fount',
                                  'fount-sidebar-options'
                                ); 

              add_settings_field( 'sidebar-lname',
                                  'Last Name', 
                                  'fount_lname',
                                  'fay_fount',
                                  'fount-sidebar-options'
                                
                                ); 

                add_settings_field( 'sidebar-twitter',
                                    'Twitter Handler', 
                                    'fount_twitter',
                                    'fay_fount',
                                    'fount-sidebar-options'
                                  ); 

                add_settings_field( 'sidebar-facebook',
                                    'Facebook Handler', 
                                    'fount_facebook',
                                    'fay_fount',
                                    'fount-sidebar-options'
                                  );

                add_settings_field( 'sidebar-instagram',
                                    'Instagram Handler', 
                                    'fount_instagram',
                                    'fay_fount',
                                    'fount-sidebar-options'
                                );

        //Theme support 
        //registers a setting and its data
        //A Post Format is a piece of meta information that can be used by a theme to customize its presentation of a post. 
        //options register_setting( string $option_group, string $option_name, array $args = array() )
        register_setting(   'fount-theme-support',
                            'post_formats',
                            'fount_post_formats_callback'
                        );
        
              // add_settings_section( string $id, string $title, callable $callback, string $page )
              //Use it to define new settings sections for a page            

              add_settings_section( 'fount-theme-options',
                                    'Theme Options',
                                    'fount_theme_options',
                                    'fay_fount_theme'
                                  ); 
                //add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
                //use this to define a settings field that will show as part of a secttings section inside a settings page
                  add_settings_field( 'post-formats',
                                      'Post Formats',
                                      'fount_post_formats',
                                      'fay_fount_theme ',
                                      'fount-theme-options'
                                    );
} 

//Post Formats Callback Function
function fount_post_formats_callback($input){
    return $input;
}

function fount_theme_options(){
  echo 'Activate and Deactivate specific Theme Support Options';
}

//loops formats 9times
function fount_post_formats(){
  $options = get_option( 'post_formats' );
  $formats = array('aside' , 'gallery' , 'links', 'image', 'quote' , 'status' , 'video' , 'audio' ,'chat' ); 
  $output  = '';
    foreach( $formats as $format){
      $checked = ( @$options[$format] == 1 ? 'checked' : '');
      $output .= '<label> <input type = "checkbox" id = "'.$format.'"   name = " '.$format.' "  value = "1" > '.$checked.'</label> <br>';
}
echo $output;

}

function fount_theme_create_page(){
    //generates our admin page
    //The require_once keyword is used to embed PHP code from another file
      require_once( get_template_directory() . '/inc/templates/fount-admin.php');
} 

//template submenu functions
function fount_theme_support_page(){
  require_once(get_template_directory() . '/inc/templates/fount-theme-support.php');

}

function fount_theme_settings_page(){
  echo '<h5> Fount Fount Custom CSS </h5>' ;
  echo '<h5> It is working </h5>' ;

    //generates our admin page
      
} 

function fount_theme_customs_page(){
  require_once(get_template_directory() . '/inc/templates/movies-slider.php');
  //generates our admin page       
} 


function fount_sidebar(){
  //generates our admin page
    echo '<h5> Fount Fount Custom CSS </h5>' ;
    echo '<h5> It is working </h5>' ;
    
} 

function fount_profile(){
  $profile = esc_attr( get_option(' profile_picture ') );
      echo '<input type = "button" value ="Upload Profile Picture" id = "upload-button" >
            <input type = "hidden"  id = "profile-picture" name = "profile_picture"  value = "'.$profile.'"  /> ';  
      echo "</br>"; 
}

function fount_description(){
  $description = esc_attr( get_option(' user_description') );
      echo '<input type = "text" name = "user_description"  value = "'.$description.'" placeholder = "User Description" /> 
            <p class = "user-description"> Tell us about you!</p>';
}

function fount_sidebar_name(){
  $firstName = esc_attr( get_option('first_name') );
        echo '<input type = "text" name = "first_name" value = "'.$firstName.'" placeholder = "First Name" /> '; 
}

function fount_lname(){
  $lastName = esc_attr( get_option('last_name') );
        echo '<input type = "text" name = "last_name" value = "'.$lastName.'" placeholder = "Last Name" /> '; 
        echo "</br>";
}

function fount_twitter() {
  $twitterHandler = esc_attr( get_option(' twitter_handler') );
          echo '<input type = "text" name = "twitter_handler"  value = "'.$twitterHandler.'" placeholder = "Twitter Handler" /> 
                <p class = "description"> @ symbol has been removed</p>';
}

function fount_facebook(){
  $facebook = esc_attr( get_option(' facebook_handler') );
          echo '<input type = "text" name = "facebook_handler"  value = "'.$facebook.'" placeholder = "Facebook Handler" /> '; 
          echo "</br>";
}

function fount_instagram(){
  $instagramHandler = esc_attr( get_option(' instagram_handler') );
          echo '<input type = "text" name = "instagram_handler"  value = "'.$instagramHandler.'" placeholder = "instagram Handler" /> '; 
          echo "</br>";
          echo "</br>";
}

//sanitize twitter settings---- checks for invalid user typos
function fount_sanitize_twitter_handler( $input ){
          $output = sanitize_text_field($input);
          $output = str_replace('@', '' , $output);
          return $output;
}



?>

