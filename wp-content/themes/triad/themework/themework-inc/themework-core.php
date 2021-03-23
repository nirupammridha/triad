<?php
function themework_core(){
	add_theme_support( 'post-thumbnails' );
	themework_create_post_type('banner','Banner','banner');
	themework_create_post_type('service','Service','service');
	themework_create_post_type('sustainability','Sustainability','sustainability');
	themework_create_post_type('product','Product','product');
	themework_create_post_type('testimonial','Testimonial','testimonial');
}
function themework_create_post_type($post_type,$singular_name,$slug,$support=['title', 'editor', 'author', 'thumbnail', 'excerpt']) {
	$labels = array(
		'name'               => _x( $singular_name.'s', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( $singular_name, 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( $singular_name.'s', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( $singular_name, 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', $post_type, 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New '.$singular_name, 'your-plugin-textdomain' ),
		'new_item'           => __( 'New '.$singular_name, 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit '.$singular_name, 'your-plugin-textdomain' ),
		'view_item'          => __( 'View '.$singular_name, 'your-plugin-textdomain' ),
		'all_items'          => __( 'All '.$singular_name.'s', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search '.$singular_name.'s', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent '.$singular_name.':', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No '.$singular_name.'s found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No '.$singular_name.'s found in Trash.', 'your-plugin-textdomain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => $support
	);

	//taxonomy tag
	$tags = array(
	'name' => __( 'Tags' ),
	'singular_name' => __( 'Tag' ),
	'search_items' =>  __( 'Search Tags' ),
	'all_items' => __( 'All Tags' ),
	'edit_item' => __( 'Edit Tag' ),
	'update_item' => __( 'Update Tag' ),
	'add_new_item' => __( 'Add New Tag' ),
	'new_item_name' => __( 'New Tag' ),
    'menu_name' => __( 'Tags' )
    ); 	
 
	register_taxonomy($post_type.'-tags',
		array($post_type),
		array('hierarchical' => false,
		'labels' => $tags,
		'show_ui' => true,
		'public' => false,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tags' )
	));

	register_post_type( $post_type, $args );
}


//Add Custom Post type Team
function team_register() {  
		
		$member_labels = array(
	 	'name' => __( 'Members'),
		'singular_name' => __( 'Member'),
		'search_items' =>  __( 'Search Members'),
		'all_items' => __( 'All Members'),
		'parent_item' => __( 'Parent Member'),
		'edit_item' => __( 'Edit Member'),
		'update_item' => __( 'Update Member'),
		'add_new_item' => __( 'Add New Member'),
		'menu_name' => __( 'Team')
		);
		$team_menu_icon = 'dashicons-groups';	
		$args = array(
		'labels' => $member_labels,
		'rewrite' => array('slug' => 'team','with_front' => false),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'hierarchical' => false,
		'menu_position' => 25,
		'menu_icon' => $team_menu_icon,
		'supports' => array('title', 'editor', 'thumbnail', 'revisions')  
		); 
		//taxonomy category
		$member_categories = array(
		'name' => __( 'Categories' ),
		'singular_name' => __( 'Category' ),
		'search_items' =>  __( 'Search Categories' ),
		'all_items' => __( 'All Categories' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category' ),
		'menu_name' => __( 'Categories' )
		); 	
	 
		register_taxonomy('member-categories',
			array('team'),
			array('hierarchical' => true,
			'labels' => $member_categories,
			'show_ui' => true,
			'public' => false,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'categories' )
		));
		
		register_post_type( 'team' , $args );  
	}  
	add_action('init', 'team_register');

	//Add Custom Post type portfolio
function project_register() {  
		
		$project_labels = array(
	 	'name' => __( 'Projects'),
		'singular_name' => __( 'Project'),
		'search_items' =>  __( 'Search Projects'),
		'all_items' => __( 'All Projects'),
		'parent_item' => __( 'Parent Project'),
		'edit_item' => __( 'Edit Project'),
		'update_item' => __( 'Update Project'),
		'add_new_item' => __( 'Add New Project'),
		'menu_name' => __( 'Projects')
		);
		$project_menu_icon = 'dashicons-portfolio';	
		$args = array(
		'labels' => $project_labels,
		'rewrite' => array('slug' => 'project','with_front' => false),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'hierarchical' => false,
		'menu_position' => 20,
		'menu_icon' => $project_menu_icon,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')  
		);  
		
		register_post_type( 'project' , $args );  
	}  
	//taxonomy category
	$project_categories = array(
	'name' => __( 'Categories' ),
	'singular_name' => __( 'Category' ),
	'search_items' =>  __( 'Search Categories' ),
	'all_items' => __( 'All Categories' ),
	'edit_item' => __( 'Edit Category' ),
	'update_item' => __( 'Update Category' ),
	'add_new_item' => __( 'Add New Category' ),
	'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' )
    ); 	
 
	register_taxonomy('project-categories',
		array('project'),
		array('hierarchical' => true,
		'labels' => $project_categories,
		'show_ui' => true,
		'public' => false,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'categories' )
	));
	
	//taxonomy tag
	$project_tags = array(
	'name' => __( 'Tags' ),
	'singular_name' => __( 'Tag' ),
	'search_items' =>  __( 'Search Tags' ),
	'all_items' => __( 'All Tags' ),
	'edit_item' => __( 'Edit Tag' ),
	'update_item' => __( 'Update Tag' ),
	'add_new_item' => __( 'Add New Tag' ),
	'new_item_name' => __( 'New Tag' ),
    'menu_name' => __( 'Tags' )
    ); 	
 
	register_taxonomy('project-tags',
		array('project'),
		array('hierarchical' => false,
		'labels' => $project_tags,
		'show_ui' => true,
		'public' => false,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tags' )
	));
	add_action('init', 'project_register');