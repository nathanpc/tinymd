<!DOCTYPE html>
<?php
    // Configuration
    require_once "./config/details.php";
    require_once "./config/locations.php";
    
    // Helpers
    require_once "./helpers/style.php";
    require_once "./helpers/articles.php";
    require_once "./helpers/trackers.php";
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $blog_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Feed -->
        <link href="rss.php" type="application/atom+xml" rel="alternate" title=<?php echo "\"$blog_title\""; ?>>
        
        <!-- Libraries -->
        <link href="http://necolas.github.com/normalize.css/2.0.1/normalize.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
        
        <!-- Theme -->
        <?php Style::css_file_includes($blog_theme_location, $blog_theme_name); ?>
        
        <!-- Trackers -->
        <?php
            if ($enable_analytics) {
                Tracker::GoogleAnalytics($analytics_tracking_id);
            }
            
            if ($enable_gauges) {
                Tracker::Gauges($gauges_tracking_id);
            }
        ?>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="pane">
                    <h1><?php echo $blog_title; ?></h1>
                    <h2><?php echo $blog_subtitle; ?></h2>
                </div>
                
                <div class="pane">
                    <?php echo implode("\n", file("./templates/header.html")); ?>
                </div>
            </div>
        </header>
        
        <div id="body" class="container">
            <?php
                if (isset($_GET["post"])) {
                    Article::single_post($blog_posts_location, $_GET["post"]);
                    if ($enable_disqus) {
                        Article::build_disqus_area($disqus_shortname);
                    }
                } else {
                    Article::posts_list($blog_posts_location, $blog_post_limit, $blog_post_sort);
                }
            ?>
        </div>
        
        <footer>
            <div class="container">
                <?php echo implode("\n", file("./templates/footer.html")); ?>
            </div>
        </footer>
    </body>
</html>