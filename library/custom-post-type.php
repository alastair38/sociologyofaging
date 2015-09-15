<?php
/* custom post-type for storing member contributions

*/

function rc11_contributions() {
	// creating (registering) the custom type
	register_post_type( 'announcement', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Announcements', 'rc11theme'), /* This is the Title of the Group */
			'singular_name' => __('Announcement', 'rc11theme'), /* This is the individual type */
			'all_items' => __('All Announcements', 'rc11theme'), /* the all items menu item */
			'add_new' => __('Add New Announcement', 'rc11theme'), /* The add new menu item */
			'add_new_item' => __('Add New Announcement', 'rc11theme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'rc11theme' ), /* Edit Dialog */
			'edit_item' => __('Edit Announcement', 'rc11theme'), /* Edit Display Title */
			'new_item' => __('New Announcement', 'rc11theme'), /* New Display Title */
			'view_item' => __('View Announcement', 'rc11theme'), /* View Display Title */
			'search_items' => __('Search Announcements', 'rc11theme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'rc11theme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'rc11theme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'RC11 Announcements', 'rc11theme' ), /* Custom Type Description */

			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-clipboard', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'announcements', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */


}
	// adding the function to the Wordpress init
	add_action( 'init', 'rc11_contributions');


 register_taxonomy( 'contribution_type',
    	array('announcement'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */
    		'labels' => array(
    			'name' => __( 'Announcement Types', 'rc11theme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Announcement Type', 'rc11theme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Announcement Types', 'rc11theme' ), /* search title for taxomony */
    			'all_items' => __( 'All Announcement Types', 'rc11theme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Type', 'rc11theme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Type:', 'rc11theme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Announcement Type', 'rc11theme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Announcement Type', 'rc11theme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Announcement Type', 'rc11theme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Announcement Type Name', 'rc11theme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'announcement_category' ),
    	)
    );


function rc11_reports() {
	// creating (registering) the custom type
	register_post_type( 'report', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('President + Secretary Reports', 'rc11theme'), /* This is the Title of the Group */
			'singular_name' => __('Report', 'rc11theme'), /* This is the individual type */
			'all_items' => __('All Reports', 'rc11theme'), /* the all items menu item */
			'add_new' => __('Add New Report', 'rc11theme'), /* The add new menu item */
			'add_new_item' => __('Add New Report', 'rc11theme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'rc11theme' ), /* Edit Dialog */
			'edit_item' => __('Edit Report', 'rc11theme'), /* Edit Display Title */
			'new_item' => __('New Report', 'rc11theme'), /* New Display Title */
			'view_item' => __('View Report', 'rc11theme'), /* View Display Title */
			'search_items' => __('Search Reports', 'rc11theme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'rc11theme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'rc11theme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'RC11 President + Secretary Reports', 'rc11theme' ), /* Custom Type Description */

			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-media-document', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'reports', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'report',
            'capabilities' => array(
        'edit_post' => 'edit_report',
        'edit_posts' => 'edit_reports',
        'edit_others_posts' => 'edit_others_reports',
        'edit_published_posts' => 'edit_published_reports',
        'publish_posts' => 'publish_reports',
        'read_post' => 'read_report',
        'read_private_posts' => 'read_private_reports',
        'delete_posts' => 'delete_reports',
        'delete_others_posts' => 'delete_others_reports',
        'delete_published_posts' => 'delete_published_reports'
    ),
    // as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly
    'map_meta_cap' => true,
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */


}
	// adding the function to the Wordpress init
	add_action( 'init', 'rc11_reports');


 register_taxonomy( 'report_author',
    	array('report'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */
    		'labels' => array(
    			'name' => __( 'Report Author', 'rc11theme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Report Author', 'rc11theme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Report Authors', 'rc11theme' ), /* search title for taxomony */
    			'all_items' => __( 'All Report Authors', 'rc11theme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Type', 'rc11theme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Type:', 'rc11theme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Report Author', 'rc11theme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Report Author', 'rc11theme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Report Author', 'rc11theme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Report Author Name', 'rc11theme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'report_author' ),
    	)
    );

function rc11_conferences() {
	// creating (registering) the custom type
	register_post_type( 'conference', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Conferences', 'rc11theme'), /* This is the Title of the Group */
			'singular_name' => __('Conference', 'rc11theme'), /* This is the individual type */
			'all_items' => __('All Conferences', 'rc11theme'), /* the all items menu item */
			'add_new' => __('Add New Conference', 'rc11theme'), /* The add new menu item */
			'add_new_item' => __('Add New Conference', 'rc11theme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'rc11theme' ), /* Edit Dialog */
			'edit_item' => __('Edit Conference', 'rc11theme'), /* Edit Display Title */
			'new_item' => __('New Conference', 'rc11theme'), /* New Display Title */
			'view_item' => __('View Conferences', 'rc11theme'), /* View Display Title */
			'search_items' => __('Search Conferences', 'rc11theme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'rc11theme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'rc11theme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'RC11 Conferences', 'rc11theme' ), /* Custom Type Description */

			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-format-chat', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'conferences', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
				'capability_type' => 'conference',
            'capabilities' => array(
        'edit_post' => 'edit_conference',
        'edit_posts' => 'edit_conferences',
        'edit_others_posts' => 'edit_others_conferences',
        'edit_published_posts' => 'edit_published_conferences',
        'publish_posts' => 'publish_conferences',
        'read_post' => 'read_conference',
        'read_private_posts' => 'read_private_conferences',
        'delete_posts' => 'delete_conferences',
        'delete_others_posts' => 'delete_others_conferences',
        'delete_published_posts' => 'delete_published_conferences'
    ),
    // as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly
    'map_meta_cap' => true,
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'author', 'editor', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */

}
	// adding the function to the Wordpress init
	add_action( 'init', 'rc11_conferences');


 register_taxonomy( 'conference_category',
    	array('conference'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */
    		'labels' => array(
    			'name' => __( 'Conference Category', 'rc11theme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Conference Category', 'rc11theme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Conference Categories', 'rc11theme' ), /* search title for taxomony */
    			'all_items' => __( 'All Conference Categories', 'rc11theme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Category', 'rc11theme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Category:', 'rc11theme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Conference Category', 'rc11theme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Conference Category', 'rc11theme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Conference Category', 'rc11theme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Conference Category Name', 'rc11theme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'rc11_conferences' ),
    	)
    );



/*
Custom fields for contributions and posts, with conditional logic based on taxonomies to filter the correct fields for completion
*/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_author-details',
		'title' => 'Author Details',
		'fields' => array (
			array (
				'key' => 'field_55931a402fa1d',
				'label' => 'Author(s)',
				'name' => 'authors',
				'type' => 'textarea',
				'instructions' => 'Enter the authors as you would like them to appear on the website',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '4',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_55931a902fa1e',
				'label' => 'Email',
				'name' => 'author_email',
				'type' => 'email',
				'instructions' => 'Add a contact email',
				'default_value' => '',
				'placeholder' => 'eg: alastair@alastaircox.com',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_55931ab22fa1f',
				'label' => 'Your Website',
				'name' => 'website',
				'type' => 'text',
				'instructions' => 'Link to your website or online profile.',
				'default_value' => '',
				'placeholder' => 'Please prefix URLs with "http://" eg. http://www.bbc.co.uk NOT www.bbc.co.uk',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_conference-meeting-details',
		'title' => 'Conference / Meeting Details',
		'fields' => array (
			array (
				'key' => 'field_558c283f7fbde',
				'label' => 'Conference Name',
				'name' => 'conference_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Name of conference or meeting the call for papers relates to',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '3',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_cost-of-training',
		'title' => 'Cost of Training',
		'fields' => array (
			array (
				'key' => 'field_558c2af3e64a7',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Enter any cost for the training here',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '12',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_date-this-is-being-held',
		'title' => 'Date this is being held',
		'fields' => array (
			array (
				'key' => 'field_558c28da49c05',
				'label' => 'Start Date',
				'name' => 'date',
				'type' => 'date_picker',
				'instructions' => 'Add the start date for the conference, meeting or training',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
            array (
				'key' => 'field_55d0b1b23b2ce',
				'label' => 'End Date',
				'name' => 'end_date',
				'type' => 'date_picker',
				'instructions' => 'Add the end date for the conference, meeting or training',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '3',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
            array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '12',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '8',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_location',
		'title' => 'Location',
		'fields' => array (
			array (
				'key' => 'field_558c2bdd3bd61',
				'label' => 'Address',
				'name' => 'address',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'Add the location address here',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_558c2c013bd62',
				'label' => 'Map',
				'name' => 'google_map',
				'type' => 'google_map',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '12',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '8',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_publication-details',
		'title' => 'Publication Details',
		'fields' => array (
			array (
				'key' => 'field_558bf55f9096e',
				'label' => 'Publication Type',
				'name' => 'publication_type',
				'type' => 'select',
				'instructions' => 'Choose a category for your publication to be assigned to',
				'required' => 1,
				'choices' => array (
					'Book' => 'Book',
					'Book Chapter' => 'Book Chapter',
					'Journal' => 'Journal',
					'Report' => 'Report',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_558bf606ffd28',
				'label' => 'Authors',
				'name' => 'authors',
				'type' => 'textarea',
				'instructions' => 'Add the name(s) of the publication authors here',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Report',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Journal',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_558bf7e3cefe5',
				'label' => 'Book Name',
				'name' => 'book_name',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Enter the name of the book in which your chapter appeared',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
            	array (
				'key' => 'field_55b9ff3abdec5',
				'label' => 'Editors',
				'name' => 'editors',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Enter the names of the editors of the book your chapter appeared in',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_558bf842426ec',
				'label' => 'Year of Publication',
				'name' => 'year_of_publication',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Journal',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Report',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'placeholder' => 'Enter the year of publication',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_558bf968a872c',
				'label' => 'Publisher',
				'name' => 'publisher',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Report',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_558bf9eb92558',
				'label' => 'Place of Publication',
				'name' => 'place_of_publication',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Report',
						),
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_558bfafcf0736',
				'label' => 'Journal Name',
				'name' => 'journal_name',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Journal',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Enter the journal name in which your paper was published',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_558bfb1df0737',
				'label' => 'Volume',
				'name' => 'volume',
				'type' => 'number',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Journal',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Enter the volume number of the journal',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_558bfb54f0738',
				'label' => 'Issue',
				'name' => 'issue',
				'type' => 'number',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Journal',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Enter the issue number of the journal',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_558bfb73f0739',
				'label' => 'Page Numbers',
				'name' => 'page_numbers',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Journal',
						),
                        array (
							'field' => 'field_558bf55f9096e',
							'operator' => '==',
							'value' => 'Book Chapter',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'placeholder' => 'Enter the page numbers of your paper',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '10',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_set-this-meeting-as-featured',
		'title' => 'Set this meeting as featured',
		'fields' => array (
			array (
				'key' => 'field_558a7413e4979',
				'label' => 'Check box to feature',
				'name' => 'featured',
				'type' => 'checkbox',
				'instructions' => 'To display this prominently on the meetings page, please select the checkbox. This will need to be unselected whenever the meeting needs to be archived.',
				'choices' => array (
					'Yes' => 'Yes',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_parent',
					'operator' => '==',
					'value' => '42',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_submission-details',
		'title' => 'Submission Details',
		'fields' => array (
			array (
				'key' => 'field_558c29a59a38e',
				'label' => 'Deadline Date',
				'name' => 'deadline_date',
				'type' => 'date_picker',
				'instructions' => 'Add a deadline date (if there is one). Similarly, you can add a specific time of day for the deadline.',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_558c29c09a38f',
				'label' => 'Deadline Time',
				'name' => 'deadline_time',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '3',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '7',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
            array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '6',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
            array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '12',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_university-institution',
		'title' => 'University / Institution',
		'fields' => array (
			array (
				'key' => 'field_558c2a6d4fbe5',
				'label' => 'Institution',
				'name' => 'institution',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Enter the name of the institution / university (if relevant)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '7',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_contact-details',
		'title' => 'Contact Details',
		'fields' => array (
			array (
				'key' => 'field_558c2b7ed85cb',
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_558c2b91d85cc',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_558c2b9fd85cd',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '3',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '7',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '12',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 8,
	));
	register_field_group(array (
		'id' => 'acf_related-documents',
		'title' => 'Related Documents',
		'fields' => array (
			array (
				'key' => 'field_55931c347c124',
				'label' => 'Upload First Document',
				'name' => 'upload_one',
				'type' => 'file',
                'instructions' => 'Add a file related to you content',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_55931c5f7c125',
				'label' => 'Upload Second Document',
				'name' => 'upload_two',
				'type' => 'file',
                'instructions' => 'Use this field to add any further file related to you content',
				'save_format' => 'object',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 10,
	));
	register_field_group(array (
		'id' => 'acf_more-information',
		'title' => 'More Information',
		'fields' => array (
			array (
				'key' => 'field_558c32a01e49d',
				'label' => 'Link for more details',
				'name' => 'more_information',
				'type' => 'text',
				'instructions' => 'Use this to enter a URL to link to an external resource with more information pertaining to your submission.',
				'default_value' => '',
				'placeholder' => 'Please prefix URLs with "http://" eg. http://www.bbc.co.uk NOT www.bbc.co.uk',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '3',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '4',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '5',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '6',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '7',
					'order_no' => 0,
					'group_no' => 4,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '8',
					'order_no' => 0,
					'group_no' => 5,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '10',
					'order_no' => 0,
					'group_no' => 6,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '12',
					'order_no' => 0,
					'group_no' => 7,
				),
			),
			array (
				array (
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => '13',
					'order_no' => 0,
					'group_no' => 8,
				),
			),
            array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 11,
	));
    register_field_group(array (
		'id' => 'acf_getting-started',
		'title' => 'Getting Started',
		'fields' => array (
			array (
				'key' => 'field_55a4e1ee99646',
				'label' => 'Getting Started',
				'name' => '',
				'type' => 'message',
				'message' => 'Select an <strong>"Announcement Type"</strong> from the choice on the right-hand side and then complete the form fields that are made available.


	Any description you wish to include can be added to the main text editor (below the "Add Media" button)',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'announcement',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => -1,
	));
     register_field_group(array (
		'id' => 'acf_getting-started-news',
		'title' => 'Getting Started',
		'fields' => array (
			array (
				'key' => 'field_55d2067ec8bff',
				'label' => 'Getting Started',
				'name' => '',
				'type' => 'message',
				'message' => 'Select from the <strong>"Categories"</strong> list on the right-hand side. Please complete any of the form fields that are relevant to your content.


	Any description you wish to include can be added to the main text editor (below the "Add Media" button)',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
                0 => 'excerpt',
				1 => 'format',
                2 => 'tags',
			),
		),
		'menu_order' => -1,
	));
    register_field_group(array (
		'id' => 'acf_reminder',
		'title' => 'Reminder',
		'fields' => array (
			array (
				'key' => 'field_55a4ebea2fdb8',
				'label' => 'Reminder',
				'name' => '',
				'type' => 'message',
				'message' => 'Please remember to assign a <strong>Report Author</strong> (President or Secretary) from the box on the right-hand side before publishing.',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'report',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => -1,
	));
    register_field_group(array (
		'id' => 'acf_note-on-adding-new-rc-11-meetings',
		'title' => 'Note on Adding A New RC11 Conference',
		'fields' => array (
			array (
				'key' => 'field_55b77d4ba8c45',
				'label' => 'New Meeting',
				'name' => '',
				'type' => 'message',
				'message' => 'If you are adding a new conference - and wish this to feature on the main Conferences page - please select <strong>Latest</strong> from the <em>Conference Category</em> box on the right-hand side. If this is unchecked, the conference will only appear on the conference archives page.',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'conference',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
    	register_field_group(array (
		'id' => 'acf_adding-a-featured-image',
		'title' => 'Adding A Featured Image',
		'fields' => array (
			array (
				'key' => 'field_55d7153ddfee3',
				'label' => 'Images',
				'name' => '',
				'type' => 'message',
				'message' => 'This’ allows you to upload a single image file that will be displayed prominently with your content.<br><br> Click on the <strong>\'set featured image\'</strong> link below to get started.<br><br> Additional images can be added to the content directly using the \'Add Media\' button above the main text editor box.',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


?>
