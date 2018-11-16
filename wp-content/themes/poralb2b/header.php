<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="tm-page">
    <div class="tm-toolbar uk-visible@m">
        <div class="uk-container uk-flex uk-flex-middle">
            <div class="uk-margin-auto-left">
                <div class="uk-grid-medium uk-child-width-auto uk-flex-middle uk-grid uk-grid-stack" uk-grid="margin: uk-margin-small-top">
                    <div class="uk-first-column">
                        <div class="uk-panel widget-text">
                            <div class="textwidget">
                                <a class="uk-button uk-button-text"
                                   href="#">Acceso para clientes</a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-second-column">
                        <div class="uk-panel widget-text">
                            <div class="textwidget">
                                <a class="uk-button uk-button-text"
                                   href="#">Registrarse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //if ( has_nav_menu( 'top' ) ) : ?>
        <?php get_template_part('template-parts/navigation/navigation-top', 'navigation-top'); ?>
    <?php //endif; ?>

