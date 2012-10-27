<!DOCTYPE html>
<?php
    // Configuration
    require_once "./config/details.php";
    
    // Helpers
    require_once "./helpers/style.php";
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
            <article>
                <h1>If it’s Good I Don’t Care Which License it Uses</h1>
                <div class="post-details">Posted at October 8, 2012</div>
                
                <div class="article-body">
                    <p>Today I could finally watch the Stallman’s interview on The Linux Action Show, and their second video about it, and I couldn’t agree more with Bryan, so I thought about writing an article about it since most of the responses I saw were just a lot of crap thrown at a person that wants to make a living out of software development.</p>

                    <p>Stallman has a great dream that software should be “free”, but I think that the developer must also have the freedom to choose if they want to charge or not for their software. Free software is great, but if a developer wants to make a living out of their software, which means be dedicated full-time and not have another job, it’s almost impossible if you only make free software, even if you accept donations they won’t be good enough to make a living. Which means you’ll have to charge for some of your software.</p>
                </div>
            </article>
            <hr>
            <article>
                <h1>If it’s Good I Don’t Care Which License it Uses</h1>
                <div class="post-details">Posted at October 8, 2012</div>
                
                <div class="article-body">
                    <p>Today I could finally watch the Stallman’s interview on The Linux Action Show, and their second video about it, and I couldn’t agree more with Bryan, so I thought about writing an article about it since most of the responses I saw were just a lot of crap thrown at a person that wants to make a living out of software development.</p>
            
                    <p>Stallman has a great dream that software should be “free”, but I think that the developer must also have the freedom to choose if they want to charge or not for their software. Free software is great, but if a developer wants to make a living out of their software, which means be dedicated full-time and not have another job, it’s almost impossible if you only make free software, even if you accept donations they won’t be good enough to make a living. Which means you’ll have to charge for some of your software.</p>
                </div>
            </article>
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