<?php  
// bloginfo('name'); custom options with settings API
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin page</title>
</head>
<body>
        <h1> Fount sidebar Options</h1>
        <!-- <h4 class = "title-one">Manage Options</h4>
        <p>This is where all the administrative work goes!</p> -->
        
<?php 
//Registers a settings error to be displayed to the user.
settings_errors(); ?>
<?php
        $profile                = esc_attr( get_option(' profile_picture') );
        $description            = esc_attr( get_option(' user_description') );
        $firstName              = esc_attr( get_option(' first_name') );
        $lastName               = esc_attr( get_option(' last_name') );
        $twitterHandler         = esc_attr( get_option(' twitter_handler') );
        $facebook               = esc_attr( get_option(' facebook_handler') );
        $instagramHandler       = esc_attr( get_option(' instagram_handler') );

?>
        <!--   -->
<div class = "fount-sidebar-preview"> 
        <div class = "fount-sidebar">
                <div class = "image-container">
                        <div id = "profile-picture-preview" class = "profile-picture"
                        style = "background-image: url (< ?php print $profile; ?> );">
                        </div>   
                </div>
                        <h1 class = "fount-firstname">   <?php print $firstName;   ?></h1>
                        <h1 class = "fount-lastname">    <?php print $lastName;    ?></h1>
                        <h2 class = "fount-description"> <?php print $description; ?></h2>
                <div class = "icons-wrapper">

                </div>
        </div>     
</div>
        <form method = "post" action = "options.php" class = "fount-general-form">
                <!-- Settings_fields Output nonce, action, and option_page fields for a settings page.-->
                <?php settings_fields('fount-settings-group'); ?>
                <!-- Prints out all settings sections added to a particular settings page -->
                <?php do_settings_sections('fay_fount') ; ?>
                <?php submit_button(); ?>
        </form>
</body>
</html>



