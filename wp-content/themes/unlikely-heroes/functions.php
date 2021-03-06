<?php
include 'functions/need-help-dashboard-widget.php';
include 'functions/customize-admin.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 940;

/** Tell WordPress to run smm_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'smm_setup' );

if ( ! function_exists( 'smm_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override smm_setup() in a child theme, add your own smm_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twitter Bootstrap Framework 1.0
 */
remove_action('wp_head', 'wp_generator');  

function smm_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'smm', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'smm' ),
		) );
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twitter Bootstrap Framework 1.0
 */
function smm_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'smm_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twitter Bootstrap Framework 1.0
 * @return int
 */
function smm_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'smm_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twitter Bootstrap Framework 1.0
 * @return string "Continue Reading" link
 */
function smm_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'smm' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and smm_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twitter Bootstrap Framework 1.0
 * @return string An ellipsis
 */
function smm_auto_excerpt_more( $more ) {
	return ' &hellip;' . smm_continue_reading_link();
}
add_filter( 'excerpt_more', 'smm_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twitter Bootstrap Framework 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function smm_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= smm_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'smm_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twitter Bootstrap Framework's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Twitter Bootstrap Framework 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since Twitter Bootstrap Framework 1.0
 * @deprecated Deprecated in Twitter Bootstrap Framework 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function smm_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'smm_remove_gallery_css' );

if ( ! function_exists( 'smm_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own smm_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twitter Bootstrap Framework 1.0
 */
function smm_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '%s <span class="says">says:</span>', 'smm' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'smm' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( __( '%1$s at %2$s', 'smm' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'smm' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
	break;
	case 'pingback'  :
	case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'smm' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'smm' ), ' ' ); ?></p>
		<?php
		break;
		endswitch;
	}
	endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override smm_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twitter Bootstrap Framework 1.0
 * @uses register_sidebar
 */
function smm_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'smm' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'smm' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'smm' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'smm' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'smm' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'smm' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'smm' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'smm' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'smm' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'smm' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'smm' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'smm' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
}
/** Register sidebars by running smm_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'smm_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twitter Bootstrap Framework 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twitter Bootstrap Framework styling.
 *
 * @since Twitter Bootstrap Framework 1.0
 */
function smm_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'smm_remove_recent_comments_style' );

if ( ! function_exists( 'smm_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twitter Bootstrap Framework 1.0
 */
function smm_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s', 'smm' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
			),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'smm' ), get_the_author() ),
			get_the_author()
			)
		);
}
endif;

if ( ! function_exists( 'smm_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twitter Bootstrap Framework 1.0
 */
function smm_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'smm' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'smm' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'smm' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
		);
}
endif;

function bootstrap_menu() { ?>
<?php wp_list_pages('title_li&show_home=1'); ?>
<?php }
add_filter( 'wp_page_menu', 'bootstrap_menu' );

// Add's classes to default wp_nav() output to utilize the Bootstraps menu
class Bootstrap_Menu_Walker extends Walker_Nav_Menu{
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		if ( !$element )
			return;
		$id_field = $this->db_fields['id'];
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );		
		if( ! empty( $children_elements[$element->$id_field] ) )
			array_push($element->classes,'dropdown');
		$cb_args = array_merge( array(&$output, $element, $depth), $args);	
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
		$id = $element->$id_field;
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
			foreach( $children_elements[ $id ] as $child ){
				if ( !isset($newlevel) ) {
					$newlevel = true;
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}
		if ( isset($newlevel) && $newlevel ){
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}

// Default WordPress pagination tweaked to use page numbers
function bootstrap_pagination(){
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;
	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'prev_text' => 'Prev',
			'next_text' => 'Next',
			'type' => 'list'
			));
	}
}

// Enqueue jQuery right from the get go for Hashgrid
function getgo_method() {
	wp_enqueue_script( 'jquery' );
}    

add_action('wp_enqueue_scripts', 'getgo_method');

function id_add_custom_types( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set( 'post_type', array(
			'post', 'ignition_product'
			));
		return $query;
	}
}
add_filter( 'pre_get_posts', 'id_add_custom_types' );

function the_project_summary($id) {
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$small_image_url = the_project_image_small($id, "2");
	$image_url = the_project_image($id, "1");
	$name = get_post_meta($id, 'ign_product_name', true);
	$short_desc = html_entity_decode(get_post_meta($id, 'ign_project_description', true));
	$total = get_fund_total($id);
	$goal = the_project_goal($id);
	$end = get_post_meta($id, 'ign_fund_end', true);
	$end_type = get_post_meta($id, 'ign_end_type', true);
	// ID Function
	// GETTING product default settings
	$default_prod_settings = getProductDefaultSettings();

	// Getting product settings and if they are not present, set the default settings as product settings
	$prod_settings = getProductSettings($project_id);
	if (empty($prod_settings)) {
		$prod_settings = $default_prod_settings;
	}
	$currency_code = $prod_settings->currency_code;
	//GETTING the currency symbols
	$cCode = setCurrencyCode($currency_code);

	if ($end !== '') {
		$show_dates = true;
		$end = str_replace('/', ' ', $end);
		$end = str_replace('-', ' ', $end);
		if (is_array($end)) {
			$end_string = $end[2].'-'.$end[0].'-'.$end[1];

			$end_date = strtotime($end_string);

			$now = time();

			$dif = number_format(($end_date - $now)/86400);
			if ($dif < 0) {
				$dif = 0;
			}
		}
		else ($dif = 0);
	}
	else {
		$show_dates = false;
	}
	
	// percentage bar
	if ($total == 0 || $total == '') {
		$percentage = 0;
	}
	else {
		$percentage = $total / $goal * 100;
	}
	
	$summary =  new stdClass;
	$summary->end_type = $end_type;
	$summary->image_url = $image_url;
	$summary->name = $name;
	$summary->short_description = $short_desc;
	$summary->total = $total;
	$summary->goal = $goal;
	$summary->show_dates = $show_dates;
	if ($show_dates == true) {
		$summary->days_left = $dif;
	}
	$summary->percentage = $percentage;
	$summary->currency_code = $cCode;
	return $summary;
}

function the_project_content($id) {
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$name = get_post_meta($id, 'ign_product_name', true);
	$short_desc = html_entity_decode(get_post_meta($id, 'ign_project_description', true));
	$long_desc = get_post_meta($id, 'ign_project_long_description', true);
	
	$content = new stdClass;
	$content->name = $name;
	$content->short_description = $short_desc;
	$content->long_description = apply_filters('fh_project_content', html_entity_decode($long_desc), $project_id);
	return $content;
}

function the_project_hDeck($id) {

// *payment button, *learn more,
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$goal = the_project_goal($id);

	$total = get_fund_total($id);
	// GETTING product default settings
	$default_prod_settings = getProductDefaultSettings();
	$end_type = get_post_meta($id, 'ign_end_type', true);

	// Getting product settings and if they are not present, set the default settings as product settings
	$prod_settings = getProductSettings($project_id);
	if (empty($prod_settings)) {
		$prod_settings = $default_prod_settings;
	}
	$currency_code = $prod_settings->currency_code;
	//GETTING the currency symbols
	$cCode = setCurrencyCode($currency_code);
	// date info
	$end_raw = get_post_meta($id, 'ign_fund_end', true);

	if ($end_raw !== '') {
		$show_dates = true;
		$end = str_replace('/', ' ', $end_raw);
		$end = explode(' ', $end);
		$end_string = $end[2].'-'.$end[0].'-'.$end[1];

		$month = $end[0];
		$day = $end[1];
		$year = $end[2];
		$end_date = strtotime($end_string);
		$now = time();
		// days left
		$dif = number_format(($end_date - $now)/86400);
		if ($dif < 0) {
			$dif = 0;
		}
	}
	else {
		$show_dates = false;
	}

	// percentage bar
	if ($total == 0) {
		$percentage = 0;
	}
	else {
		$percentage = $total / $goal * 100;
	}
	$pledges_count = get_backer_total($id);
	$button_url = null;

	$hDeck = new stdClass;
	$hDeck->end_type = $end_type;
	$hDeck->goal = $goal;
	$hDeck->total = $total;
	$hDeck->show_dates = $show_dates;
	if ($show_dates == true) {
		$hDeck->end = $end_raw;
		$hDeck->day = $day;
		$hDeck->month = date('F', mktime(0, 0, 0,$month, 10));
		$hDeck->year = $year;
		$hDeck->days_left = $dif;
	}
	
	$hDeck->percentage = $percentage;
	$hDeck->pledges = $pledges_count;
	$hDeck->currency_code = $cCode;
	return $hDeck;
}

function the_project_video($id) {
	$video = get_post_meta($id, 'ign_product_video', true);
	return html_entity_decode($video);
}

function the_levels($id) {
	global $wpdb;
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$level_count = get_post_meta($id, 'ign_product_level_count', true);

	// GETTING product default settings
	$default_prod_settings = getProductDefaultSettings();

	// Getting product settings and if they are not present, set the default settings as product settings
	$prod_settings = getProductSettings($project_id);
	if (empty($prod_settings)) {
		$prod_settings = $default_prod_settings;
	}
	$currency_code = $prod_settings->currency_code;
	//GETTING the currency symbols
	$cCode = setCurrencyCode($currency_code);
	$level_data = array();
	for ($i=1; $i <= $level_count; $i++) {
		$level_sales = $wpdb->prepare('SELECT COUNT(*) as count FROM '.$wpdb->prefix.'ign_pay_info WHERE product_id=%d AND product_level = %d', $project_id, $i);
		$return_sales = $wpdb->get_row($level_sales);
		$level_sales = $return_sales->count;
		if ($i == 1) {
			$level_title = html_entity_decode(get_post_meta($id, 'ign_product_title', true));
			$level_desc = html_entity_decode(get_post_meta($id, 'ign_product_details', true));
			$level_price = get_post_meta($id, 'ign_product_price', true);
			if ($level_price > 0) {
				$level_price = number_format($level_price, 0, '.', ',');
			}
			$level_limit = get_post_meta($id, 'ign_product_limit', true);
			$level_order = get_post_meta($id, 'ign_projectmeta_level_order', true);
			$level_data[] = array('id' => $i,
				'title' => $level_title,
				'description' => $level_desc,
				'price' => $level_price,
				'sold' => $level_sales,
				'limit' => $level_limit,
				'currency_code' => $cCode,
				'order' => $level_order);	
		}
		else {
			$level_title = html_entity_decode(get_post_meta($id, 'ign_product_level_'.$i.'_title', true));
			$level_desc = html_entity_decode(get_post_meta($id, 'ign_product_level_'.$i.'_desc', true));
			$level_price = get_post_meta($id, 'ign_product_level_'.$i.'_price', true);
			if ($level_price > 0) {
				$level_price = number_format($level_price, 0, '.', ',');
			}
			$level_limit = get_post_meta($id, 'ign_product_level_'.$i.'_limit', true);
			$level_order = get_post_meta($id, 'ign_product_level_'.$i.'_order', true);
			$level_data[] = array('id' => $i,
				'title' => $level_title,
				'description' => $level_desc,
				'price' => $level_price,
				'limit' => $level_limit,
				'sold' => $level_sales,
				'currency_code' => $cCode,
				'order' => $level_order);	
		}
		
	}
	return $level_data;
}

function fh_level_sort($a, $b) {
	return $a['order'] == $b['order'] ? 0 : ($a['order'] > $b['order']) ? 1 : -1;
}

function have_projects() {
	global $wpdb;

	$proj_return = get_ign_projects();
	if ($proj_return) {
		return true;
	}
	else {
		return false;
	}
}
// not in use --
function the_project($id) {
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$project = get_ign_project($project_id);
	$pay_info = get_pay_info($project_id);
	$fund_total = array('fund_total' => get_fund_total($pay_info));
	$meta = get_post_meta($id);
	$the_project = array_merge( $project, $pay_info, $fund_total, $meta);
	return $the_project;
}

function get_ign_project($id) {
	global $wpdb;
	$proj_query = $wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'ign_products WHERE id=%d', absint($id));
	$proj_return = $wpdb->get_row($proj_query);
	return $proj_return;
}

function get_ign_projects() {
	global $wpdb;
	$proj_query = 'SELECT * FROM '.$wpdb->prefix.'ign_products';
	$proj_return = $wpdb->get_results($proj_query);
	return $proj_return;
}

function get_pay_info($id) {
	global $wpdb;
	$pay_query = $wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'ign_pay_info WHERE product_id=%d', absint($id));
	$pay_return = $wpdb->get_results($pay_query);
	return $pay_return;
}

function get_fund_total($id) {
	$project_id = get_post_meta($id, 'ign_project_id', true);

	$pay_info = get_pay_info($project_id);
	$total = 0;
	foreach ($pay_info as $fund) {
		$total = $total + $fund->prod_price;
	}
	return $total;
}

function get_backer_total($id) {
	global $wpdb;
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$get_pledgers = $wpdb->prepare('SELECT COUNT(*) AS count FROM '.$wpdb->prefix.'ign_pay_info WHERE product_id=%d', $project_id);
	$return_pledgers = $wpdb->get_row($get_pledgers);
	return $return_pledgers->count;
}

// Image Sizes added and Allowing to select those image sizes in Media Insert Admin
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'projectpage-large', 640, 9999 ); // For Project Pages with Unlimited Height allowed
	add_image_size( 'single-thumb', 697, 463, true); // For Campaign Summary boxes
	add_image_size( 'fivehundred_featured', 720, 435, true); // For campaign page
}

function the_project_image($id, $num) {
	if ($num == 1) {
		$project_id = get_post_meta($id, 'ign_project_id', true);
		global $wpdb;
		$url = get_post_meta($id, 'ign_product_image1', true);
		$sql = $wpdb->prepare('SELECT ID FROM '.$wpdb->prefix.'posts WHERE guid = %s', $url);
		$res = $wpdb->get_row($sql);
		if (isset($res->ID)) {
			$src = wp_get_attachment_image_src($res->ID, 'fivehundred_featured');
			$image = $src[0];
		} else {
			$image = $url;
		}
	}
	else {
		$key = 'ign_product_image'.$num;
		$image = get_post_meta($id, $key, true);
	}
	
	return $image;
}

function the_project_image_thumb($id, $num) {
	if ($num == 1) {
		$project_id = get_post_meta($id, 'ign_project_id', true);
		global $wpdb;
		$url = get_post_meta($id, 'ign_product_image1', true);
		$sql = $wpdb->prepare('SELECT ID FROM '.$wpdb->prefix.'posts WHERE guid = %s', $url);
		$res = $wpdb->get_row($sql);
		if (isset($res->ID)) {
			$src = wp_get_attachment_image_src($res->ID, 'single-thumb');
			$image = $src[0];
		} else {
			$image = $url;
		}
	}
	else {
		$key = 'ign_product_image'.$num;
		$image = get_post_meta($id, $key, true);
	}
	
	return $image;
}

// function the_project_image_thumb($id, $num) {
// if ($num == 1) {
// $project_id = get_post_meta($id, 'ign_project_id', true);
// global $wpdb;
// $url = get_post_meta($id, 'ign_product_image1', true);
// $extension = pathinfo($url, PATHINFO_EXTENSION);
// $image = str_replace('.'.$extension, '', $url).'-697x463.'.$extension;
// }
// else {
// $key = 'ign_product_image'.$num;
// $image = get_post_meta($id, $key, true);
// }

// return $image;
// }

function the_project_image_small($id, $num) {
	if ($num == 1) {
		$project_id = get_post_meta($id, 'ign_project_id', true);
		global $wpdb;
		$url = get_post_meta($id, 'ign_product_image1', true);
		$sql = $wpdb->prepare('SELECT ID FROM '.$wpdb->prefix.'posts WHERE guid = %s', $url);
		$res = $wpdb->get_row($sql);
		if (isset($res->ID)) {
			$src = wp_get_attachment_image_src($res->ID, 'single-thumb');
			$image = $src[0];
		} else {
			$image = $url;
		}
	}
	else {
		$key = 'ign_product_image'.$num;
		$image = get_post_meta($id, $key, true);
	}
	
	return $image;
}

function the_project_goal($id) {
	global $wpdb;
	$project_id = get_post_meta($id, 'ign_project_id', true);
	$goal_query = $wpdb->prepare('SELECT goal FROM '.$wpdb->prefix.'ign_products WHERE id=%d', $project_id);
	$goal_return = $wpdb->get_row($goal_query);
	return $goal_return->goal;
}

function the_short_title($limit) {
	$title = get_the_title($post->ID);
	if(strlen($title) > $limit) {
		$title = substr($title, 0, $limit) . '...';
	}

	echo $title;
}

// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'page', 'ignition_project' ) );
	return $query;
}

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

add_filter( 'parse_query', 'exclude_pages_from_admin' );
function exclude_pages_from_admin($query) {
	global $pagenow,$post_type;
	if (is_admin() && $pagenow=='edit.php' && $post_type =='page') {
		$query->query_vars['post__not_in'] = array('941', '990');
	}
}

add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  
function custom_image_sizes_choose( $sizes ) {  
	$custom_sizes = array(  
		'projectpage-large' => 'Project Page Full Width',
		'single-thumb' => 'Single Post Thumb',
		'fivehundred_featured' => 'Fivehundred Feature'  
		);  
	return array_merge( $sizes, $custom_sizes );  
}

function soi_login_redirect( $redirect_to, $request, $user  ) {
	return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : site_url('/dashboard/');
} // end soi_login_redirect
add_filter( 'login_redirect', 'soi_login_redirect', 10, 3 );

function baw_no_admin_access()
{
	if( !current_user_can( 'administrator' ) ) {
		wp_redirect( home_url() );
		die();
	}
}
add_action( 'admin_init', 'baw_no_admin_access', 1 );