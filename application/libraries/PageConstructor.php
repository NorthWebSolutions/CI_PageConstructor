<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageConstructor
 * Not.yet.done:
 * Version 0.3A
 *
 * @author mrgab
 */
class PageConstructor {

    /// Static Swiches:

    private static $sw_bootstrap = true;
    private static $sw_jQuery = true;
    private static $sw_costum_css_auto_load = true;
    private static $sw_costum_css = array("bootstrap-reboot", "bootstrap-grid", "bootstrap", "cover", "main");

    private static $sw_responsive = true;
    private static $sw_animate = true;
    private static $sw_FA = true;
    private static $site_lang = "hu";

    /// main part construcions: #HEAD #CONTENT # FOOTER
    public function HEAD() {

        $this->HTML_start();
        $this->head_start();
        $this->head_title();
        $this->head_favicon();
        $this->head_meta();
        $this->head_css();
        $this->head_js();
        $this->head_stop();
        $this->content_start();
    }

    public function NAV() {
        $CI = & get_instance();          /// call instance

        $CI->load->view('html/nav');
    }

    public function FOOTER() {

        $this->content_stop();

        $this->HTML_stop();
    }

    /// Sub constructers
    private function HTML_start($type = false) { /* accept: HTML4 ,HTML5 */

        if (!$type || $type == "HTML5") {
            echo "<!doctype html>";
        } /* default HTML5 */
        elseif ($type == "HTML4") {
            echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">";
        }
        echo "<html lang=" . self::$site_lang . ">";
    }

    private function HTML_stop() {
        echo "</html>";
    }

    private function head_start() {
        echo "<head>";
    }

    private function head_stop() {
        echo "</head>";
    }

    private function head_title() {

    }

    private function head_css() {

        #load Bootstrap
        if (self::$sw_bootstrap) {
            echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">';
        }

        #Load Animate.css
        if (self::$sw_animate) {
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">';
        }

        #AutoLOAD CSS form /assets/css/
        if (self::$sw_costum_css_auto_load) {


            $path_to_css = "/assets/css";

            foreach (self::$sw_costum_css as $value) {

                echo "<link rel=\"stylesheet\" href=\"$path_to_css/$value.css\" > ";
            }
        }
    }

    private function head_js() {

        if (self::$sw_jQuery) {
            echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>';
        }

        if(self::$sw_FA){
            echo '<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>';
        }
        if (self::$sw_bootstrap) {
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>';
            echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script>';
        }
    }

    private function head_meta() {

        echo '<meta charset="utf-8">';
        if (self::$sw_responsive) {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        }
    }

    private function Start_js() {
        if (self::$sw_jQuery) {

            echo '<script src="/assets/js/startup.js" type="text/javascript"></script>';
        }
    }

    private function head_favicon() {

    }




    private function content_start() {
        echo "<body>";
        echo '<div class="container-fluid">';
    }

    private function content_stop() {
        echo '</div>';
        $this->Start_js();
        echo "</body>";
    }


}
