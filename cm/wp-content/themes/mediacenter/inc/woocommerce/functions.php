<?php
/**
 * WooCommerce Functions
 *
 * @package mediacenter
 */

/**
 * Prints cart info in JSON
 * 
 * @return void
 */
if( ! function_exists( 'mc_refresh_cart_info' ) ) {
	function mc_refresh_cart_info() {
		global $woocommerce;
		$output = array(
			'cart_items_count'   => $woocommerce->cart->cart_contents_count,
			'cart_total'         => $woocommerce->cart->cart_contents_total,
			'currency_symbol'    => get_woocommerce_currency_symbol()
		);
		header('Content-Type: application/json');
		echo json_encode( $output );
		die();
	}
}

/**
 * Modifies the cart item quantity string in Review Order section of Checkout Page
 *
 * @return string
 */
if( ! function_exists( 'mc_review_order_cart_item_quantity' ) ) {
	function mc_review_order_cart_item_quantity( $cart_item_quantity, $cart_item, $cart_item_key ) {
		$cart_item_quantity = '<strong class="product-quantity">' . sprintf( '%s &times;', $cart_item['quantity'] ) . '</strong>';
		return $cart_item_quantity;
	}
}

/**
 * Wraps Cart item with a span 
 *
 * @return string
 */
if( ! function_exists( 'mc_wrap_cart_item_name' ) ) {
	function mc_wrap_cart_item_name( $cart_item_name, $cart_item, $cart_item_key ) {
		$cart_item_name = '<span class="product-name-wrap">' . $cart_item_name . '</span>';
		return $cart_item_name;
	}
}

/**
 * Displays Welcome text on before login form
 *
 * @return void
 */
if( ! function_exists( 'mc_login_form_welcome_text' ) ) {
	function mc_login_form_welcome_text() {
		echo apply_filters( 'mc_login_form_welcome_text', sprintf( '<p>%s</p>', __( 'Hello, Welcome to your account', 'mediacenter' ) ) );
	}
}

/**
 * Displays Intro text on before registration form
 *
 * @return void
 */
if( ! function_exists( 'mc_registration_form_intro_text' ) ) {
	function mc_registration_form_intro_text() {
		echo apply_filters( 'mc_registration_form_intro_text', sprintf( '<p>%s</p>', __( 'Create your own account', 'mediacenter' ) ) );
	}
}

/**
 * Returns the sale flash badge HTML
 * 
 * @return string
 */
if( ! function_exists( 'mc_sale_flash' ) ) {
	function mc_sale_flash() {
		$sale_flash = '<div class="ribbon red"><span class="onsale">' . __( 'Sale!', 'mediacenter' ) . '</span></div>';
		return $sale_flash;
	}
}

/**
 * Gets the Brand name of a product
 *
 * @return array
 */
if( ! function_exists( 'mc_get_product_brand' ) ) {
	function mc_get_product_brand( $product ) {

		$tax_product_brand = 'product_brand';

		if ( is_numeric( $product ) ) {
			$product_id   = absint( $product );
		} elseif ( $product instanceof WC_Product ) {
			$product_id   = absint( $product->id );
		} elseif ( isset( $product->ID ) ) {
			$product_id   = absint( $product->ID );
		}

		$terms = get_the_terms( $product_id, $tax_product_brand );

		$product_brands = array();
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$product_brands[] = $term->name;
			}
		}

		return apply_filters( 'mc_get_produc_brands', $product_brands );
	}
}

/**
 * Does Single Product action buttons action
 *
 * @return void
 */
if( ! function_exists( 'mc_single_product_action_buttons' ) ) {
	function mc_single_product_action_buttons() {
		?>
		<div class="product-action-buttons">
			<?php
			/**
		 	 * @hooked 
		 	 */
			do_action( 'mc_single_product_action_buttons' );
			?>
		</div><!-- /.product-action-buttons -->
		<?php
	}
}

/**
 * Determines no of columns in loop
 */
if( ! function_exists( 'mc_loop_shop_columns' ) ) {
	function mc_loop_shop_columns( $columns ) {
		return apply_filters( 'mc_loop_shop_columns', 3 );
	}
}

/**
 * Outputs Product Item Inner
 */
if( ! function_exists( 'mc_output_loop_product_inner' ) ) {
	function mc_output_loop_product_inner() {
		?>
		<div class="product-inner">
		<?php
	}
}

if( ! function_exists( 'mc_output_loop_product_inner_end' ) ) {
	function mc_output_loop_product_inner_end() {
		?>
		</div><!-- /.product-inner -->
		<?php
	}
}

/**
 * Displays Product Item Title area
 */
if ( ! function_exists( 'mc_shop_loop_item_title' ) ) {
	function mc_shop_loop_item_title() {
		?>
		<div class="title-area">
			<?php
				if( apply_filters( 'mc_show_rating_in_title', false ) ) {
					woocommerce_template_loop_rating();
				}
				woocommerce_template_loop_product_title();
				mc_template_single_brand(); 
			?>
		</div>
		<?php
	}
}

if( ! function_exists( 'mc_shop_loop_hover_area' ) ) {
	function mc_shop_loop_hover_area() {
		?>
		<div class="hover-area">
			<div class="hover-area-inner">
				<?php
				/**
				 * @hooked mc_template_loop_add_to_cart - 10
				 * @hooked mc_loop_action_buttons - 20
				 */
				do_action( 'mc_shop_loop_hover_area' );
				?>
			</div>
		</div><!-- /.hover-area -->
		<?php
	}
}

if( ! function_exists( 'mc_template_loop_add_to_cart' ) ) {
	function mc_template_loop_add_to_cart() {
		?>
		<div class="add-to-cart-button-wrapper">
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>
		<?php
	}
}

if( ! function_exists ( 'mc_loop_action_buttons' ) ) {
	function mc_loop_action_buttons() {
		?>
		<div class="action-buttons">
			<?php
			/**
			 * Action Buttons after add_to_cart button
			 */
			do_action( 'mc_loop_action_buttons' );
			?>
		</div>
		<?php
	}
}

if( ! function_exists( 'mc_loop_shop_per_page' ) ) {
	function mc_loop_shop_per_page( $products_per_page ) {
		return apply_filters( 'mc_loop_shop_per_page', 18 );
	}
}

if( ! function_exists( 'mc_add_to_cart_fragments' ) ) {
	function mc_add_to_cart_fragments( $fragments ) {

		$cart_subtotal = WC()->cart->subtotal;
		$tp_font_class = mc_get_total_price_font_class( $cart_subtotal );
		
		$fragments['span.total-price'] 		= '<span class="total-price ' . esc_attr( $tp_font_class ). '">' . WC()->cart->get_cart_subtotal() . '</span>';
		$fragments['span.cart-items-count'] = '<span class="cart-items-count count">' . WC()->cart->get_cart_contents_count() . '</span>';
		
		return $fragments;
	}
}

if( ! function_exists( 'mc_get_total_price_font_class' ) ) {
	function mc_get_total_price_font_class( $cart_subtotal = '' ) {

		if( empty( $cart_subtotal ) ) {
			$cart_subtotal = WC()->cart->subtotal;
		}

		$tp_font_class = 'ft-22';
		if( $cart_subtotal >= 1000000 ){
		    $tp_font_class = 'ft-12';
		} elseif ( $cart_subtotal >= 100000 ){
		    $tp_font_class = 'ft-14';
		} elseif ( $cart_subtotal >= 10000){
		    $tp_font_class = 'ft-16';
		} elseif ( $cart_subtotal >= 1000){
		    $tp_font_class = 'ft-18';
		}

		return $tp_font_class;
	}
}

if( ! function_exists( 'mc_control_bar' ) ) {
	function mc_control_bar() {
		?>
		<div class="control-bar">
		<?php
		/**
		 * @hooked woocommerce_catalog_ordering, - 10
		 * @hooked mc_shop_view_switcher - 20
		 */
		do_action( 'mc_control_bar' );
		?>
		</div>
		<?php
	}
}

if( ! function_exists( 'mc_loop_product_thumbnail' ) ) {
	function mc_loop_product_thumbnail() {
		$product_thumbnail = woocommerce_get_product_thumbnail();
		?>
		<div class="product-thumbnail-wrapper">
			<?php echo $product_thumbnail; ?>
		</div>
		<?php
	}
}

if( ! function_exists( 'mc_loop_product_thumbnail_with_link' ) ) {
	function mc_loop_product_thumbnail_with_link() {
		$product_thumbnail = '<a href="' . esc_url( get_permalink() ) . '">' . woocommerce_get_product_thumbnail() . '</a>';
		?>
		<div class="product-thumbnail-wrapper">
			<?php echo $product_thumbnail; ?>
		</div>
		<?php
	}
}

if( ! function_exists( 'mc_add_loop_product_animation_classes' ) ) {
	/**
	 * Adds animation classes to product loop item. The default animation is fadeIn
	 *
	 * @since 2.0.0
	 * @return array
	 */
	function mc_add_loop_product_animation_classes( $classes ) {
		if( in_array( 'type-product', $classes ) && ! is_product() ) {
			if( apply_filters( 'mc_enable_loop_product_animation', true ) ) {
				$classes[] = 'wow';
				$classes[] = apply_filters( 'mc_loop_product_animation', 'fadeIn' );
			}
		}
		return $classes;
	}
}

if( ! function_exists ( 'mc_wrap_price_html' ) ) {
	/**
	 * Wrap default price HTML with a mc wrapper
	 *
	 * @since 2.0.0
	 * @return string
	 */
	function mc_wrap_price_html( $price ) {
		return '<span class="mc-price-wrapper">' . $price . '</span>';
	}
}

if( ! function_exists( 'mc_loop_list_view' ) ) {
	/**
	 * Displays Products in List View
	 *
	 * @since 2.0.0
	 * @return void
	 */
	function mc_loop_list_view() {
			$active_view = apply_filters( 'mc_default_view_switcher_view', 'grid' );

		?>
		<div id="list-view" <?php if( $active_view == 'list' ) : ?>class="active"<?php endif; ?>>
			
			<?php do_action( 'woocommerce_before_list_view_loop' ); ?>

			<?php woocommerce_product_subcategories( array( 'before' => '<ul class="product-subcategories-list-view">', 'after' => '</ul>' ) ); ?>

			<?php  while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'templates/contents/content', 'product-list-view' ); ?>

			<?php endwhile; ?>

			<?php do_action( 'woocommerce_after_list_view_loop' ); ?>

		</div>
		<?php
	}
}

if( ! function_exists( 'mc_loop_stock_availability' ) ) {
	/**
	 * Outputs product's stock availability
	 */
	function mc_loop_stock_availability() {

		global $product;
		$availability = $product->get_availability();
		$stock_status = $availability['class'];
		
		if( $stock_status == 'out-of-stock' ) {
			$label = __( 'Out of Stock', 'mediacenter' ) ;
			$label_class = 'not-available';
		} else {
			$label = __( 'In Stock', 'mediacenter' ) ;
			$label_class = 'available';
		}

		echo apply_filters( 'mc_loop_stock_availability_html',
			sprintf( '<div class="availability"><label>%s</label><span class="%s">%s</span></div>',
				__( 'Availability:', 'mediacenter' ),
				$label_class,
				$label
			),
		$product );
	}
}

if( ! function_exists( 'mc_template_loop_product_labels' ) ) {
	function mc_template_loop_product_labels( $product_id = false ) {
		
		global $product;

		$product_id = ( $product_id ) ? $product_id : $product->id;
		$labels = get_the_terms( $product_id, 'product_label' );
		$product_labels = '';

		if ( $labels && ! is_wp_error( $labels ) ){
			foreach( $labels as $label ){
				$product_labels .= '<div class="ribbon label-' . $label->term_id . '"><span>' . $label->name . '</span></div>';
			}
		}

		echo $product_labels;

	}
}

if( ! function_exists( 'mc_output_search_bar' ) ) {
	/**
	 * Outputs header search bar
	 */
	function mc_output_search_bar() {
		mc_get_template( 'header/mc-search-bar.php' );
	}
}

if( ! function_exists( 'mc_is_catalog_mode_enabled' ) ) {
	/**
	 * Checks if catalog mode is enabled or not
	 *
	 * @return boolean
	 */
	function mc_is_catalog_mode_enabled() {
		return apply_filters( 'mc_is_catalog_mode_enabled', false );
	}
}

if( ! function_exists( 'mc_loop_add_to_cart_link' ) ) {
	/**
	 * Checks for Catalog mode before displaying the cart link via woocommerce_loop_add_to_cart_link filter
	 *
	 * @return string
	 */
	function mc_loop_add_to_cart_link( $add_to_cart_link, $product ) {

		$force_view_product = apply_filters( 'mc_force_view_product', false );

		if( $force_view_product || ! ('external' === $product->product_type || false === apply_filters( 'mc_is_catalog_mode_enabled', false ) ) ) {
			$view_product_text 	= apply_filters( 'mc_view_product_text', __( 'View Product', 'mediacenter' ) ) ;
			$add_to_cart_link 	= sprintf( '<a href="%s" rel="nofollow" class="button">%s</a>',
				esc_url( get_permalink( $product->id ) ),
				$view_product_text
			);
		}

		return $add_to_cart_link;
	}
}

if( ! function_exists( 'mc_template_single_add_to_cart' ) ) {
	/**
	 * Trigger the single product add to cart action.
	 */
	function mc_template_single_add_to_cart() {

		global $product;

		if( 'external' === $product->product_type || false === apply_filters( 'mc_is_catalog_mode_enabled', false ) ) {
			woocommerce_template_single_add_to_cart();
		}
	}
}

if( ! function_exists( 'mc_subcategory_thumbnail' ) ) {
	/**
	 * Show subcategory thumbnails.
	 *
	 * @param mixed $category
	 */
	function mc_subcategory_thumbnail( $category ) {
		ob_start();
		woocommerce_subcategory_thumbnail( $category );
		$subcategory_thumbnail = ob_get_clean();
		echo '<div class="product-cat-thumbnail-wrapper">' . $subcategory_thumbnail . '</div>';
	}
}

if( ! function_exists( 'mc_woocommerce_image_dimensions' ) ) {
	/**
	 * Define image sizes
	 */
	function mc_woocommerce_image_dimensions() {
		global $pagenow;
	 
		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

	  	$catalog = array(
			'width' 	=> '246',
			'height'	=> '186',
			'crop'		=> 1
		);

		$single = array(
			'width' 	=> '433',
			'height'	=> '325',
			'crop'		=> 1
		);

		$thumbnail = array(
			'width' 	=> '73',
			'height'	=> '73',
			'crop'		=> 1
		);
		
		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
		update_option( 'shop_thumbnail_image_size', $thumbnail );
	}
}