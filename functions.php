<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function theme_enqueue_styles() {
	// Get the theme data
    $the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    
    // REMOVING JQUERY MIGRATE AS OUR THEME IS ALREADY UPDATED
    wp_deregister_script( 'jquery' );
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    //wp_enqueue_script('jquery');

    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

    // without version for development
    wp_enqueue_script('understrap-child-flex-js', get_stylesheet_directory_uri() . '/js/understrap-child-flex.js', array());

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    /*For improving performance, avoid loading cf7 and recaptcha scripts all pages
    if(is_page(array(239, 237)) ) { # Only load CSS and JS on needed Pages	
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
            wp_enqueue_script( 'google-recaptcha' );
        }
    }
    */
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


// Remove wpcf7 script
add_filter( 'wpcf7_load_js', '__return_false' );


// IMPORT GOOGLE FONTS
/*
function wpb_add_google_fonts() {
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
*/


// IMPORT ADOBE FONTS
/*function wpb_add_adobe_fonts() {
    wp_enqueue_style( 'wpb-adobe-fonts', 'https://use.typekit.net/...', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_adobe_fonts' );*/


function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child-flex', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );




// ---------------------------------------------
// PERFORMANCE IMPROVEMENT SECTION
function defer_parsing_of_js($url)
{
    //echo $url . "<br /><br />";
    if (!is_admin()) {
        if (false === strpos($url, '.js')) {
            return $url;
        }

        if (strpos($url, 'jquery')) {
            //echo $url . " - jquery <br /><br />";
            return $url;
        }

        if (strpos($url, 'checkout')) {
            //echo $url . " - checkout <br /><br />";
            return $url;
        }

        /*if (strpos($url, 'recaptcha')) {
            if(is_page(array(239, 237)) ) {
                return $url;
            } else {
                return false;
            }
        }*/

        // add all js you dont wantto defer

        preg_match('/polyfill.*.\.js/', $url, $matches, PREG_OFFSET_CAPTURE);
        //print_r($matches);

        if (!empty($matches)) {
            return $url;
        }

        //echo "$url' defer " . "<br /><br />";

        return "$url' defer ";
    } else {
        return $url;
    }
}
//add_filter('clean_url', 'defer_parsing_of_js', 11, 1);

// DISABLING XML-RPC RSD link
remove_action('wp_head', 'rsd_link');

// REMOVING WP VERSION NUMBER
function crunchify_remove_version()
{
    return '';
}
add_filter('the_generator', 'crunchify_remove_version');

// REMOVING SHORTLINK
remove_action('wp_head', 'wp_shortlink_wp_head');

// REMOVING API.W.ORG link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// REMOVING EMOJIS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_filter( 'wpe_heartbeat_allowed_pages', function( $pages ) {
	global $pagenow;
	$pages[] =  $pagenow;
	return $pages;
});
// /--------------------------------------------

remove_action('shutdown', 'wp_ob_end_flush_all', 1);




// UNDERSTRAP CHILD FLEX WIDGETS
function understrap_child_flex_widgets_init() {
    register_sidebar(array(
        'name' => 'Social Media Menu',
        'id' => 'sm_menu_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'understrap_child_flex_widgets_init');


/**
 * Creating Social Media Menu Widget
 */
if (!class_exists('SMMenuWidget')) {
    class SMMenuWidget extends WP_Widget
    {
        /**
         * Sets up the widgets name etc
         */
        public function __construct()
        {
            $widget_ops = array(
                'classname' => 'sm_menu_widget',
                'description' => 'Understrap Child Flex Widget built with ACF Pro',
            );
            parent::__construct('sm_menu_widget', 'Social Media Menu Widget', $widget_ops);
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget($args, $instance)
        {
            // outputs the content of the widget
            if (!isset($args['widget_id'])) {
                $args['widget_id'] = $this->id;
            }

            // widget ID with prefix for use in ACF API functions
            $widget_id = 'widget_' . $args['widget_id'];            
            ?>

            <?php while (have_rows('social_media_menu', $widget_id)) { ?>
                <?php the_row();?>
                <?php $sm_name = get_sub_field('sm_name');?>
                <?php $sm_icon = get_sub_field('sm_icon');?>
                <?php $sm_link = get_sub_field('sm_link');?>

                <li>
                    <a href="<?php echo $sm_link; ?>" target="_blank" title="<?php echo $sm_name; ?>"><?php echo $sm_icon; ?></a>
                </li>  
            <?php } ?>
        <?php 
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form($instance)
        {
            // outputs the options form on admin
        }

        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         *
         * @return array
         */
        public function update($new_instance, $old_instance)
        {
            // processes widget options to be saved
        }
    }
}


/**
 * Register UCF Widgets
 */
function nb_register_widgets() {
    register_widget('SMMenuWidget');
}
add_action('widgets_init', 'nb_register_widgets');


/**
 * Display widget area with shortcode.
 *
 * @since  1.0.0
 *
 * @return string
 */
function prefix_widget_area_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts,
        'widget_area'
    );
    ob_start();
    dynamic_sidebar($atts['id']);
    return ob_get_clean();
}
add_shortcode( 'widget_area', 'prefix_widget_area_shortcode' );


function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}




// ------------- WOO RELATED FUNCTIONS ----------------
/** Show breadcrumbs */
/*
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    add_action('woocommerce_before_single_product_summary', 'woocommerce_breadcrumb', 5);
    add_action('woocommerce_before_shop_loop', 'woocommerce_breadcrumb', 5);
}
*/

/*
add_filter( 'woocommerce_product_subcategories_hide_empty', '__return_false' );
*/

/** Remove categories from shop and other pages
 * in Woocommerce
 */
/*
add_filter( 'get_terms', 'wc_hide_selected_terms', 10, 3 );
function wc_hide_selected_terms( $terms, $taxonomies, $args ) {
    $new_terms = array();
    if ( in_array( 'product_cat', $taxonomies ) && !is_admin() && is_shop() ) {
        foreach ( $terms as $key => $term ) {
              if ( ! in_array( $term->slug, array( 'uncategorized' ) ) ) {
                $new_terms[] = $term;
              }
        }
        $terms = $new_terms;
    }
    return $terms;
}
*/

/**
 * Remove related products output
 */
/*
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
*/

/**
 * Redirect users after add to cart.
 */
/*
function my_custom_add_to_cart_redirect( $url ) {
	$url = WC()->cart->get_checkout_url();
	// $url = wc_get_checkout_url(); // since WC 2.5.0
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );
*/

/**
 * Allow HTML in term (category, tag) descriptions
 */
/*
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}

 
foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}
*/




// OTHER FUNCTIONS
function wpbsearchform( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search-page-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input class="field form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input class="ucf-bt btn-primary" type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
 
    return $form;
}
add_shortcode('wpbsearch', 'wpbsearchform');


function imgWebp($img_url, $img_alt, $has_mobile_ver = false) {
    //echo "[has mobile version: " . $has_mobile_ver . "] <br />";
    $img_html = "";
    
    $path = preg_replace("/(.+)\/themes.+/", "$1", get_template_directory());
    $filename = preg_replace("/.+(\/uploads\/.*)\.(jpg|jpeg|png)/", "$1", $img_url);
    preg_match('/(\.jpg|jpeg|png)/', $img_url, $re);
    $fileext = $re[0];
    $picwebp = $filename . ".webp";

    if ($has_mobile_ver) {
        $fileMobile = preg_replace("/.+(\/uploads\/.*)/", "$1", $has_mobile_ver);
    }
    $fileexistsWebp = $path . $picwebp;
    $fileexistsMobile = $path . $fileMobile;
    
    /*
    echo "[path: " . $path . "] <br />";
    echo "[filename: " . $filename . "] <br />";
    echo "[extension: " . $fileext . "] <br />";
    echo "[picwebp: " . $fileexistsWebp . "]";
    echo "[pic1024: " . $pic1024 . "]";
    echo "[pic500: " . $pic500 . "]";
    */

    $img_html = "<picture>";
    if (file_exists($fileexistsWebp)) { 
        $img_html .= "<source srcset='" . get_site_url() . "/wp-content/" . $picwebp . "' type='image/webp'>";
    }
    if ($has_mobile_ver) {
        //echo "[pic1024: " . $pic1024 . "]";
        if (file_exists($fileexistsMobile)) { 
            $img_html .= "<source media='(max-width: 768px)' srcset='" . get_site_url() . "/wp-content/" . $fileMobile . "' type='image/jpeg'>";
        }
    }
    $img_html .= "<source srcset='" . $img_url . "' type='image/jpeg'>";
    $img_html .= "<img src='" . $img_url . "' alt='". $img_alt . "'>";
    $img_html .= "</picture>";
     
    return $img_html;
}


function isMobileDevice(){
    //Return true if Mobile User Agent is detected
    //echo "<script>console.log('hello " . $_SERVER['HTTP_USER_AGENT'] . " ');</script>";
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}



