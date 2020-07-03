<?php
/**
 *  Kirki Options
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */


if ( class_exists( 'Kirki' ) ) :
/**
 * Add our controls.
 */

function choice_b_callback( $control ) {
  if ( $control->manager->get_setting('rekord_top_menu')->value() == 'on' ) {
     return true;
  } else {
     return false;
  }
}
function rekord_theme_options($controls)
{

   /* ------------------------------------------------------------------------- *
      *  Color CONTROLS
    /* ------------------------------------------------------------------------- */

    $section = 'colors';

    $bg_selectors  ='.badge-primary,.music_pseudo_bar ,.slider::-moz-range-thumb,.slider::-webkit-slider-thumb,.page-links .current,.post-page-numbers:hover,.primary-color,.bg-primary,.btn-primary, .btn-primary:focus, .btn-primary:hover,.btn-outline-primary:hover,.offcanvas .sidebar-menu >
    li.active::after,.btn-outline-primary:not(:disabled):not(.disabled).active,
    .btn-outline-primary:not(:disabled):not(.disabled):active, .show >
    .btn-outline-primary.dropdown-toggle,.page-item.active .page-link,.page-link:hover,.woocommerce #respond
    input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.nav-material
    > li > a::after,.xv-qyt:hover';

    $color_selectors = '.xv-menuwrapper .dl-menu > li.active > a,.icon-close, .navbar li a:focus, .navbar li a:hover,.offcanvas .sidebar-menu li a:hover,.post-page-numbers,a,.btn-outline-primary ,.btn-link, .sidebar ul li.active >a,.btn-link:hover,.control-sidebar .offcanvas
    .sidebar-menu > li a.active,.nav-material > li > .nav-link.active,
    .control-sidebar .sidebar-tabs a.active, .control-sidebar .tab-content a.active, .control-sidebar.offcanvas
    .sidebar-menu > li a.active, .theme-dark .offcanvas .sidebar-menu > li a.active, .theme-dark .sidebar-tabs a.active,
    .theme-dark .tab-content a.active, .theme-dark.offcanvas .sidebar-menu > li a.active,.woocommerce div.product p.price,
    .woocommerce div.product span.price,.xv-qyt,.woocommerce #content div.product .woocommerce-tabs ul.tabs li a,
    .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce-page #content div.product .woocommerce-tabs
    ul.tabs li a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li a,.nav-material > li >
    a:hover,.page-title,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce #respond
    input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.page-link';

    $border_selectors = '.post-page-numbers:hover,.page-links .current,.wp-block-quote,.spinner-icon,#nprogress .bar,.btn-outline-primary,.btn-outline-primary:not(:disabled):not(.disabled).active,
    .btn-outline-primary:not(:disabled):not(.disabled):active, .show >
    .btn-outline-primary.dropdown-toggle,.page-item.active .page-link,.page-link:hover,.nav-material > li
    .nav-link.active,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce
    button.button:hover, .woocommerce input.button:hover,.xv-qyt,.nav-material > li .nav-link.active,.woocommerce #content
    .quantity, .woocommerce .quantity, .woocommerce-page #content .quantity, .woocommerce-page .quantity,.woocommerce
    #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce
    input.button,.woocommerce-message,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button,
    .woocommerce input.button';




    $controls[] = array(
      'type'        => 'color-palette',
      'settings'    => 'theme_skin',
      'label'       => esc_html__( 'Theme Skin', 'rekord' ),
      'description' => esc_html__( 'Select a dark or light theme skin', 'rekord' ),
      'section' => $section,
      'default'     => '#0c101b',
      'choices'     => [
        'colors' => [ '#0c101b', '#ffffff' ],
        'style'  => 'round',
      ],
   );

   $controls[] = array(
    'type'        => 'switch',
    'settings'    => 'vistors_can_change_skin',
    'label'       => esc_html__( 'Skin Control for visitors', 'rekord' ),
    'description'       => esc_html__( 'Allow visitors to change theme skin to light or dark (beta)', 'rekord' ),
    'section' => $section,
    'default'     => '0',
    'priority'    => 10,
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'rekord' ),
      'off' => esc_html__( 'Disable', 'rekord' ),
    ],
 );

    $controls[] = array(
        'type' => 'color',
        'settings' => 'primary_color',
        'label' => esc_attr__('Primary Color', 'rekord'),
        'section' => $section,
        'default'     => '#ff1744',
         
        'priority' => 10,
        'output' => array(
          array(
            'element'  =>  explode(',',  $color_selectors),
            'property' => 'color',
          ),
          array(
            'element'  =>   explode(',',  $bg_selectors),
            'property' => 'background-color',
          ),
          array(
            'element'  =>   explode(',',  $border_selectors),
            'property' => 'border-color',
          ),
          array(
            'element'  =>   '.text-primary',
            'property' => 'color',
            'suffix' => '!important'
          ),
          array(
            'element'  =>   '.primary-color,.bg-primary',
            'property' => 'background-color',
            'suffix' => '!important'
          ),
        ),
        
    );
    

    $accent_selectors ='a:hover';
    $controls[] = array(
      'type' => 'color',
      'settings' => 'accent_color',
      'label' => esc_attr__('Accent Color', 'rekord'),
      'section' => $section,
      'default'     => '#ca0027',
      'priority' => 10,
      'output' => array(
        array(
          'element'  =>  explode(',',  $accent_selectors),
          'property' => 'color',
        ),
      ),
  );


   /* ------------------------------------------------------------------------- *
      *  Menu 
    /* ------------------------------------------------------------------------- */


  $section = 'nav_menus_section';

  $controls[] = array(
    'type'        => 'switch',
    'settings'    => 'rekord_top_menu',
    'label'       => esc_html__( 'Top Menu', 'rekord' ),
    'description'       => esc_html__( 'Enable menu on top', 'rekord' ),
    'section' => $section,
    'default'     => '0',
    'priority'    => 100,
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'rekord' ),
      'off' => esc_html__( 'Disable', 'rekord' ),
    ],
  );


  $controls[] = array(
    'type' => 'select',
    'settings' => 'rekord_menu_style',
    'label' => esc_attr__('Menu Style', 'rekord'),
    'section' => $section,
    'default' => '',
    'priority' => 100,
    'active_callback' => 'choice_b_callback',
    'choices' => [
      ''=> esc_attr__('Left Align', 'rekord'),
      'center'=> esc_attr__('Center Align', 'rekord'),
    ]
);
  

    

   /* ------------------------------------------------------------------------- *
      *  Gernal CONTROLS
    /* ------------------------------------------------------------------------- */

    $section = 'gernal';


    $controls[] = array(
      'type'        => 'typography',
      'settings'    => 'theme_font',
      'label'       => esc_html__( 'Theme Font', 'rekord' ),
      'section' => $section,
      'default'     => [
        'font-family'    => 'Roboto',
      ],
      'priority'    => 10,
      'transport'   => 'auto',
      'output'      => [
        [
          'element' => 'body',
        ],
      ],
    );



   
    $controls[] = array(
      'type'        => 'switch',
      'settings'    => 'layout_rtl',
      'label'       => esc_html__( 'Enable RTL', 'rekord' ),
      'section' => $section,
      'default'     => '0',
      'priority'    => 10,
      'choices'     => [
        'on'  => esc_html__( 'Enable', 'rekord' ),
        'off' => esc_html__( 'Disable', 'rekord' ),
      ],
   );

   $controls[] = array(
    'type'        => 'switch',
    'settings'    => 'top_bar',
    'label'       => esc_html__( 'Bar On Top', 'rekord' ),
    'section' => $section,
    'default'     => '1',
    'priority'    => 10,
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'rekord' ),
      'off' => esc_html__( 'Disable', 'rekord' ),
    ],
  );




 $controls[] = array(
  'type' => 'text',
  'settings' => 'google_map_api_key',
  'label' => esc_attr__('Google Map API', 'rekord'),
  'section' => $section,
  'priority' => 10,
);


    
 
 /* ------------------------------------------------------------------------- *
      *  Player Section
    /* ------------------------------------------------------------------------- */
    $section = 'player';


    $controls[] = array(
      'type'        => 'switch',
      'settings'    => 'rekord_player',
      'label'       => esc_html__( 'Player', 'rekord' ),
      'description'       => esc_html__( 'If you are using site of other purposes you can disable player.', 'rekord' ),
      'section' => $section,
      'default'     => '0',
      'priority'    => 10,
      'choices'     => [
        'on'  => esc_html__( 'Enable', 'rekord' ),
        'off' => esc_html__( 'Disable', 'rekord' ),
      ],
      
    );
      $controls[] = array(
        'type'        => 'switch',
        'settings'    => 'auto_play',
        'label'       => esc_html__( 'Auto Play', 'rekord' ),
        'section' => $section,
        'default'     => '0',
        'priority'    => 10,
        'choices'     => [
          'on'  => esc_html__( 'Enable', 'rekord' ),
          'off' => esc_html__( 'Disable', 'rekord' ),
        ],
   );

   $controls[] = array(
    'type'        => 'switch',
    'settings'    => 'player_volume',
    'label'       => esc_html__( 'Volume Control', 'rekord' ),
    'section' => $section,
    'default'     => '0',
    'priority'    => 10,
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'rekord' ),
      'off' => esc_html__( 'Disable', 'rekord' ),
    ],
);


 /* ------------------------------------------------------------------------- *
      *  Ajaxify Section
    /* ------------------------------------------------------------------------- */
    $section = 'ajaxify';

 $controls[] = array(
  'type'        => 'switch',
  'settings'    => 'ajaxify',
  'label'       => esc_html__( 'Ajaxify', 'rekord' ),
  'description'       => esc_html__( 'Make site ajaxify. If you are using plugins. You may need to recall scripts.', 'rekord' ),
  'section' => $section,
  'default'     => '0',
  'priority'    => 10,
  'choices'     => [
    'on'  => esc_html__( 'Enable', 'rekord' ),
    'off' => esc_html__( 'Disable', 'rekord' ),
  ],
);
$controls[] = array(
  'type'        => 'code',
  'settings'    => 'rekord_ajax_callback',
  'label'       => esc_html__( 'Ajax Callback', 'rekord' ),
  'description' => esc_html__( 'Add ajax callback here', 'rekord' ),
  'section' => $section,
  'default'     => '',
  'choices'     => [
    'language' => 'js',
  ],
 );
    /* ------------------------------------------------------------------------- *
      *  Social Section
    /* ------------------------------------------------------------------------- */
    $section = 'social';

    $controls[] = array(
      'type' => 'select',
      'settings' => 'social_share',
      'label' => esc_attr__('Share Icons', 'rekord'),
      'section' => $section,
      'default' => '',
      'priority' => 10,
      'multiple' => 999,
      'choices' => [
        'fb'=> esc_attr__('Facebook', 'rekord'),
        'tw'=> esc_attr__('Twitter', 'rekord'),
        'whatsapp'=> esc_attr__('WhatsApp', 'rekord'),
        'email'=> esc_attr__('email', 'rekord'),
      ]
  );
   
    $controls[] = array(
        'type' => 'text',
        'settings' => 'social_share_facebook_api',
        'label' => esc_attr__('Facebook API', 'rekord'),
        'section' => $section,
        'priority' => 10,
    );

    /* ------------------------------------------------------------------------- *
      *  favourites Section
    /* ------------------------------------------------------------------------- */

    $section = 'favourites';
        
$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_favourites',
	'label'       => esc_html__( 'Select Favourites Page', 'rekord' ),
	'section' => $section,
	'default'     => 42,
	'priority'    => 10,
);
    $controls[] = array(
      'type' => 'select',
      'settings' => 'xv_favourites',
      'label' => esc_attr__('Favourites', 'rekord'),
      'section' => $section,
      'default' => '',
      'priority' => 10,
      'multiple' => 999,
      'choices' => [
        'track'=> esc_attr__('Tracks', 'rekord'),
        'album'=> esc_attr__('Albums', 'rekord'),
        'video'=> esc_attr__('Videos', 'rekord'),
        'artist'=> esc_attr__('Artists', 'rekord'),
        'event'=> esc_attr__('Events', 'rekord'),
        'post'=> esc_attr__('Posts', 'rekord'),
      ]
  );
  /* ------------------------------------------------------------------------- *
      *  favourites Section
    /* ------------------------------------------------------------------------- */

    $section = 'playlist';
    
    $controls[] = array(
      'type' => 'text',
      'settings' => 'playlist_title',
      'label' => esc_attr__('Title', 'rekord'),
      'section' => $section,
      'priority' => 10,
  );
   
  $controls[] = array(
    'type' => 'text',
    'settings' => 'playlist_subtitle',
    'label' => esc_attr__('Subtitle', 'rekord'),
    'section' => $section,
    'priority' => 10,
);
$controls[] = array(
  'type' => 'select',
  'settings' => 'playlist_categories',
  'label' => esc_attr__('Playlist Categories', 'rekord'),
  'section' => $section,
  'default' => '',
  'priority' => 10,
  'multiple' => 999,
  'choices' => rekord_get_terms('track','track-categories')
);


$controls[] = array(
	'type'        => 'number',
	'settings'    => 'playlist_posts',
	'label'       => esc_html__( 'Number of Tracks',  'rekord' ),
	'section' => $section,
	'default'     => 5,
	'choices'     => [
		'min'  => 1,
		'max'  => 50,
		'step' => 1,
	],
);

  /* ------------------------------------------------------------------------- *
      *  Track Upload
    /* ------------------------------------------------------------------------- */

$section = 'frontend_options';

$controls[] = array(
  'type'        => 'switch',
  'settings'    => 'frontend_auth',
  'label'       => esc_html__( 'Frontend Login', 'rekord' ),
  'description'  => esc_html__( 'Allow users to login from frontend.', 'rekord' ),
  'section' => $section,
  'default'     => '0',
  'priority'    => 10,
  'choices'     => [
    'on'  => esc_html__( 'Enable', 'rekord' ),
    'off' => esc_html__( 'Disable', 'rekord' ),
  ],
);

$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_user_register',
	'label'       => esc_html__( 'Frontend User Register Page', 'rekord' ),
	'section' => $section,
	'default'     => 42,
	'priority'    => 10,
);


$controls[] = array(
  'type'        => 'switch',
  'settings'    => 'can_upload_track',
  'label'       => esc_html__( 'Track Uploads ', 'rekord' ),
  'description'  => esc_html__( 'Allow Register Users to upload tracks.', 'rekord' ),
  'section' => $section,
  'default'     => '0',
  'priority'    => 10,
  'choices'     => [
    'on'  => esc_html__( 'Enable', 'rekord' ),
    'off' => esc_html__( 'Disable', 'rekord' ),
  ],
);
    
$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_my_tracks',
	'label'       => esc_html__( 'Select Page for User Tracks', 'rekord' ),
	'section' => $section,
	'default'     => '',
	'priority'    => 10,
);

$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_track_save',
	'label'       => esc_html__( 'Select Page for Track Create', 'rekord' ),
	'section' => $section,
	'default'     => '',
	'priority'    => 10,
);


$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_my_albums',
	'label'       => esc_html__( 'Select Page for User Albums', 'rekord' ),
	'section' => $section,
	'default'     => '',
	'priority'    => 10,
);

$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_album_save',
	'label'       => esc_html__( 'Select Page for Create Album', 'rekord' ),
	'section' => $section,
	'default'     => '',
	'priority'    => 10,
);

$controls[] = array(
  'type'        => 'dropdown-pages',
	'settings'    => 'page_profile_edit',
	'label'       => esc_html__( 'Select Page for user profile edit', 'rekord' ),
	'section' => $section,
	'default'     => '',
	'priority'    => 10,
);



$controls[] = array(
  'type' => 'select',
  'settings' => 'page_artist_profile_tabs',
  'label' => esc_attr__('Artist Public Profile Tabs', 'rekord'),
  'section' => $section,
  'default' => '',
  'priority' => 10,
  'multiple' => 999,
  'choices' => [
    'tracks'=> esc_attr__('Tracks', 'rekord'),
    'albums'=> esc_attr__('Albums', 'rekord'),
    'videos'=> esc_attr__('Videos', 'rekord'),
    'artists'=> esc_attr__('Artists', 'rekord'),
    'events'=> esc_attr__('Events', 'rekord'),
    'posts'=> esc_attr__('Posts', 'rekord'),
  ]
);

$controls[] = array(
  'type' => 'select',
  'settings' => 'page_profile_tabs',
  'label' => esc_attr__('Public Profile Tabs', 'rekord'),
  'section' => $section,
  'default' => '',
  'priority' => 10,
  'multiple' => 999,
  'choices' => [
    'favourites'=> esc_attr__('Favourites', 'rekord'),
  ]
);






    return $controls;
}

add_filter('kirki/controls', 'rekord_theme_options');


/* ------------------------------------------------------------------------- *
 *  Configuration
/* ------------------------------------------------------------------------- */
/* adding configuration */
Kirki::add_config('mk', array(
    'capability' => 'edit_theme_options',
    'option_type' => 'option',
    'option_name' => 'mk'
));
/* ------------------------------------------------------------------------- *
 *  Panels
/* ------------------------------------------------------------------------- */
/* adding header panel */
Kirki::add_panel('rekord', array(
    'priority' => 10,
    'title' => esc_attr__('Rekord Settings', 'rekord'),
    'description' => esc_attr__('This panel will provide all the options of the header.', 'rekord'),
));


/* ------------------------------------------------------------------------- *
 *  Sections
/* ------------------------------------------------------------------------- */
/* adding header_background_color section*/
Kirki::add_section('gernal', array(
  'title' => esc_attr__('Gernal Settings'  , 'rekord'),
  'panel' => 'rekord',
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
));


Kirki::add_section('nav_menus_section', array(
  'title' => esc_attr__('Rekord Menu Settings'  , 'rekord'),
  'panel' => 'nav_menus',
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
));


Kirki::add_section('ajaxify', array(
  'title' => esc_attr__('Ajax Settings'  , 'rekord'),
  'panel' => 'rekord',
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
));

Kirki::add_section('player', array(
  'title' => esc_attr__('Player Settings'  , 'rekord'),
  'panel' => 'rekord',
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
));


/* adding header_logo section*/
Kirki::add_section('social', array(
    'title' => esc_attr__('Social', 'rekord'),
    'description' => esc_attr__('Social Icons.', 'rekord'),
    'panel' => 'rekord',
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
));
Kirki::add_section('favourites', array(
    'title' => esc_attr__('Favourites', 'rekord'),
    'panel' => 'rekord',
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
));

Kirki::add_section('playlist', array(
  'title' => esc_attr__('Playlist Sidebar', 'rekord'),
  'panel' => 'rekord',
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
));


Kirki::add_section('frontend_options', array(
  'title' => esc_attr__('Frontend Options', 'rekord'),
  'panel' => 'rekord',
  'priority' => 160,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
));

add_filter('kirki/config', function ($config) {
    $config['disable_loader'] = true;
    return $config;
});
endif;