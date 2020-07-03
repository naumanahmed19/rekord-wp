<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if(get_theme_mod('layout_rtl'))  echo 'dir="rtl"'; ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="app" class="<?php echo (get_theme_mod('theme_skin') != '#0c101b') ? 'theme-light' : 'theme-dark'; ?>">