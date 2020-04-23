<?php
/**
 * WPBakery Visual Composer Shortcodes settings
 *
 * @package MediaCenterVCExtensions
 *
 */

if ( function_exists( 'vc_map' ) ):

#-----------------------------------------------------------------
# Media Center Banner Element
#-----------------------------------------------------------------

wpb_map(	
	array(
		'name' => __( 'Banner', 'mc-ext' ),
		'base' => 'mc_banner',
		'description' => __( 'Add a banner to your page.', 'mc-ext' ),
		'class'		=> '',
		'controls' => 'full', 
		'icon' => 'icon-media-center',
		'category' => __( 'Media Center Elements', 'mc-ext' ),
	   	'params' => array(
      		array(
				'type' => 'attach_image',
	         	'heading' => __( 'Banner Image', 'mc-ext' ),
	         	'param_name' => 'banner_image',	
	      	),
	      	array(
				 'type' => 'textfield',
		         'heading' => __( 'Title', 'mc-ext' ),
		         'param_name' => 'title',
		         'description' => __( 'Enter banner title', 'mc-ext' ),
		         'holder' => 'div'
	      	),
	      	array(
				 'type' => 'textfield',
		         'heading' => __( 'Subtitle Text', 'mc-ext' ),
		         'param_name' => 'subtitle',
		         'description' => __( 'Enter banner subtitle', 'mc-ext')
	      	),
	      	array(
				 'type' => 'textfield',
		         'heading' => __( 'Banner Link', 'mc-ext' ),
		         'param_name' => 'banner_link',
		         'description' => __( 'Link to banner. Default #', 'mc-ext' ),
		         'value' => '#'
	      	),
	      	array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'On Click', 'mc-ext' ),
	      		'param_name' => 'banner_link_target',
	      		'value' => array(
	      			'' => '',
					__( 'Open in same page', 'mc-ext' ) => '_self',
					__( 'Open in new page', 'mc-ext' )   => '_blank'
				),
      		),
      		array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Animation on banner hover', 'mc-ext' ),
	      		'param_name' => 'banner_hover_animation',
	      		'value' => array(
					__( 'No Animation', 'mc-ext' ) => 'none',
					__( 'bounce', 'mc-ext' ) => 'bounce',
					__( 'flash', 'mc-ext' ) => 'flash',
					__( 'pulse', 'mc-ext' ) => 'pulse',
					__( 'rubberBand', 'mc-ext' ) => 'rubberBand',
					__( 'shake', 'mc-ext' ) => 'shake',
					__( 'swing', 'mc-ext' ) => 'swing',
					__( 'tada', 'mc-ext' ) => 'tada',
					__( 'wobble', 'mc-ext' ) => 'wobble',
					__( 'bounceIn', 'mc-ext' ) => 'bounceIn',
					__( 'bounceInDown', 'mc-ext' ) => 'bounceInDown',
					__( 'bounceInLeft', 'mc-ext' ) => 'bounceInLeft',
					__( 'bounceInRight', 'mc-ext' ) => 'bounceInRight',
					__( 'bounceInUp', 'mc-ext' ) => 'bounceInUp',
					__( 'bounceOut', 'mc-ext' ) => 'bounceOut',
					__( 'bounceOutDown', 'mc-ext' ) => 'bounceOutDown',
					__( 'bounceOutLeft', 'mc-ext' ) => 'bounceOutLeft',
					__( 'bounceOutRight', 'mc-ext' ) => 'bounceOutRight',
					__( 'bounceOutUp', 'mc-ext' ) => 'bounceOutUp',
					__( 'fadeIn', 'mc-ext' ) => 'fadeIn',
					__( 'fadeInDown', 'mc-ext' ) => 'fadeInDown',
					__( 'fadeInDownBig', 'mc-ext' ) => 'fadeInDownBig',
					__( 'fadeInLeft', 'mc-ext' ) => 'fadeInLeft',
					__( 'fadeInLeftBig', 'mc-ext' ) => 'fadeInLeftBig',
					__( 'fadeInRight', 'mc-ext' ) => 'fadeInRight',
					__( 'fadeInRightBig', 'mc-ext' ) => 'fadeInRightBig',
					__( 'fadeInUp', 'mc-ext' ) => 'fadeInUp',
					__( 'fadeInUpBig', 'mc-ext' ) => 'fadeInUpBig',
					__( 'fadeOut', 'mc-ext' ) => 'fadeOut',
					__( 'fadeOutDown', 'mc-ext' ) => 'fadeOutDown',
					__( 'fadeOutDownBig', 'mc-ext' ) => 'fadeOutDownBig',
					__( 'fadeOutLeft', 'mc-ext' ) => 'fadeOutLeft',
					__( 'fadeOutLeftBig', 'mc-ext' ) => 'fadeOutLeftBig',
					__( 'fadeOutRight', 'mc-ext' ) => 'fadeOutRight',
					__( 'fadeOutRightBig', 'mc-ext' ) => 'fadeOutRightBig',
					__( 'fadeOutUp', 'mc-ext' ) => 'fadeOutUp',
					__( 'fadeOutUpBig', 'mc-ext' ) => 'fadeOutUpBig',
					__( 'flip', 'mc-ext' ) => 'flip',
					__( 'flipInX', 'mc-ext' ) => 'flipInX',
					__( 'flipInY', 'mc-ext' ) => 'flipInY',
					__( 'flipOutX', 'mc-ext' ) => 'flipOutX',
					__( 'flipOutY', 'mc-ext' ) => 'flipOutY',
					__( 'lightSpeedIn', 'mc-ext' ) => 'lightSpeedIn',
					__( 'lightSpeedOut', 'mc-ext' ) => 'lightSpeedOut',
					__( 'rotateIn', 'mc-ext' ) => 'rotateIn',
					__( 'rotateInDownLeft', 'mc-ext' ) => 'rotateInDownLeft',
					__( 'rotateInDownRight', 'mc-ext' ) => 'rotateInDownRight',
					__( 'rotateInUpLeft', 'mc-ext' ) => 'rotateInUpLeft',
					__( 'rotateInUpRight', 'mc-ext' ) => 'rotateInUpRight',
					__( 'rotateOut', 'mc-ext' ) => 'rotateOut',
					__( 'rotateOutDownLeft', 'mc-ext' ) => 'rotateOutDownLeft',
					__( 'rotateOutDownRight', 'mc-ext' ) => 'rotateOutDownRight',
					__( 'rotateOutUpLeft', 'mc-ext' ) => 'rotateOutUpLeft',
					__( 'rotateOutUpRight', 'mc-ext' ) => 'rotateOutUpRight',
					__( 'hinge', 'mc-ext' ) => 'hinge',
					__( 'rollIn', 'mc-ext' ) => 'rollIn',
					__( 'rollOut', 'mc-ext' ) => 'rollOut',
					__( 'zoomIn', 'mc-ext' ) => 'zoomIn',
					__( 'zoomInDown', 'mc-ext' ) => 'zoomInDown',
					__( 'zoomInLeft', 'mc-ext' ) => 'zoomInLeft',
					__( 'zoomInRight', 'mc-ext' ) => 'zoomInRight',
					__( 'zoomInUp', 'mc-ext' ) => 'zoomInUp',
					__( 'zoomOut', 'mc-ext' ) => 'zoomOut',
					__( 'zoomOutDown', 'mc-ext' ) => 'zoomOutDown',
					__( 'zoomOutLeft', 'mc-ext' ) => 'zoomOutLeft',
					__( 'zoomOutRight', 'mc-ext' ) => 'zoomOutRight',
					__( 'zoomOutUp', 'mc-ext' ) => 'zoomOutUp',
				),
      		),

			array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Banner Text Position', 'mc-ext' ),
	      		'param_name' => 'banner_text_position',
	      		'value' => array(
					'' => '',
					__( 'Left', 'mc-ext' ) => 'text-left',
					__( 'Right', 'mc-ext' )   => 'text-right',
					__( 'Center', 'mc-ext' )   => 'text-center',
				),
      		),

	      	array(
				'type' => 'textfield',
	         	'class' => '',
	         	'heading' => __( 'Extra Class', 'mc-ext' ),
	         	'param_name' => 'el_class',
	         	'description' => __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center Brands Carousel
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name' => __( 'Brands Carousel', 'mc-ext' ),
		'base' => 'mc_brands_carousel',
		'description' => __( 'Add a brands carousel to your page', 'mc-ext' ),
		'class'		=> '',
		'controls' => 'full', 
		'icon' => 'icon-media-center',
		'category' => __( 'Media Center Elements', 'mc-ext' ),
	   	'params' => array(
	      	array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'mc-ext' ),
				'param_name' => 'title',
				'description' => __( 'Enter Carousel title', 'mc-ext' ),
				'holder' => 'div',
	      	),
	      	
	      	array(
				'type' => 'textfield',
		        'heading' => __( 'Order by', 'mc-ext' ),
		        'param_name' => 'orderby',
		        'description' => __( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'mc-ext' ),
		        'value' => 'date',

	      	),

	      	array(
		 	   	'type' => 'textfield',
		        'heading' => __( 'Order', 'mc-ext' ),
		        'param_name' => 'order',
		        'description' => __( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'mc-ext' ),
		        'value' => 'DESC',
	      	),

	      	array(
			    'type' => 'textfield',
		        'heading' => __( 'Number of Brands to display', 'mc-ext' ),
		        'param_name' => 'per_page',
		        'value' => '12'
	      	),
	      	array(
	      		'type'			=> 'dropdown',
	      		'heading'		=> __( 'Container Class', 'mc-ext' ),
	      		'param_name'	=> 'container_class',
	      		'value'			=> array(
	      			'' => '',
	      			__( 'Container', 'mc-ext' ) 		=> 'container',
	      			__( 'Container Fluid', 'mc-ext' ) 	=> 'container-fluid',
	      			__( 'No Container', 'mc-ext' )      => 'no-container',
      			)
      		),
	      	array(
				'type' => 'textfield',
	         	'class' => '',
	         	'heading' => __( 'Extra Class', 'mc-ext' ),
	         	'param_name' => 'el_class',
	         	'description' => __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center Products Carousel
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name' => __( 'Products Carousel', 'mc-ext' ),
		'base' => 'mc_products_carousel',
		'description' => __( 'Add products carousel to your page', 'mc-ext' ),
		'class'		=> '',
		'controls' => 'full', 
		'icon' => 'icon-media-center',
		'category' => __( 'Media Center Elements', 'mc-ext' ),
	   	'params' => array(
	   		array(
	   			'type' => 'textfield',
				'heading' => __( 'Title', 'mc-ext' ),
				'param_name' => 'title',
				'description' => __( 'Enter Carousel title', 'mc-ext' ),
				'holder' => 'div'
   			),
			array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Show', 'mc-ext' ),
	      		'param_name' => 'shortcode_name',
	      		'value' => array(
					'' => '',
					__( 'Recent Products', 'mc-ext' ) => 'recent_products',
					__( 'Featured Products', 'mc-ext' )   => 'featured_products',
					__( 'Top Rated Products', 'mc-ext' )   => 'top_rated_products',
					__( 'On Sale Products', 'mc-ext' ) => 'sale_products',
					__( 'Best Selling Products', 'mc-ext' ) => 'best_selling_products',
					__( 'Select Products by Category', 'mc-ext' ) => 'product_category',
					__( 'Select Products by IDs', 'mc-ext' ) => 'products_ids',
					__( 'Select Products by SKUs', 'mc-ext' ) => 'products_skus',
				),
				'description' => __( 'Choose what type of products you want to show in the carousel', 'mc-ext' )
      		),
      		array(
      			'type' => 'textfield',
				'heading' => __( 'IDs', 'mc-ext' ),
				'param_name' => 'ids',
				'description' => __( 'Note : This option is applicable only for Select Products by IDs. Specify IDs of products you want to show separated by comma. Example : 1, 2, 3, 4, 5', 'mc-ext' ),
  			),
  			array(
      			'type' => 'textfield',
				'heading' => __( 'SKUs', 'mc-ext' ),
				'param_name' => 'skus',
				'description' => __( 'Note : This option is applicable only for Select Products by SKUs. Specify SKUs of products you want to show separated by comma. Example : foo, bar, baz', 'mc-ext' ),
  			),
  			array(
      			'type' => 'textfield',
				'heading' => __( 'Category', 'mc-ext' ),
				'param_name' => 'category',
				'description' => __( 'Note : This option is applicable only for Select Products by Category. Specify the category slug of the category of products you want to show', 'mc-ext' ),
  			),
      		array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Order By', 'mc-ext' ),
	      		'param_name' => 'orderby',
	      		'value' => array(
					'' => '',
					__( 'Menu Order', 'mc-ext' ) => 'menu_order',
					__( 'Title', 'mc-ext' )   => 'title',
					__( 'Date', 'mc-ext' )   => 'date',
					__( 'Random', 'mc-ext' )   => 'rand',
					__( 'ID', 'mc-ext' )   => 'id',
				),
				'description' => __( 'Does not apply for Best Selling Products', 'mc-ext')
      		),
      		array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Order Direction', 'mc-ext' ),
	      		'param_name' => 'order',
	      		'value' => array(
					'' => '',
					__( 'Descending', 'mc-ext' ) => 'desc',
					__( 'Ascending', 'mc-ext' )   => 'asc',
				),
				'description' => __( 'Does not apply for Best Selling Products', 'mc-ext')
      		),
      		array(
				'type' => 'textfield',
	         	'heading' => __( 'No of Products', 'mc-ext' ),
	         	'param_name' => 'per_page',
	         	'value' => '12'
	      	),
	      	array(
	      		'type'			=> 'dropdown',
	      		'heading'		=> __( 'Container Class', 'mc-ext' ),
	      		'param_name'	=> 'container_class',
	      		'value'			=> array(
	      			'' => '',
	      			__( 'Container', 'mc-ext' ) 		=> 'container',
	      			__( 'Container Fluid', 'mc-ext' ) 	=> 'container-fluid',
	      			__( 'No Container', 'mc-ext' )      => 'no-container',
      			)
      		),
	      	array(
				'type' => 'dropdown',
	         	'heading' => __( 'No of Columns', 'mc-ext' ),
	         	'param_name' => 'columns',
	         	'value' => array(
					'' => '',
					__( '4 - Best suited for pages with sidebar', 'mc-ext' ) => '4',
					__( '6 - Best suited for Full-width pages', 'mc-ext' )   => '6',
				),
	      	),
	      	array(
				'type' => 'textfield',
	         	'heading' => __( 'Extra Class', 'mc-ext' ),
	         	'param_name' => 'el_class',
	         	'description' => __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center 6-1 Products Grid
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name' => __( '6-1 Products Grid', 'mc-ext' ),
		'base' => 'mc_6_1_products_grid',
		'description' => __( 'Add 6-1 Products Grid to your page', 'mc-ext' ),
		'class'		=> '',
		'controls' => 'full', 
		'icon' => 'icon-media-center',
		'category' => __( 'Media Center Elements', 'mc-ext' ),
	   	'params' => array(
	   		array(
	   			'type' => 'textfield',
				'heading' => __( 'Title', 'mc-ext' ),
				'param_name' => 'title',
				'description' => __( 'Enter Carousel title', 'mc-ext' ),
				'holder' => 'div'
   			),
			array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Show', 'mc-ext' ),
	      		'param_name' => 'shortcode_name',
	      		'value' => array(
					'' => '',
					__( 'Recent Products', 'mc-ext' ) => 'recent_products',
					__( 'Featured Products', 'mc-ext' )   => 'featured_products',
					__( 'Top Rated Products', 'mc-ext' )   => 'top_rated_products',
					__( 'On Sale Products', 'mc-ext' ) => 'sale_products',
					__( 'Best Selling Products', 'mc-ext' ) => 'best_selling_products',
					__( 'Select Products by Category', 'mc-ext' ) => 'product_category',
					__( 'Select Products by IDs', 'mc-ext' ) => 'products_ids',
					__( 'Select Products by SKUs', 'mc-ext' ) => 'products_skus',
				),
				'description' => __( 'Choose what type of products you want to show in the carousel', 'mc-ext' )
      		),
      		array(
      			'type' => 'textfield',
				'heading' => __( 'IDs', 'mc-ext' ),
				'param_name' => 'ids',
				'description' => __( 'Note : This option is applicable only for Select Products by IDs. Specify IDs of products you want to show separated by comma. Example : 1, 2, 3, 4, 5', 'mc-ext' ),
  			),
  			array(
      			'type' => 'textfield',
				'heading' => __( 'SKUs', 'mc-ext' ),
				'param_name' => 'skus',
				'description' => __( 'Note : This option is applicable only for Select Products by SKUs. Specify SKUs of products you want to show separated by comma. Example : foo, bar, baz', 'mc-ext' ),
  			),
  			array(
      			'type' => 'textfield',
				'heading' => __( 'Category', 'mc-ext' ),
				'param_name' => 'category',
				'description' => __( 'Note : This option is applicable only for Select Products by Category. Specify the category slug of the category of products you want to show', 'mc-ext' ),
  			),
      		array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Order By', 'mc-ext' ),
	      		'param_name' => 'orderby',
	      		'value' => array(
					'' => '',
					__( 'Menu Order', 'mc-ext' ) => 'menu_order',
					__( 'Title', 'mc-ext' )   => 'title',
					__( 'Date', 'mc-ext' )   => 'date',
					__( 'Random', 'mc-ext' )   => 'rand',
					__( 'ID', 'mc-ext' )   => 'id',
				),
				'description' => __( 'Does not apply for Best Selling Products', 'mc-ext')
      		),
      		array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Order Direction', 'mc-ext' ),
	      		'param_name' => 'order',
	      		'value' => array(
					'' => '',
					__( 'Descending', 'mc-ext' ) => 'desc',
					__( 'Ascending', 'mc-ext' )   => 'asc',
				),
				'description' => __( 'Does not apply for Best Selling Products', 'mc-ext')
      		),
	      	array(
				'type' => 'textfield',
	         	'heading' => __( 'Extra Class', 'mc-ext' ),
	         	'param_name' => 'el_class',
	         	'description' => __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center Vertical Class
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name' 			=> __( 'Vertical Menu', 'mc-ext' ),
		'base' 			=> 'mc_vertical_menu',
		'description' 	=> __( 'Add a vertical menu to your home page', 'mc-ext' ),
		'class'			=> '',
		'controls' 		=> 'full', 
		'icon' 			=> 'icon-media-center',
		'category' 		=> __( 'Media Center Elements', 'mc-ext' ),
	   	'params' 		=> array(
	      	array(
				'type' 		 	=> 'textfield',
				'heading' 	 	=> __( 'Title', 'mc-ext' ),
				'param_name' 	=> 'title',
				'holder' 	 	=> 'div',
	      	),

	      	array(
				'type' 			=> 'textfield',
				'heading' 		=> __( 'Title Icon Class', 'mc-ext' ),
				'param_name' 	=> 'icon_class',
				'description' 	=> sprintf( __('Fontawesome Icon Class. Default icon is <em>fa-list</em>. For complete list of icon classes %s', 'mc-ext' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">' . __( 'Click here', 'mc-ext' ) . '</a>' ),
	      	),
	      	
	      	array(
				'type' 			=> 'textfield',
		        'heading' 		=> __( 'Menu', 'mc-ext' ),
		        'param_name' 	=> 'menu',
		        'description' 	=> __( 'Menu ID, slug, or name. Leave it empty to pull all categories', 'mc-ext')
	      	),

	      	array(
	      		'type'			=> 'dropdown',
	      		'heading'		=> __( 'Dropdown Trigger', 'mc-ext' ),
	      		'param_name'	=> 'dropdown_trigger',
	      		'value'			=> array(
	      			'' => '',
	      			__( 'Click', 'mc-ext' ) => 'click',
	      			__( 'Hover', 'mc-ext' ) => 'hover',
      			)
      		),

      		array(
	      		'type'			=> 'dropdown',
	      		'heading'		=> __( 'Dropdown Animation', 'mc-ext' ),
	      		'param_name'	=> 'dropdown_animation',
	      		'value'			=> array(
	      			__( 'No Animation', 'mc-ext' ) 			=> 	'none',
		        	__( 'BounceIn', 'mc-ext' ) 				=> 	'bounceIn',
		        	__( 'BounceInDown', 'mc-ext' ) 			=> 	'bounceInDown',
		        	__( 'BounceInLeft', 'mc-ext' ) 			=> 	'bounceInLeft',
		        	__( 'BounceInRight', 'mc-ext' ) 			=> 	'bounceInRight',
		        	__( 'BounceInUp', 'mc-ext' ) 				=> 	'bounceInUp',
					__( 'FadeIn', 'mc-ext' ) 					=> 	'fadeIn',
					__( 'FadeInDown', 'mc-ext' ) 				=> 	'fadeInDown',
					__( 'FadeInDown Big', 'mc-ext' ) 			=> 	'fadeInDownBig',
					__( 'FadeInLeft', 'mc-ext' ) 				=> 	'fadeInLeft',
					__( 'FadeInLeft Big', 'mc-ext' ) 			=> 	'fadeInLeftBig',
					__( 'FadeInRight', 'mc-ext' ) 			=> 	'fadeInRight',
					__( 'FadeInRight Big', 'mc-ext' ) 		=> 	'fadeInRightBig',
					__( 'FadeInUp', 'mc-ext' ) 				=> 	'fadeInUp',
					__( 'FadeInUp Big', 'mc-ext' ) 			=> 	'fadeInUpBig',
					__( 'FlipInX', 'mc-ext' ) 				=> 	'flipInX',
					__( 'FlipInY', 'mc-ext' ) 				=> 	'flipInY',
					__( 'Light SpeedIn', 'mc-ext' ) 			=> 	'lightSpeedIn',
					__( 'RotateIn', 'mc-ext' ) 				=> 	'rotateIn',
					__( 'RotateInDown Left', 'mc-ext' ) 		=> 	'rotateInDownLeft',
					__( 'RotateInDown Right', 'mc-ext' ) 		=> 	'rotateInDownRight',
					__( 'RotateInUp Left', 'mc-ext' ) 		=> 	'rotateInUpLeft',
					__( 'RotateInUp Right', 'mc-ext' ) 		=> 	'rotateInUpRight',
					__( 'RoleIn', 'mc-ext' ) 					=> 	'roleIn',
		        	__( 'ZoomIn', 'mc-ext' ) 					=> 	'zoomIn',
					__( 'ZoomInDown', 'mc-ext' ) 				=> 	'zoomInDown',
					__( 'ZoomInLeft', 'mc-ext' ) 				=> 	'zoomInLeft',
					__( 'ZoomInRight', 'mc-ext' ) 			=> 	'zoomInRight',
					__( 'ZoomInUp', 'mc-ext' ) 				=> 	'zoomInUp',
      			)
      		),

	      	array(
				'type' 			=> 'textfield',
	         	'class' 		=> '',
	         	'heading' 		=> __( 'Extra Class', 'mc-ext' ),
	         	'param_name' 	=> 'el_class',
	         	'description' 	=> __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center Service Icon Element
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name' => __( 'Service Icon', 'mc-ext' ),
		'base' => 'mc_service_icon',
		'description' => __( 'Add a service icon to your page.', 'mc-ext' ),
		'class'		=> '',
		'controls' => 'full', 
		'icon' => 'icon-media-center',
		'category' => __( 'Media Center Elements', 'mc-ext' ),
	   	'params' => array(
	      	array(
				 'type' => 'textfield',
		         'heading' => __( 'Title', 'mc-ext' ),
		         'param_name' => 'title',
		         'description' => __( 'Enter service title', 'mc-ext' ),
		         'holder' => 'div'
	      	),
	      	array(
				 'type' => 'textfield',
		         'heading' => __( 'Service Icon Link', 'mc-ext' ),
		         'param_name' => 'link',
		         'description' => __( 'Enter service icon link (optional)', 'mc-ext' ),
		         'holder' => 'div'
	      	),
	      	array(
				 'type' => 'textarea',
		         'heading' => __( 'Service Description', 'mc-ext' ),
		         'param_name' => 'description',
		         'description' => __( 'Enter service description', 'mc-ext'),
		         'holder' => 'div'
	      	),
	      	array(
				 'type' => 'textfield',
		         'heading' => __( 'Service Icon Class', 'mc-ext' ),
		         'param_name' => 'icon_class',
				 'description' => sprintf( __('Fontawesome Icon Class. Default icon is <em>fa-list</em>. For complete list of icon classes %s', 'mc-ext' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">' . __( 'Click here', 'mc-ext' ) . '</a>' ),
	      	),
	      	array(
				'type' => 'textfield',
	         	'class' => '',
	         	'heading' => __( 'Extra Class', 'mc-ext' ),
	         	'param_name' => 'el_class',
	         	'description' => __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center Team Member
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name' 			=> __( 'Team Member', 'mc-ext' ),
		'base' 			=> 'mc_team_member',
		'description' 	=> __( 'Add a team member profile to your page.', 'mc-ext' ),
		'class'			=> '',
		'controls' 		=> 'full', 
		'icon' 			=> 'icon-media-center',
		'category' 		=> __( 'Media Center Elements', 'mc-ext' ),
	   	'params' => array(
	      	array(
				 'type' 		=> 'textfield',
		         'heading' 		=> __( 'Full Name', 'mc-ext' ),
		         'param_name' 	=> 'name',
		         'description' 	=> __( 'Enter team member full name', 'mc-ext' ),
		         'holder' 		=> 'div'
	      	),
	      	array(
				 'type' 		=> 'textfield',
		         'heading' 		=> __( 'Designation', 'mc-ext' ),
		         'param_name' 	=> 'designation',
		         'description' 	=> __( 'Enter designation of team member', 'mc-ext'),
	      	),
	      	array(
				'type' 			=> 'attach_image',
	         	'heading' 		=> __( 'Profile Pic', 'mc-ext' ),
	         	'param_name' 	=> 'profile_pic',	
	      	),
	      	array(
	      		'type' 			=> 'dropdown',
	      		'heading'		=> __( 'Display Style', 'mc-ext' ),
	      		'value' 		=> array(
	      			__( 'Square', 'mc-ext' ) => 'square',
	      			__( 'Circle', 'mc-ext' ) => 'circle'
      			),
      			'param_name'	=> 'display_style',
      		),
      		array(
      			'type' 			=> 'textfield',
	         	'class' 		=> '',
	         	'heading' 		=> __( 'Link', 'mc-ext' ),
	         	'param_name' 	=> 'link',
	         	'description' 	=> __( 'Add link to the team member. Leave blank if there aren\'t any', 'mc-ext' )
  			),
	      	array(
				'type' 			=> 'textfield',
	         	'class' 		=> '',
	         	'heading' 		=> __( 'Extra Class', 'mc-ext' ),
	         	'param_name' 	=> 'el_class',
	         	'description' 	=> __( 'Add your extra classes here.', 'mc-ext' )
	      	)
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center GMap
#-----------------------------------------------------------------

wpb_map( 
	array(
		'name'        => __( 'Google Map', 'mc-ext' ),
		'base'        => 'mc_gmap',
		'description' => __( 'Add a Google Map to your page.', 'mc-ext' ),
		'class'		  => '',
		'controls'    => 'full', 
		'icon' 		  => 'icon-media-center',
		'category'    => __( 'Media Center Elements', 'mc-ext' ),
	   	'params'      => array(
	      	array(
				 'type'       => 'textfield',
		         'heading'    => __( 'Latitude', 'mc-ext' ),
		         'param_name' => 'lat',
		         'holder'     => 'div'
	      	),
	      	array(
				'type'       => 'textfield',
		        'heading'    => __( 'Longitude', 'mc-ext' ),
		        'param_name' => 'lon',
		        'holder'     => 'div'
	      	),
	      	array(
				'type'       => 'textfield',
		        'heading'    => __( 'Zoom', 'mc-ext' ),
		        'param_name' => 'zoom',
	      	),
	      	array(
	      		'type'			=> 'textfield',
	      		'class'			=>  '',
	      		'heading'		=> __( 'Minimum Height in px', 'mc-ext' ),
	      		'param_name'	=> 'map_min_height',
	      		'value'			=> '460px'
      		),
	      	array(
				'type'        => 'textfield',
	         	'class'       => '',
	         	'heading'     => __( 'Extra Class', 'mc-ext' ),
	         	'param_name'  => 'el_class',
	         	'description' => __( 'Add your extra classes here.', 'mc-ext' )
	      	),
	      	array(
	      		'type' => 'dropdown',
	      		'heading' => __( 'Display Get Direction', 'mc-ext' ),
	      		'param_name' => 'add_get_directions',
	      		'value' => array(
					'' => '',
					__( 'Yes', 'mc-ext' ) => 'yes',
					__( 'No', 'mc-ext' )  => 'no',
				),
				'description' => __( 'Should display "Get Direction" form ?', 'mc-ext')
      		),
	   	)
	) 
);

#-----------------------------------------------------------------
# Media Center Home Page Tabs
#-----------------------------------------------------------------

wpb_map(
	array(
		'name'			=> __( 'Home Page Tabs', 'mc-ext' ),
		'base'  		=> 'mc_home_page_tabs',
		'description'	=> __( 'Product Tabs for Home', 'mc-ext' ),
		'category'		=> __( 'Media Center Elements', 'mc-ext' ),
		'icon' 			=> 'icon-media-center',
		'params' 		=> array(
			array(
				'type'			=> 'textfield',
				'heading'		=> __('Tab #1 title', 'mc-ext' ),
				'param_name'	=> 'title_tab_1',
			),

			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Tab #1 Content, Show :', 'mc-ext' ),
				'param_name'	=> 'content_sc_tab_1',
				'value'			=> array(
					'' 	=> '',
					__( 'Featured Products', 'mc-ext' )		=> 'featured_products' ,
					__( 'On Sale Products', 'mc-ext' )		=> 'sale_products' 	,
					__( 'Top Rated Products', 'mc-ext' )		=> 'top_rated_products' ,
					__( 'Recent Products', 'mc-ext' )			=> 'recent_products' 	,
					__( 'Best Selling Products', 'mc-ext' )	=> 'best_selling_products',
				),
			),

			array(
				'type'			=> 'textfield',
				'heading'		=> __('Tab #2 title', 'mc-ext' ),
				'param_name'	=> 'title_tab_2',
			),

			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Tab #2 Content, Show :', 'mc-ext' ),
				'param_name'	=> 'content_sc_tab_2',
				'value'			=> array(
					'' => '',
					__( 'Featured Products', 'mc-ext' )		=> 'featured_products' ,
					__( 'On Sale Products', 'mc-ext' )		=> 'sale_products' 	,
					__( 'Top Rated Products', 'mc-ext' )		=> 'top_rated_products' ,
					__( 'Recent Products', 'mc-ext' )			=> 'recent_products' 	,
					__( 'Best Selling Products', 'mc-ext' )	=> 'best_selling_products',
				),
			),

			array(
				'type'			=> 'textfield',
				'heading'		=> __('Tab #3 title', 'mc-ext' ),
				'param_name'	=> 'title_tab_3',
			),

			array(
				'type'			=> 'dropdown',
				'heading'		=> __( 'Tab #3 Content, Show :', 'mc-ext' ),
				'param_name'	=> 'content_sc_tab_3',
				'value'			=> array(
					'' => '',
					__( 'Featured Products', 'mc-ext' )		=> 'featured_products' ,
					__( 'On Sale Products', 'mc-ext' )		=> 'sale_products' 	,
					__( 'Top Rated Products', 'mc-ext' )		=> 'top_rated_products' ,
					__( 'Recent Products', 'mc-ext' )			=> 'recent_products' 	,
					__( 'Best Selling Products', 'mc-ext' )	=> 'best_selling_products',
				),
			),
		),
	)
);

endif;