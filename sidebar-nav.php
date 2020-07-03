<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>

<?php if ( has_nav_menu('main-menu') ) : ?>
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li class="mb-3 b-0 ml-2">
                <?php get_template_part('templates/global/skin', 'toggler'); ?>
            </li>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu'           => 'nav navbar-nav',
                        'container'      => 'false',
                        'items_wrap' => '%3$s',
                        'menu_class'     => 'sidebar-menu',
                        'fallback_cb'    => '',
                        'menu_id'        =>  'main-menu',
                        'depth'          => 2,
                    )
                );
                ?>
        </ul>
    </div>
</aside>
<?php endif; ?>