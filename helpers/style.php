<?php

class Style {
    private static function file_extention($file_name) {
        return substr(strrchr($file_name, "."), 1);
    }
    
    private static function list_css_files($directory) {
        $results = array();
        $handler = opendir($directory);

        while ($file = readdir($handler)) {
            if ($file != "." && $file != "..") {
                if (self::file_extention($file) == "css") {
                    $results[] = $file;
                }
            }
        }

        closedir($handler);
        return $results;
    }
    
    public static function css_file_includes($location, $name) {
        $final_markup = "";
        $css_location = "$location/$name";
        $css_files = self::list_css_files($css_location);
        
        foreach ($css_files as $file) {
            $final_markup .= "<link href=\"$css_location/$file\" rel=\"stylesheet\" type=\"text/css\">";
        }
        
        echo $final_markup;
    }
}

?>