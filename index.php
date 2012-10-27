<!DOCTYPE html>
<?php
    // Configuration
    require_once "./config/details.php";
    
    // Helpers
    require_once "./helpers/style.php";
?>
<html>
    <head>
        <title><?php echo $blog_title; ?></title>
        
        <?php Style::css_file_includes($blog_theme_location, $blog_theme_name); ?>
    </head>
    <body>
        
    </body>
</html>