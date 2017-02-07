<?php

/*
Plugin Name: mailplugin
Plugin URI: http://weblime.com
Description: Awsome e-mail plugin
Version: 1.0
Author: Nikita Sardov @ WebLime
Author URI: http://vk.com/nssardov
License: GPL2
License URI: https://www.gnu.org/license/gpl-2.0.html
Text Domain: mailplugin
*/


/* !0. TABLE of CONTENS*/

/*
    1. HOOKS
        1.1 - register allour custom shortcodes
    2. SHORTCODES
        2.1 - mailplugin_register_shortcodes()
        2.2 - mailplugin_form()
    3. FILTERS
    4. EXTERNAL SCRIPTS
    5. ACTIONS
    6. HELPERS
    7. CUSTOM POST TYPES
    8. ADMIN PAGES
    9. SETTINGS
*/

/*  !1 HOOKS */

// 1.1
// register all our custom shortcodes on init
add_action('init', 'mailplugin_register_shortcode');
//echo 'qwertfd';

/*  !2.1 SHORTCODES */

// 2.1
// register all our custom shortcodes
function mailplugin_register_shortcode() {

    add_shortcode('mailplugin_form', 'mailplugin_form_shortcode');

}

// 2.2
// returns a html string for email capture form
function mailplugin_form_shortcode( $content="" ) {

    // setup output variable - the form html
    $output = '
    
        <div class="mailplugin">
        
            <form id="mailplugin_form" name="mailplugin_form" class="mailplugin-form" method="post">
                
                <p class="mailplugin-input-container">
                
                    <label>Ваше имя</label><br/>
                    <input type="text" name="mailplugin_fname" placeholder="Имя" />
                    <input type="text" name="mailplugin_lname" placeholder="Фамилия" />
                    
                </p>
                
                <p class="mailplugin-input-container">
                
                    <label>Ваш e-mail</label><br/>
                    <input type="email" name="mailplugin_email" placeholder="youremail@mail.com" />
                    
                </p>';

                // including content in our html if content is passed into the function
                if ( strlen($content) > 0 ):

                    $output .= '<div class="mailplugin-content">'. $content.'</div>';

                endif;

                // completing form html
                $output .= '<p class="mailplugin-input-container">
                
                    <input type="submit" name="mailplugin_submit" value="Подписаться!" />
                    
                </p>                
                
             </form>
    
    ';

    // return results
    return $output;
    
}

/*  2. SHORTCODES
    3. FILTERS
    4. EXTERNAL SCRIPTS
    5. ACTIONS
    6. HELPERS
    7. CUSTOM POST TYPES
    8. ADMIN PAGES
    9. SETTINGS
*/