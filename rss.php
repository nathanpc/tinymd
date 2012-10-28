<?php

header("Content-Type: application/atom+xml; charset=utf-8");

require_once "./config/details.php";
require_once "./config/locations.php";
require_once "./libs/markdown/markdown.php";

?>

<?xml version="1.0" encoding="utf-8"?>

<feed xmlns="http://www.w3.org/2005/Atom">
    <title><?php echo $blog_title; ?></title>
    <subtitle><?php echo $blog_subtitle; ?></subtitle>
    <!--<link href="http://example.org/feed/" rel="self" />
    <link href="http://example.org/" />
    <updated>2003-12-13T18:30:02Z</updated>-->
    <?php
        class RSS {
            private static function post_file_list($directory, $sortOrder = SORT_DESC) {
                $files = glob("$directory/*.*");
        
                array_multisort(
                    array_map("filectime", $files),
                    SORT_NUMERIC,
                    $sortOrder,  // SORT_ASC for oldest first
                    $files
                );
        
                return $files; 
            }
        
            private static function build_post_item($title, $author, $body, $id) {
                $permalink = "?post=$id";
                
                echo "<entry>";
                    echo "<title>$title</title>";
                    echo "<link href=\"$permalink\" />";
                    echo "<summary>" . Markdown($body) . "</summary>";
                    echo "<author>";
                        echo "<name>$author</name>";
                    echo "</author>";
                echo "</entry>";
            }
        
            public static function posts_list($directory, $author, $limit = 10) {
                $post_files = self::post_file_list($directory);
        
                for ($i = 0; $i < count($post_files); $i++) {
                    if ($i < $limit) {
                        $lines = file($post_files[$i]);
                        $title = substr($lines[0], 2);
                        array_shift($lines);
                        $body = implode("", $lines);
        
                        self::build_post_item($title, $author, $body, $i);
                    }
                }
            }
        }
        
        RSS::posts_list($blog_posts_location, $blog_author);
    ?>
</feed>