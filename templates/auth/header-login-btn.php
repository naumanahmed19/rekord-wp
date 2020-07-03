<?php if(get_theme_mod('frontend_auth')): ?>
<?php if(is_user_logged_in()):
                    $user = wp_get_current_user();
                    if ( $user ) :?>


<li class="dropup custom-dropdown user user-menu ">
    <a href="#" class="nav-link" data-toggle="dropdown">
        <figure class="avatar">
            <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"
                alt="">
        </figure>
        <i class="icon-more_vert"></i>
    </a>
    <div class="dropdown-menu p-4  dropdown-menu-right  b-0 shadow">

        <?php
                          wp_nav_menu(
                            array(
                                'theme_location' => 'user-menu',
                                'menu'           => 'nav navbar-nav',
                                'container'      => 'false',
                                'menu_class'     => 'user-menu',
                                'fallback_cb'    => '',
                                'menu_id'        =>  'user-menu',
                                'depth'          => 1,
                            )
                        );
                      ?>
        <a class="no-ajaxy" href="<?php echo wp_logout_url(home_url()); ?>"><i class="icon icon-sign s-18"></i>
            <span><?php _e('Log Out', 'rekord'); ?> </span></a>
    </div>
</li>
<?php  endif;  else: ?>
<li>
    <a class="nav-link mr-3 no-ajaxy" href="#" data-toggle="modal" data-target="#loginModal">
        <i class="icon-login s-24"></i>
    </a>

</li>
<?php endif; ?>

<?php endif ; ?>