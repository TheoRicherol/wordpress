<?php
/*
Plugin Name: LAMANU-cookie-law
Version: 0.1
Plugin URI: http://www.tt.com
Description: WordPress Plugin for european cookie law.
Author: TotoAuthor URI: http://www.tt.com
*/

add_action('wp_head', 'LAMANU_scripts');

// In plugin main file
add_action('admin_menu', 'gAnalytics');

//Registers our new menu item

function gAnalytics()
{
    // Create a top-level menu item.
    $hookname = add_menu_page(
        __('Google Analytics Config', 'example'),  // Page title
        __('Google Analytics Config', 'example'),  // Menu title
        'manage_options',                     // Capabilities
        'example_settings_page',              // Slug
        'gAnalytics_ID_form',       // Display callback
        'dashicons-pets',                   // Icon
        66                                    // Priority/position. Just after 'Plugins'
    );
// 1er parametre groupe settings, 2 eme champ setting
    $settings = register_setting("my-analytics-ID", "google-analytics-ID");
}

// Appel de la page de définition des settings
function gAnalytics_ID_form()
{
    // Appel fichier options.php
    $callOpt = plugin_dir_path(__FILE__) . "view/options.php";
    require($callOpt);
}


function LAMANU_scripts()
{
    $dir = plugin_dir_url(__FILE__) . "js/tarteaucitron/tarteaucitron.js";
    $dirSetting = plugin_dir_url(__FILE__) . "js/tarteaucitron/googleAnalytics.js"

?>
    <script type="text/javascript" src="<?= $dir ?>"></script>
    <script type="text/javascript">
        tarteaucitron.init({
            "privacyUrl": "",
            /* Privacy policy url */

            "hashtag": "#tarteaucitron",
            /* Open the panel with this hashtag */
            "cookieName": "tarteaucitron",
            /* Cookie name */

            "orientation": "top",
            /* Banner position (top - bottom) */

            "showAlertSmall": true,
            /* Show the small banner on bottom right */
            "cookieslist": true,
            /* Show the cookie list */

            "showIcon": false,
            /* Show cookie icon to manage cookies */
            "iconPosition": "BottomRight",
            /* BottomRight, BottomLeft, TopRight and TopLeft */

            "adblocker": false,
            /* Show a Warning if an adblocker is detected */

            "DenyAllCta": true,
            /* Show the deny all button */
            "AcceptAllCta": true,
            /* Show the accept all button when highPrivacy on */
            "highPrivacy": true,
            /* HIGHLY RECOMMANDED Disable auto consent */

            "handleBrowserDNTRequest": false,
            /* If Do Not Track == 1, disallow all */

            "removeCredit": false,
            /* Remove credit link */
            "moreInfoLink": true,
            /* Show more info link */

            "useExternalCss": false,
            /* If false, the tarteaucitron.css file will be loaded */
            "useExternalJs": false,
            /* If false, the tarteaucitron.js file will be loaded */

            //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

            "readmoreLink": "",
            /* Change the default readmore link */

            "mandatory": true,
            /* Show a message about mandatory cookies */

        });
        var setting = "<?= esc_attr(get_option("google-analytics-ID")) ?>"
    </script>
    <script src="<?= $dirSetting ?>"></script>
<?php }

?>