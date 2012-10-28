<?php

require_once "./libs/markdown/markdown.php";

class Article {
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
    
    private static function build_post_item($title, $body, $id) {
        $permalink = "?post=$id";
        
        echo "<article>";
        echo "<h1>$title</h1>";
        
        echo "<div class=\"post-details\"><a href=\"$permalink\">Permalink</a> - <a href=\"\">Love</a></div>";
        
        echo "<div class=\"article-body\">" . Markdown($body) . "</div>";
        echo "</article>";
    }
    
    public static function posts_list($directory, $limit = 10) {
        $post_files = self::post_file_list($directory);

        for ($i = 0; $i < count($post_files); $i++) {
            if ($i < $limit) {
                $lines = file($post_files[$i]);
                $title = substr($lines[0], 2);
                array_shift($lines);
                $body = implode("", $lines);
                
                if ($i != 0) {
                    echo "<hr>";
                }
                
                self::build_post_item($title, $body, $i);
            }
        }
    }
    
    public static function single_post($directory, $id) {
        $post_files = self::post_file_list($directory);
        
        if (isset($post_files[$id])) {
            $lines = file($post_files[$id]);
            $title = substr($lines[0], 2);
            array_shift($lines);
            $body = implode("", $lines);
            
            self::build_post_item($title, $body, $id);
        } else {
            echo "<h1>This post doesn't exist.</h1>";
        }
    }
}

?>