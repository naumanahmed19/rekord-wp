<?php
/**
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */

$button = rekord_get_field('button');
$btn_label = rekord_get_field('button_label');
$btn_url = rekord_get_field('button_url');
$product = rekord_get_field('add_to_cart_button');
    
    if( $button  == 'Link To WooCommerce' && !empty($product)){
        echo do_shortcode('[add_to_cart id="'.$product->ID.'"]'); 
                                                
    }elseif(!empty($btn_label)){
        echo '<a href="'.$btn_url.'" class="btn btn-outline-primary btn-sm">'.$btn_label.'</a>';
    }  
?>