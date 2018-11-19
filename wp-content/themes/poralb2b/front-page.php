<?php
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

<section id="ps_slideshow">
    <div class="uk-position-relative uk-visible-toggle uk-light"
         uk-slideshow="min-height: 450; max-height: 450; autoplay: true; animation: push">
        <ul class="uk-slideshow-items">
            <li>
                <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                    <img src="<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>" alt="" uk-cover>
                </div>
            </li>
            <li>
                <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                    <img src="<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>" alt="" uk-cover>
                </div>
            </li>
            <li>
                <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                    <img src="<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>" alt="" uk-cover>
                </div>
            </li>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
</section>


<section id="ps_providers" class="uk-margin">
    <div class="uk-container">
    <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider="autoplay: true;">
        <ul class="uk-slider-items uk-child-width-1-3 uk-child-width-1-5@m uk-grid">
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-ferrum.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-fv.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-ramon-soler.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-roca.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                    style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-weber.png') ?>);">
                </div>
            </li>

            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-ferrum.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-fv.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-ramon-soler.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                            background-image: url(<?= get_theme_file_uri( '/assets/images/logo-roca.png') ?>">
                </div>
            </li>
            <li>
                <div class="uk-panel uk-background-contain"
                     style="height: 50px;
                             background-image: url(<?= get_theme_file_uri( '/assets/images/logo-weber.png') ?>);">
                </div>
            </li>
        </ul>
    </div>
    </div>
</section>


<section id="ps_categories" class="uk-margin">
    <div class="uk-container-expand">
    <div class="uk-child-width-1-1@s uk-child-width-expand@m uk-text-center uk-dark uk-height-match uk-grid-collapse" uk-grid
         uk-height-match="target: .ps-cat-name">
        <div class="uk-inline uk-padding uk-margin-bottom uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle"
             style="background-image: url(<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>); border: 1px solid #fff;">
            <div class="uk-position-small uk-position-bottom uk-overlay uk-overlay-primary uk-text-center ps-cat-box">
                <h3 class="ps-cat-name">Griferías</h3>
                <a class="uk-button uk-button-default" href="#">Ver Más</a>
            </div>
        </div>
        <div class="uk-inline uk-padding uk-margin-bottom uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle"
            style="background-image: url(<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>); border: 1px solid #fff;">
            <div class="uk-position-small uk-position-bottom uk-overlay uk-overlay-primary uk-text-center ps-cat-box">
                <h3 class="ps-cat-name">Porcelana Sanitaria y Piletas</h3>
                <a class="uk-button uk-button-default" href="#">Ver Más</a>
            </div>
        </div>
        <div class="uk-inline uk-padding uk-margin-bottom uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle"
             style="background-image: url(<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>); border: 1px solid #fff;">
            <div class="uk-position-small uk-position-bottom uk-overlay uk-overlay-primary uk-text-center ps-cat-box">
                <h3 class="ps-cat-name">Pisos y Revestimientos</h3>
                <a class="uk-button uk-button-default" href="#">Ver Más</a>
            </div>
        </div>
    </div>
    </div>
</section>

<section id="ps_ofert_prod" class="uk-margin">
    <div class="uk-container uk-text-center">
        <h1 class="uk-heading-primary uk-margin ps-section-title">Productos en Oferta</h1>
        <div uk-slider uk-height-match="target: .uk-card-media-top>img">
            <div class="uk-position-relative">
                <div class="uk-slider-container uk-light">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod01.gif') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem</p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small ps-ofert-prod-item">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod02.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod03.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod04.jpg') ?>" alt=""
                                        style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ps_home_promotion" class="uk-margin">
    <div class=" uk-height-large uk-background-cover uk-light uk-flex uk-flex-top" uk-parallax="bgy: -500"
         style="background-image: url('<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>');">
        <div class="uk-container uk-text-center uk-margin-auto uk-margin-auto-vertical ps-promotion-content">
            <h3 class="ps-cat-name">Poral</h3>
            <h5>Más de 60 años en el mercado de la construcción</h5>
            <p>A mediados de la década del 40, Hugo Porta junto a Ricardo Alvarado y con la ayuda de Enrique Alvarado, deciden fundar una empresa dedicada a la distribución de artículos sanitarios.</p>
            <a class="uk-button uk-button-default" href="#">Ver Más</a>
        </div>
    </div>
</section>

<section id="ps_new_prod" class="uk-margin">
    <div class="uk-container uk-text-center">
        <h1 class="uk-heading-primary uk-margin ps-section-title">Nuevos Productos</h1>
        <div uk-slider uk-height-match="target: .uk-card-media-top>img">
            <div class="uk-position-relative">
                <div class="uk-slider-container uk-light">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod01.gif') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem</p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small ps-ofert-prod-item">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod02.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod03.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/prod04.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                        <li class="uk-padding-small">
                            <div class="uk-card uk-card-default ps-ofert-prod-item">
                                <div class="uk-card-media-top">
                                    <img src="<?= get_theme_file_uri( '/assets/images/slider-2.jpg') ?>" alt=""
                                         style="width: 100%;">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title ps-cat-name">Media Top</h3>
                                    <p>Lorem </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
