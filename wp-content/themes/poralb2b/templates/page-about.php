<?php
/*
Template Name: Poral Nosotros
 */

/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section id="ps_about" class="uk-margin">
    <div class="uk-container">
        <div class="uk-height-match" uk-grid uk-height-match>
            <div class="uk-width-auto">
                <img src="<?= get_theme_file_uri( '/assets/images/ribbon.jpg') ?>" alt=""
                     style="width: 100%;">
            </div>
            <div class="uk-width-expand">
                <p>A mediados de la década del 40, Hugo Porta junto a Ricardo Alvarado y con la ayuda de Enrique Alvarado, deciden fundar una empresa dedicada a la distribución de artículos sanitarios. Lo que comenzó como un pequeño emprendimiento familiar bajo el nombre de Casa Pico, hoy es PORAL S.A.C.I.</p>
                <p>Nuestra misión es optimizar tiempos y aportar calidad para ser los líderes en la distribución de sanitarios, vinculando la producción con el consumo. La cumplimos rodeados de una excelente equipo, comprometido, flexible, con una fluida comunicación entre sus miembros y nuestros clientes. Lo hemos hecho a través de tres generaciones y continuaremos con nuestro esfuerzo para mantener el liderazgo en el mercado argentino.</p>
            </div>
        </div>
    </div>
</section>

<section id="ps_history" class="uk-margin-top">
    <div class="uk-container">
        <h1 class="uk-heading-primary uk-margin ps-section-title">Nuestra Historia</h1>
        <div uk-grid class="uk-margin-top">
            <div class="uk-width-auto@m uk-flex-last@m">
                <ul class="uk-tab-right" uk-tab="connect: #component-tab-right; animation: uk-animation-fade">
                    <li><a href="#"><h3>- 2018</h3></a></li>
                    <li><a href="#"><h3>- 2000</h3></a></li>
                    <li><a href="#"><h3>- 1990</h3></a></li>
                </ul>
            </div>
            <div class="uk-width-expand@m">
                <ul id="component-tab-right" class="uk-switcher">
                    <li>
                        <div class="uk-height-match" uk-grid uk-height-match>
                            <div class="uk-width-auto">
                                <img src="<?= get_theme_file_uri( '/assets/images/store.jpg') ?>" alt=""
                                     style="width: 100%;">
                            </div>
                            <div class="uk-width-expand">
                                <h1 class="uk-heading-primary uk-margin ps-title">2018</h1>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <h1 class="uk-heading-primary uk-margin ps-title">2000</h1>
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li>
                        <div class="uk-height-match" uk-grid uk-height-match>
                            <div class="uk-width-auto">
                                <img src="<?= get_theme_file_uri( '/assets/images/store.jpg') ?>" alt=""
                                     style="width: 100%;">
                            </div>
                            <div class="uk-width-expand">
                                <h1 class="uk-heading-primary uk-margin ps-title">1990</h1>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php get_footer();
