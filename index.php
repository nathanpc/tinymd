<!DOCTYPE html>
<?php
    // Configuration
    require_once "./config/details.php";
    require_once "./config/locations.php";
    
    // Helpers
    require_once "./helpers/style.php";
    require_once "./helpers/articles.php";
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $blog_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Libraries -->
        <link href="http://necolas.github.com/normalize.css/2.0.1/normalize.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
        
        <!-- Theme -->
        <?php Style::css_file_includes($blog_theme_location, $blog_theme_name); ?>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="pane">
                    <h1><?php echo $blog_title; ?></h1>
                    <h2><?php echo $blog_subtitle; ?></h2>
                </div>
                
                <div class="pane">
                    <p>Some awesome text here because this is fucking awesome.</p>
                </div>
            </div>
        </header>
        
        <div id="body" class="container">
            <?php Article::posts_list($blog_posts_location); ?>
        </div>
        
        <footer>
            <div class="container">
                <span style="float: left;">
                    Powered by <a href="https://github.com/nathanpc/tinymd">tinymd</a>
                </span>
                
                <span style="float: right;">
                    RSS
                </span>
            </div>
        </footer>
    </body>
</html>