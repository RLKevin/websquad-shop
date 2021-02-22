<?php

    include 'woo.php';

    add_action( 'acf/save_post', 'generate_options_css', 20 ); //Parse the output and write the CSS file on post save
    add_action( 'after_setup_theme', 'PREFIX_check_theme_version' );
    function PREFIX_check_theme_version() {

        $current_version = wp_get_theme()->get('Version');
        $old_version = get_option( 'PREFIX_theme_version' );

        if ($old_version !== $current_version) {
            // do some cool stuff
            generate_options_css();

            // update not to run twice
            update_option('PREFIX_theme_version', $current_version);
        }
    }
    function generate_options_css() {
        $ss_dir = get_stylesheet_directory();
        ob_start(); // Capture all output into buffer
        require($ss_dir . '/custom-styles.php'); // Grab the custom-style.php file
        $css = ob_get_clean(); // Store output in a variable, then flush the buffer
        file_put_contents($ss_dir . '/scss/_custom.scss', $css, LOCK_EX); // Save it as a css file
    }

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

// add scripts

add_action( 'wp_enqueue_scripts', 'switchreclamebureau_adding_scripts', 999 );	
function switchreclamebureau_adding_scripts() {
    wp_register_script('main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/main.js'));
    wp_register_script('menu', get_stylesheet_directory_uri() . '/js/menu.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/menu.js'));
    wp_localize_script('main', 'ajax_genre_params', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('main');
    wp_enqueue_script('menu');
    
    wp_enqueue_script('owl', get_stylesheet_directory_uri() . '/js/vendor/owl.carousel.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/owl.carousel.min.js'));
    wp_enqueue_script('dotdotdot', get_stylesheet_directory_uri() . '/js/vendor/dotdotdot.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/dotdotdot.js'));
    wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'));
    wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDWoSM3uHPncI05dg05dAN1GGsRC80BOxE');
    wp_enqueue_script('google-maps-settings', get_stylesheet_directory_uri() . '/js/vendor/google-maps-settings.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/google-maps-settings.js'));

    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    //after wp_enqueue_script
    wp_localize_script( 'google-maps-settings', 'theme', $translation_array );

    //animations
    // wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/js/vendor/gsap.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/gsap.min.js'));
    // wp_enqueue_script('scrollTrigger', get_stylesheet_directory_uri() . '/js/vendor/scrolltrigger.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/scrolltrigger.min.js'));
    // wp_enqueue_script('animations', get_stylesheet_directory_uri() . '/js/animations.js', array(), filemtime(get_stylesheet_directory() . '/js/animations.js'));

}

// custom image sizes

add_action( 'after_setup_theme', 'my_child_theme_image_size', 11 );
function my_child_theme_image_size() {

    // override medium image size
	// remove_image_size( 'medium' );
    // add_image_size( 'medium', 640, 640, false );
    

    add_image_size( '640-16-9', 640, 360, true );
    add_image_size( '640-4-3', 640, 480, true );
    add_image_size( '640-1-1', 640, 640, true );
    add_image_size( '960-16-9', 960, 540, true );
    add_image_size( '960-4-3', 960, 720, true );
    add_image_size( '960-1-1', 960, 960, true );
    add_image_size( '1280-16-9', 1280, 720, true );
    add_image_size( '1280-4-3', 1280, 960, true );
    add_image_size( '1920-16-9', 1920, 1080, true );
    
    add_image_size( '640', 640, 640 );
    add_image_size( '960', 960, 540 );
    add_image_size( '1280', 1280, 720 );
    add_image_size( '1920', 1920, 1080 );
}


// create custom post type

    add_action( 'init', 'create_post_types' );
    function create_post_types() {

        function create_post_type($name) {
            register_post_type( $name,
                array(
                'labels'                => array(
                    'name'                => $name,
                    'singular_name'       => $name,
                    'menu_name'           => $name,
                    'add_new'             => 'New',
                    'add_new_item'        => 'New',
                    'new_item'            => 'New',
                    'edit'                => 'Edit',
                    'edit_item'           => 'Edit',
                    'view'                => 'View',
                    'view_item'           => 'View',
                    'search_items'        => 'Search',
                    'not_found'           => 'Not found',
                    'not_found_in_trash'  => 'Not found in trash',
                ),
                'public'                => true,
                'menu_position'         => 10,
                'supports'           	=> array( 'title', 'editor', 'revisions', 'thumbnail', 'excerpt', 'categories' ),
                'show_in_rest' 			=> true,
                // 'taxonomies'          => array( 'category' ),
                )
            );
        }
        create_post_type('News');
        // create_post_type('Facebook');
        // create_post_type('Vacancies');
        // create_post_type('Reviews');
        // for each custom post type, add it to the array in partials/header.php to hide the woocommerce sidebar
    }

    // remove default post type

		add_action( 'admin_menu', 'remove_post_type' );
		function remove_post_type(){
			remove_menu_page( 'edit.php' );
        }
        
// Function to allow .csv uploads
    function drick_custom_upload_mimes($mimes = array()) {

        // Add a key and value for the CSV file type
        $mimes['csv'] = "text/csv";
        return $mimes;
    }
add_filter('upload_mimes', 'drick_custom_upload_mimes');

// acf init

    add_action('acf/init', 'my_acf_init');
    function my_acf_init() {

        acf_update_setting('google_api_key', 'AIzaSyDWoSM3uHPncI05dg05dAN1GGsRC80BOxE');

        // acf - disable gutenberg for homepage

            // add_filter( 'use_block_editor_for_post_type', 'home_disable_gutenberg', 10, 2 );
            // function home_disable_gutenberg( $can_edit, $post_type ) {
            // 	if( $_GET['post'] === '7' || $_GET['post'] === '527' ) return false;
            // 	return true;
            // }

        // acf - disable gutenberg for whole website

            // add_filter('use_block_editor_for_post', '__return_false');

        // acf - gutenberg full width

            add_action('admin_head', 'editor_full_width_gutenberg');
            function editor_full_width_gutenberg() {
                echo 
                '<style>
                    .wp-block {
                        max-width: none !important;
                    }
                </style>';
            }
            
        // acf - options page

            if( function_exists('acf_add_options_page') ) {
    
                acf_add_options_page(array(
                    'page_title' 	=> 'Options',
                    'menu_title'	=> 'Options',
                    'menu_slug' 	=> 'theme-general-settings',
                    'capability'	=> 'edit_posts',
                    'redirect'		=> false
                ));
            
            }

        // acf - make brand category pickers only contain child pages
            
            /* ACF: limit child-page selection to current page’s children */

            function childpages_query( $args, $field, $post_ID ) {
                $args['post_parent'] = $post_ID;

                return $args;
            }

            add_filter('acf/fields/post_object/query/name=brand_bb', 'childpages_query', 10, 3);
            add_filter('acf/fields/post_object/query/name=brand_mt', 'childpages_query', 10, 3);
            add_filter('acf/fields/post_object/query/name=brand_bm', 'childpages_query', 10, 3);
        }

        // acf - basic wysiwyg - https://www.tiny.cloud/docs-3x/reference/buttons/

			add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
			function base_extended_editor_mce_buttons($buttons) {
				return array('formatselect', 'bold', 'italic', 'strikethrough', 'bullist', 'link', 'unlink', 'blockquote');
			}

			add_filter('tiny_mce_before_init', 'base_custom_mce_format' );
			function base_custom_mce_format($init) {
				$init['block_formats'] = 'Paragraph=p;Subtitle=h3;Title=h2;';
				return $init;
			}

    // gravity forms

		// submit button - change input to button
		
		add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
		function input_to_button( $button, $form ) {
			$dom = new DOMDocument();
			$dom->loadHTML( $button );
			$input = $dom->getElementsByTagName( 'input' )->item(0);
			$new_button = $dom->createElement( 'button' );
			$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
			$input->removeAttribute( 'value' );
			foreach( $input->attributes as $attribute ) {
				$new_button->setAttribute( $attribute->name, $attribute->value );
			}
			$input->parentNode->replaceChild( $new_button, $input );
		
			return $dom->saveHtml( $new_button );
		}
		
		// submit button - add custom class

		add_filter( 'gform_submit_button', 'add_custom_css_classes', 10, 2 );
		function add_custom_css_classes( $button, $form ) {
			$dom = new DOMDocument();
			$dom->loadHTML( $button );
			$input = $dom->getElementsByTagName( 'button' )->item(0);
			$classes = $input->getAttribute( 'class' );
			$classes .= " button primary";
			$input->setAttribute( 'class', $classes );
			return $dom->saveHtml( $input );
		}

		// submit button - change spinner

		add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );
		function tgm_io_custom_gforms_spinner( $src ) {
			return get_stylesheet_directory_uri() . '/img/icons/loading.svg';
		}

		// submit validation - validation error

		add_filter( 'gform_validation_message', 'change_message', 10, 2 );
		function change_message( $message, $form ) {
			return "<div class='validation_error'>Niet alle verplichte velden zijn (correct) ingevuld.</div>";
		}

    // add child pages to menu automatically
        /**
        * auto_child_page_menu
        * 
        * class to add top level page menu items all child pages on the fly
        * @author Ohad Raz <admin@bainternet.info>
        */
        class auto_child_page_menu
        {
            /**
             * class constructor
             * @author Ohad Raz <admin@bainternet.info>
             * @param   array $args 
             * @return  void
             */
            function __construct($args = array()){
                //TODO: enable or disable here
                // add_filter('wp_nav_menu_objects',array($this,'on_the_fly'));
            }
            /**
             * the magic function that adds the child pages
             * @author Ohad Raz <admin@bainternet.info>
             * @param  array $items 
             * @return array 
             */
            function on_the_fly($items) {
                global $post;
                $tmp = array();
                foreach ($items as $key => $i) {
                    $tmp[] = $i;
                    //if not page move on
                    if ($i->object != 'page'){
                        continue;
                    }
                    $page = get_post($i->object_id);
                    //if not parent page move on
                    if (!isset($page->post_parent) || $page->post_parent != 0) {
                        continue;
                    }
                    if ( is_page($page) && $post->post_parent ) {
                        continue;
                    }
                    //if not merken page move on
                    // echo $post->post_parent;
                    // echo $page->post_parent;
                    if ($i->object_id != 173) {
                        continue;
                    }
                    $children = get_pages( array('child_of' => $i->object_id) );
                    foreach ((array)$children as $c) {
                        //set parent menu
                        $c->menu_item_parent      = $i->ID;
                        $c->object_id             = $c->ID;
                        $c->object                = 'page';
                        $c->type                  = 'post_type';
                        $c->type_label            = 'Page';
                        $c->url                   = get_permalink( $c->ID);
                        $c->title                 = $c->post_title;
                        $c->target                = '';
                        $c->attr_title            = '';
                        $c->description           = '';
                        $c->classes               = array('','menu-item','menu-item-type-post_type','menu-item-object-page');
                        $c->xfn                   = '';
                        $c->current               = ($post->ID == $c->ID)? true: false;
                        $c->current_item_ancestor = ($post->ID == $c->post_parent)? true: false; //probbably not right
                        $c->current_item_parent   = ($post->ID == $c->post_parent)? true: false;
                        $tmp[] = $c;
                    }
                }
                return $tmp;
            }
        }
        new auto_child_page_menu();

    // add page id to brand menu items
    /**
     * Custom Nav Menu Class For Page ID
     */
    add_filter( 'nav_menu_css_class', 'wpse_menu_item_id_class', 10, 2 ); 
    function wpse_menu_item_id_class( $classes, $item )
    {
        if( isset( $item->object_id ) )
            $classes[] = sprintf( 'wpse-object-id-%d', $item->object_id );

        return $classes;
    }

    // add_action( 'every_ten_minutes', 'update_facebook' );
    // add_action( 'init', 'update_facebook' );

		function update_facebook() {

            // vars
			$fb_page = 'Oost.Slaapcomfort.Sinds.1935.Amsterdam';
			$fb_access_token = 'EAAJ9qxFbDm4BAKp3bZANHlcMhvVzJdZAyqqWI3GVsqp2hoGW7BfQfF8hky9tQKH3UZBIw8V0JxhyQWz57Sojm2UV7g9dCXyFIYdNbFpnUaAD9ZAZCunBvHtMIJHyKa6QkrEyOwlIj5kaXmk9ZAXt22EZBybdZAdcQG8ZBO1fpwc7nAiOAvd7gPFEE';

			if ($fb_page && $fb_access_token) {

				// vars
				$fb_json = 'https://graph.facebook.com/v8.0/' . $fb_page . '/posts?access_token=' . $fb_access_token . '&fields=id,created_time,full_picture,message,status_type,permalink_url&limit=3';
				$fb_results = json_decode(file_get_contents($fb_json),true);
				// echo count($fb_results['data']);

				foreach ($fb_results['data'] as $fbResult) {

					// vars
					$id = $fbResult['id'];
					$created_time = new DateTime($fbResult['created_time']);
					$created_time = $created_time->setTimezone(new DateTimeZone("Europe/Amsterdam"));
					$date_time = $created_time->format('Y-m-d H:i:s');
					$type = $fbResult['status_type'];
					if (strpos($type, 'video') !== false) { $type = 'video'; }
					if (strpos($type, 'photo') !== false) { $type = 'photo'; }		
					// var_dump($fbResult);
					$image = $fbResult['full_picture'];
					$text = $fbResult['message'];
					$text = str_replace("\n", '<br/>', $text);
					$text = str_replace("'", "\&#39;", $text);
                    $link = $fbResult['permalink_url'];

					if (null == get_page_by_title($id, 'OBJECT', 'facebook') && $type != 'shared_story' && strlen($text) > 0 && !empty($image)) {

						$post_id = wp_insert_post(
							array(
								'post_name'		=>	$id,
								'post_title'	=>	$id,
								'post_status'	=>	'publish',
								'post_type'		=>	'facebook',
								'post_date'		=>	$date_time,
							)
                        );

						// upload image
                        require_once(ABSPATH . 'wp-admin/includes/media.php');
                        require_once(ABSPATH . 'wp-admin/includes/file.php');
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $image_attachment = media_sideload_image($image, $post_id, $text, 'src');

                        // save to post
                        update_post_meta($post_id, 'facebook_type', $type);
                        update_post_meta($post_id, 'facebook_image', $image_attachment);
                        update_post_meta($post_id, 'facebook_text', $text);
                        update_post_meta($post_id, 'facebook_link', $link);
					}

				}

			} else {

				return;

			}
		}
	
	// cron schedules - 10 minutes

		add_filter( 'cron_schedules', 'every_ten_minutes' );
		function every_ten_minutes( $schedules ) {
			$schedules['ten_minutes'] = array(
				'interval' => 600,
				'display'  => esc_html__( 'Every ten minutes' ),
			);
			return $schedules;
		}

		if ( ! wp_next_scheduled( 'every_ten_minutes' ) ) {
			wp_schedule_event( time(), 'ten_minutes', 'every_ten_minutes' );
        }
        
        // acf - register blocks

            add_filter( 'block_categories', function( $categories, $post ) {
                return array_merge(
                    $categories,
                    array(
                        array(
                            'slug'  => 'websquad-blocks',
                            'title' => 'Websquad',
                        ),
                    )
                );
            }, 10, 2 );

			function switch_register_block($name, $icon) {

				if( function_exists('acf_register_block') ) {
			
					acf_register_block(array(
						'name'				=> $name,
						'title'				=> __(ucfirst($name)),
						'description'		=> __('A custom ' . $name . ' block.'),
						'render_callback'	=> 'render_block_' . $name,
						'mode' 				=> 'edit',
						'category'			=> 'websquad-blocks',
						'icon'				=> $icon,
						'keywords'			=> array($name),
						'supports'			=> array(
												'mode' 				=> false, 
												'align' 			=> false, 
												'customClassName' 	=> false, 
												'className' 		=> false, 
												'html' 				=> false, 
												'reusable' 			=> false,
						),
					));
				}
			
			}

			// acf - render blocks

			include 'partials/blocks/card.php';
			include 'partials/blocks/content.php';
			include 'partials/blocks/faq.php';
			include 'partials/blocks/form.php';
			include 'partials/blocks/gallery.php';
			include 'partials/blocks/hero.php';
			// include 'partials/blocks/highlight.php';
			include 'partials/blocks/intro.php';
			include 'partials/blocks/map.php';
			include 'partials/blocks/open.php';
			// include 'partials/blocks/post.php';
			include 'partials/blocks/reference.php';
			include 'partials/blocks/search.php';
			include 'partials/blocks/spacer.php';
			include 'partials/blocks/table.php';
			include 'partials/blocks/usp.php';
				
			// acf - allowed blocks

			add_filter( 'allowed_block_types', 'switch_allowed_block_types' );
			function switch_allowed_block_types( $allowed_blocks ) {

				return array(
					'acf/card',
					'acf/content',
					'acf/faq',
					'acf/form',
					'acf/gallery',
					'acf/hero',
					'acf/intro',
					'acf/map',
					'acf/open',
					'acf/reference',
					'acf/search',
					'acf/spacer',
					'acf/table',
                    'acf/usp',
                    'woocommerce/product-categories',
                    'woocommerce/product-best-sellers',
                    'woocommerce/product-new',
                    'woocommerce/product-on-sale',
                    'woocommerce/product-to-rated',
                    'woocommerce/handpicked-products',
				);
			}
?>