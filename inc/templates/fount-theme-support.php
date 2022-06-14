<?php  
// bloginfo('name'); custom options with settings API
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Support page</title>
</head>
<body>
        <h1> Fount Theme Support</h1>
        <!-- <h4 class = "title-one">Manage Options</h4>
        <p>This is where all the administrative work goes!</p> -->

        <?php settings_errors(); ?>
<?php
        //$profile                = esc_attr( get_option(' profile_picture') );
       
?>

    
        <form method = "post" action = "options.php" class = "fount-general-form">
            <!-- Settings_fields Output nonce, action, and option_page fields for a settings page.-->
           <?php settings_fields('fount-theme-support'); ?>

           <!-- Prints out all settings sections added to a particular settings page -->
           <?php do_settings_sections('fay_fount_theme') ; ?>

           <?php submit_button(); ?>
        
        </form>

</body>
</html>



