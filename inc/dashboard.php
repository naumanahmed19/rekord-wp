<?php
/**
 *  Frontend Settings
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.3.8
 *  @since     1.3.8
 */

    /**
     * Hide Adminbar
     */ 
    add_action('after_setup_theme', 'rekord_remove_admin_bar');
    function rekord_remove_admin_bar() {
      if (!rekord_isRole('administrator')) {
        show_admin_bar(false);
      }
    }

    /**
     * Change author slug to user
     */ 
    add_action('init', 'rekord_author_slug');
    function rekord_author_slug() {
        global $wp_rewrite;
        $author_slug = 'user'; // change slug name
        $wp_rewrite->author_base = $author_slug;
    }




    /**
     * Avater change
     */ 
  add_filter('get_avatar_url', 'profile_img_url', 10, 3);

  function profile_img_url( $avatar, $id_or_email,$args = array() ) {

    
      
    
      $user = false;


      global $post;

      if($post->post_type == 'post'){

           
          return $avatar;
      }

      if ( is_numeric( $id_or_email ) ) {

          $id = (int) $id_or_email;
          $user = get_user_by( 'id' , $id );

      } elseif ( is_object( $id_or_email ) ) {

          if ( ! empty( $id_or_email->user_id ) ) {
              $id = (int) $id_or_email->user_id;
              $user = get_user_by( 'id' , $id );
          }

      } else {
          $user = get_user_by( 'email', $id_or_email );	
      }



    //   global $wp_query;
    //   if($wp_query->get_queried_object())
    //       $user = $wp_query->get_queried_object(); 

      if ( $user && is_object( $user ) ) {


      if ((int)$user->data->ID == $user->ID ) {
             $key = 'user_'.$user->ID;
              $avatarId = rekord_get_field('profile_photo', $key ); 
              $avatar =  wp_get_attachment_image_src((int)$avatarId,'full')[0]; 
         }
      }

      return $avatar;
    }        