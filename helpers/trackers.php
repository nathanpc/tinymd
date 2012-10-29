<?php

class Tracker {
    public static function Gauges($id) {
        echo "<script type=\"text/javascript\">";
          echo "var _gauges = _gauges || [];";
          echo "(function() {";
            echo "var t   = document.createElement('script');";
            echo "t.type  = 'text/javascript';";
            echo "t.async = true;";
            echo "t.id    = 'gauges-tracker';";
            echo "t.setAttribute('data-site-id', '$id');";
            echo "t.src = '//secure.gaug.es/track.js';";
            echo "var s = document.getElementsByTagName('script')[0];";
            echo "s.parentNode.insertBefore(t, s);";
          echo "})();";
        echo "</script>";
    }
    
    public static function GoogleAnalytics($id) {
        echo "<script type=\"text/javascript\">";
        
          echo "var _gaq = _gaq || [];";
          echo "_gaq.push(['_setAccount', '$id']);";
          echo "_gaq.push(['_trackPageview']);";
        
          echo "(function() {";
            echo "var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
            echo "ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
            echo "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
          echo "})();";
        
        echo "</script>";
    }
}

?>