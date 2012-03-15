<?php
/*
Plugin Name: RemoveToolbar
Plugin URI: https://github.com/blobaugh/WordPress-RemoveToolbar-Plugin
Description: Remove the new toolbar on a per user basis for both the front-end and back-end
Version: 0.1
Author: Ben Lobaugh
Author URI: http://ben.lobaugh.net
*/

   if (!function_exists('disableAdminBar')) {  
      
        function disableAdminBar(){            
      
       // remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 ); // for the admin page  
        remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 ); // for the front end  
      
       /* function remove_admin_bar_style_backend() {  // css override for the admin page  
          echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';  
        }  
      
        add_filter('admin_head','remove_admin_bar_style_backend');  
      */
        function remove_admin_bar_style_frontend() { // css override for the frontend  
            if(!is_admin()) {
          echo '<style type="text/css" media="screen"> 
          html { margin-top: 0px !important; } 
          * html body { margin-top: 0px !important; } 
          </style>';  
            }
        }  
      
        add_filter('wp_head','remove_admin_bar_style_frontend', 99);  
      
      }  
      
    }  
      
    add_action('init','disableAdminBar'); // New version  
