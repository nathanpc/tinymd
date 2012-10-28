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
    
    public static function build_disqus_area($shortname) {
        echo "<br/>";
        echo "<div id=\"disqus_thread\"></div>";
        echo "<script type=\"text/javascript\">";
            echo "var disqus_shortname = \"$shortname\";";

            echo "(function() {";
                echo "var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;";
                echo "dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';";
                echo "(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);";
            echo "})();";
        echo "</script>";
        echo "<noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>";
        echo "<a href=\"http://disqus.com\" class=\"dsq-brlink\">comments powered by <span class=\"logo-disqus\">Disqus</span></a>";
    }

    private static function build_post_item($title, $body, $id) {
        $permalink = "?post=$id";
        
        echo "<article>";
        echo "<h1><a href=\"$permalink\">" . substr(Markdown($title), 3, -5) . "</a></h1>";

        echo "<div class=\"post-details\"><a href=\"$permalink\">Permalink</a> - <a href=\"\">Love</a></div>";

        echo "<div class=\"article-body\">" . Markdown($body) . "</div>";
        echo "</article>";
    }

    public static function posts_list($directory, $limit = 10, $sort_order = SORT_DESC) {
        $post_files = self::post_file_list($directory, $sort_order);

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

    public static function single_post($directory, $id, $sort_order = SORT_DESC) {
        $post_files = self::post_file_list($directory, $sort_order);

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