    <?php
     $track_url  =  rekord_get_field('track_upload')['url'];
     $track_wave  =  rekord_get_field('track_wave')['url'];
     $track_artists  = rekord_get_field('track_artists'); 
    if(rekord_get_field('track') != 'upload'):
        $track_url  = rekord_get_field('track_url')  ;
    endif;   

    $track_thumbnail = '';
    if ( has_post_thumbnail() ) {
        $track_thumbnail  = get_the_post_thumbnail_url(get_the_ID(),'full'); 

        }
        elseif(!empty(rekord_get_field('track_albums')[0])){
            $album = rekord_get_field('track_albums')[0];
            $track_thumbnail  =    get_the_post_thumbnail_url($album->ID ,'full'); 
        }
     //Check membership
     


     if(rekord_canAccess('track_play_subscriptions')){ ?>
        <a
            
            data-title="<?php the_title(); ?>" 
            data-time="<?php rekord_the_field('track_time');?>"
            data-thumbnail="<?php echo esc_url($track_thumbnail); ?>"
            data-permalink="<?php the_permalink(); ?>"
            data-artist="<?php echo $track_artists[0]->post_title; ?>"
            class="no-ajaxy media-url track-url"
            href="<?php echo esc_url($track_url); ?>" <?php if(!empty( $track_wave )) echo 'data-wave="'.esc_url($track_wave).'"';
        ?>>
            <i class="icon-play <?php echo !empty($icon_classes) ? $icon_classes : 's-28'; ?>"></i>
        </a>


     <?php } else{ ?>

         
        <a class=""
            href="<?php echo pmpro_url("levels")?>">
            <i class="icon-play"></i>
        </a>


    <?php } ?>




    <?php  set_query_var( 'icon_classes', null ); ?>