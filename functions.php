<?php
ob_start();
/*********************
INCLUDE NEEDED FILES
*********************/

// LOAD JOINTSWP CORE (if you remove this, the theme will break)
require_once(get_template_directory().'/library/joints.php');

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY // you can disable this if you like

include_once(get_template_directory().'/bower_components/acf/acf.php' );

require_once(get_template_directory().'/library/custom-post-type.php');

include_once(get_template_directory().'/bower_components/wpas/wpas.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once(get_template_directory().'/library/admin.php');

// SUPPORT FOR OTHER LANGUAGES (off by default)
// require_once(get_template_directory().'/library/translation/translation.php');

/*********************
MENUS & NAVIGATION
*********************/
// REGISTER MENUS
register_nav_menus(
	array(
		'top-nav' => __( 'The Top Menu' ),   // main nav in header
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);

// THE TOP MENU


// THE MAIN MENU
function joints_main_nav() {
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'jointstheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// THE FOOTER MENU
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'jointstheme' ),   // nav name
    	'menu_class' => 'sub-nav',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_fallback'  // fallback function
	));
} /* end joints footer link */

// HEADER FALLBACK MENU
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// FOOTER FALLBACK MENU
function joints_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/

// SIDEBARS AND WIDGETIZED AREAS
function joints_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'jointstheme'),
		'description' => __('The first (primary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'jointstheme'),
		'description' => __('The offcanvas sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointstheme'),
		'description' => __('The second (secondary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'jointstheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointstheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'jointstheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'jointstheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

//Add extra user profile fields

function fb_add_custom_user_profile_fields( $user ) {
?>
	<h3><?php _e('Extra Profile Information', 'your_textdomain'); ?></h3>

	<table class="form-table">
        <tr>
			<th>
				<label for="rc11Role"><?php _e('RC-11 Role', 'your_textdomain'); ?>
			</label></th>
			<td>
                <input type="text" name="rc11Role" id="rc11Role" value="<?php echo esc_attr( get_the_author_meta( 'rc11Role', $user->ID ) ); ?>" class="regular-text"/><br />
				<span class="description"><?php _e('Please enter your role within RC-11 eg: president, committee member.', 'your_textdomain'); ?></span>
			</td>
		</tr>
        <tr>
			<th>
				<label for="jobTitle"><?php _e('Job Title', 'your_textdomain'); ?>
			</label></th>
			<td>
                <input type="text" name="jobTitle" id="jobTitle" value="<?php echo esc_attr( get_the_author_meta( 'jobTitle', $user->ID ) ); ?>" class="regular-text"/><br />
				<span class="description"><?php _e('Please enter your job title.', 'your_textdomain'); ?></span>
			</td>
		</tr>
         <tr>
			<th>
				<label for="organisation"><?php _e('Organisation', 'your_textdomain'); ?>
			</label></th>
			<td>
                <input type="text" name="organisation" id="organisation" value="<?php echo esc_attr( get_the_author_meta( 'organisation', $user->ID ) ); ?>" class="regular-text"/><br />
				<span class="description"><?php _e('Please enter your academic institution.', 'your_textdomain'); ?></span>
			</td>
		</tr>
		  <tr>
			<th>
				<label for="twitter"><?php _e('Twitter', 'your_textdomain'); ?>
			</label></th>
			<td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text"/><br />
				<span class="description"><?php _e('Please enter your <strong>Twitter</strong> profile url. For example,<strong> https://twitter.com/bbcnews</strong>.', 'your_textdomain'); ?></span>
			</td>
		</tr>
        <tr>
			<th>
				<label for="linkedin"><?php _e('Linkedin', 'your_textdomain'); ?>
			</label></th>
			<td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text"/><br />
				<span class="description"><?php _e('Please enter your <strong>Linkedin</strong> profile url.', 'your_textdomain'); ?></span>
			</td>
		</tr>
	</table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return FALSE;

	update_usermeta( $user_id, 'jobTitle', $_POST['jobTitle'] );
	update_usermeta( $user_id, 'organisation', $_POST['organisation'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_usermeta( $user_id, 'rc11Role', $_POST['rc11Role'] );
}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );

//Disable Emojicons

function pw_remove_emojicons()
{
    // Remove from comment feed and RSS
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // Remove from emails
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    // Remove from head tag
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

    // Remove from print related styling
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    // Remove from admin area
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'pw_remove_emojicons' );

//Get user role function lets a conditional be used in author.php to check user role and output content accordingly

function get_user_role($id)
{
    $user = new WP_User($id);
    return array_shift($user->roles);
}

//Add RC11 Member and Committee Member role - both with identical editing rights, but separating the roles allows for the Committee Page Template to work


$result = add_role( 'president', __(

'President' ),

array(

'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_post' => true, // Allows user to edit their own posts
'edit_published_posts' => true,
'edit_pages' => true, // Allows user to edit pages
'edit_published_pages' => true,
'edit_others_pages' => true,
'publish_pages' => true,
'edit_others_posts' => true, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => false, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // false denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'update_core' => false // user cant perform core updates

));



$result = add_role( 'secretary', __(

'Secretary' ),

array(

'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_published_posts' => true,
'edit_pages' => true, // Allows user to edit pages
'edit_published_pages' => true,
'edit_others_pages' => true,
'publish_pages' => true,
'edit_others_posts' => true, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => false, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // false denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'update_core' => false // user cant perform core updates

));

function change_editor_name() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    //You can list all currently available roles like this...
    //$roles = $wp_roles->get_names();
    //print_r($roles);

    //You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
    $wp_roles->roles['editor']['name'] = 'Committee Member';
    $wp_roles->role_names['editor'] = 'Committee Member';
}
add_action('init', 'change_editor_name');

function change_role_name() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    //You can list all currently available roles like this...
    //$roles = $wp_roles->get_names();
    //print_r($roles);

    //You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
    $wp_roles->roles['author']['name'] = 'RC-11 Member';
    $wp_roles->role_names['author'] = 'RC-11 Member';
}
add_action('init', 'change_role_name');


// adding custom capabilities for the report CPT allow president, secretary and administrator to publish, delete etc.
function add_theme_caps() {
    // gets the president role
    $admins = get_role( 'president' );

    $admins->add_cap( 'edit_report' );
    $admins->add_cap( 'edit_reports' );
    $admins->add_cap( 'edit_others_reports' );
    $admins->add_cap( 'publish_reports' );
    $admins->add_cap( 'read_report' );
    $admins->add_cap( 'read_private_reports' );
    $admins->add_cap( 'delete_reports' );
    $admins->add_cap( 'edit_published_reports' );
}
add_action( 'admin_init', 'add_theme_caps');

function add_sectheme_caps() {
    // gets the secretary role
    $admins = get_role( 'secretary' );

    $admins->add_cap( 'edit_report' );
    $admins->add_cap( 'edit_reports' );
    $admins->add_cap( 'edit_others_reports' );
    $admins->add_cap( 'publish_reports' );
    $admins->add_cap( 'read_report' );
    $admins->add_cap( 'read_private_reports' );
    $admins->add_cap( 'delete_reports' );
    $admins->add_cap( 'edit_published_reports' );
}
add_action( 'admin_init', 'add_sectheme_caps');

function add_admintheme_caps() {
    // gets the secretary role
    $admins = get_role( 'administrator' );

    $admins->add_cap( 'edit_report' );
    $admins->add_cap( 'edit_reports' );
    $admins->add_cap( 'edit_others_reports' );
    $admins->add_cap( 'publish_reports' );
    $admins->add_cap( 'read_report' );
    $admins->add_cap( 'read_private_reports' );
    $admins->add_cap( 'delete_reports' );
    $admins->add_cap( 'delete_others_reports' );
    $admins->add_cap( 'delete_published_reports' );
    $admins->add_cap( 'edit_published_reports' );
}
add_action( 'admin_init', 'add_admintheme_caps');

add_filter( 'pre_get_posts', 'my_get_posts' );


//adds announcement and reports CPT to the author page query

function my_get_posts( $query ) {

	if ( is_author() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'page', 'announcement', 'report' ) );

	return $query;
}

add_action('init', 'soa_author_base');
function soa_author_base(){
    global $wp_rewrite;
    $author_slug = 'member_contribution';
    $wp_rewrite->author_base=$author_slug;
}

//testing custom capabilities

// Filter to fix the Post Author Dropdown
add_filter('wp_dropdown_users', 'theme_post_author_override');
function theme_post_author_override($output)
{
    global $post, $user_ID;

  // return if this isn't the theme author override dropdown
  if (!preg_match('/post_author_override/', $output)) return $output;

  // return if we've already replaced the list (end recursion)
  if (preg_match ('/post_author_override_replaced/', $output)) return $output;

  // replacement call to wp_dropdown_users
    $output = wp_dropdown_users(array(
      'echo' => 0,
        'name' => 'post_author_override_replaced',
        'selected' => empty($post->ID) ? $user_ID : $post->post_author,
        'include_selected' => true
    ));

    // put the original name back
    $output = preg_replace('/post_author_override_replaced/', 'post_author_override', $output);

  return $output;
}

add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');

// add post-type archives to menu link options

function wpclean_add_metabox_menu_posttype_archive() {
add_meta_box('wpclean-metabox-nav-menu-posttype', 'Custom Post Type Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}

function wpclean_metabox_menu_posttype_archive() {
$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');

if ($post_types) :
    $items = array();
    $loop_index = 999999;

    foreach ($post_types as $post_type) {
        $item = new stdClass();
        $loop_index++;

        $item->object_id = $loop_index;
        $item->db_id = 0;
        $item->object = 'post_type_' . $post_type->query_var;
        $item->menu_item_parent = 0;
        $item->type = 'custom';
        $item->title = $post_type->labels->name;
        $item->url = get_post_type_archive_link($post_type->query_var);
        $item->target = '';
        $item->attr_title = '';
        $item->classes = array();
        $item->xfn = '';

        $items[] = $item;
    }

    $walker = new Walker_Nav_Menu_Checklist(array());

    echo '<div id="posttype-archive" class="posttypediv">';
    echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
    echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
    echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
    echo '</ul>';
    echo '</div>';
    echo '</div>';

    echo '<p class="button-controls">';
    echo '<span class="add-to-menu">';
    echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'andromedamedia') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
    echo '<span class="spinner"></span>';
    echo '</span>';
    echo '</p>';

endif;
}

/**
 * Remove admin bar for all non-admins
*/

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}


add_filter( 'wp_nav_menu_items', 'add_login_link', 10, 2);
/**
 * Add a login/logout link, edit profile and add new articles etc links for logged in users
 */
function add_login_link( $items, $args )
{
    if($args->theme_location == 'main-nav')
    {
        if (!is_user_logged_in())
        {
            $items .= '<li><a href="'. wp_login_url() .'">Log In</a></li>';
        }
    }
    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_logout_link', 10, 2);
/**
 * Add a login/logout link, edit profile and add new articles etc links for logged in users
 */
function add_logout_link( $items, $args )
{
    if($args->theme_location == 'footer-links')
    {
        if (current_user_can('administrator')||current_user_can('president')||current_user_can('secretary') && is_user_logged_in())
        {
            $items .= '<li><a href="' . admin_url() . 'post-new.php">Add News/Article</a></li>';
            $items .= '<li><a href="' . admin_url() . 'post-new.php?post_type=announcement">Add Member Announcement</a></li>';
            $items .= '<li><a href="' . admin_url() . 'post-new.php?post_type=report">Add President/Secretary Report</a></li>';
            $items .= '<li><a href="' . admin_url() . 'post-new.php?post_type=conference">Add RC11 Conference</a></li>';
            $items .= '<li><a href="'. get_edit_user_link() .'">Edit Profile</a></li>';
            $items .= '<li class="logout"><a href="'. wp_logout_url(home_url()) .'">Log Out</a></li>';

        } elseif (current_user_can('editor') && is_user_logged_in())
        {
            $items .= '<li><a href="' . admin_url() . 'post-new.php">Add News/Article</a></li>';
            $items .= '<li><a href="' . admin_url() . 'post-new.php?post_type=announcement">Add Member Announcement</a></li>';
            $items .= '<li><a href="' . admin_url() . 'post-new.php?post_type=conference">Add RC11 Conference</a></li>';
            $items .= '<li><a href="'. get_edit_user_link() .'">Edit Profile</a></li>';
            $items .= '<li class="logout"><a href="'. wp_logout_url(home_url()) .'">Log Out</a></li>';

        }
        elseif (current_user_can('author') && is_user_logged_in())
        {
            $items .= '<li><a href="' . admin_url() . 'post-new.php">Add News/Article</a></li>';
            $items .= '<li><a href="' . admin_url() . 'post-new.php?post_type=announcement">Add Member Announcement</a></li>';
            $items .= '<li><a href="'. get_edit_user_link() .'">Edit Profile</a></li>';
            $items .= '<li class="logout"><a href="'. wp_logout_url(home_url()) .'">Log Out</a></li>';

        }
    }
    return $items;
}

/**
 * Redirect non-admins to the home page on login
*/
add_filter( 'login_redirect', 'login_redirect_example', 10, 3 );

function login_redirect_example( $redirect_to, $request, $user ) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) ) {
            return admin_url();
        } else {
            return home_url();
            }
    }
    return;
}

/**
 * Change the post menu to article
 */
function change_post_menu_text() {
  global $menu;
  global $submenu;

  // Change menu item
  $menu[5][0] = 'News, Articles etc';

  // Change post submenu
  $submenu['edit.php'][5][0] = 'News, Articles etc';
  $submenu['edit.php'][10][0] = 'Add News, Articles etc';
  $submenu['edit.php'][16][0] = 'Tags';
}

add_action( 'admin_menu', 'change_post_menu_text' );



/**
 * Change the post type labels
 */
function change_post_type_labels() {
  global $wp_post_types;

  // Get the post labels
  $postLabels = $wp_post_types['post']->labels;
  $postLabels->name = 'News, Articles etc';
  $postLabels->singular_name = 'News, Articles';
  $postLabels->add_new = 'Add News/Article/Blog/Research Summary/Book Review/Obituary';
  $postLabels->add_new_item = 'Add News/Article/Blog/Research Summary/Book Review/Obituary';
  $postLabels->edit_item = 'Edit News, Articles';
  $postLabels->new_item = 'News, Articles';
  $postLabels->view_item = 'View News, Articles';
  $postLabels->search_items = 'Search News, Articles';
  $postLabels->not_found = 'No News + Articles found';
  $postLabels->not_found_in_trash = 'No News, Articles found in Trash';
}
add_action( 'init', 'change_post_type_labels' );


// remove links/menus from the admin bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the cont
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

?>
