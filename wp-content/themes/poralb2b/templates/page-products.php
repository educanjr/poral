<?php
/*
Template Name: Poral Productos
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
<section id="ps_breadcrumb" class="uk-margin-medium-bottom">
    <div class="uk-container uk-padding-small">
        <ul class="uk-breadcrumb">
            <li><a href="">Home</a></li>
            <li><span>Productos</span></li>
        </ul>
    </div>
</section>

    <section id="ps_products" class="uk-margin">
        <div class="uk-container">
            <div uk-grid>
                <div class="uk-width-1-5@m">
                    Filter section not defined (in construction)
                </div>
                <div class="uk-width-4-5@m">
                    <div class="ps-prod-cat-img">

                    </div>
                    <div class="ps-prod-top-filter uk-text-right uk-margin-small">
                        <label>Mostrar</label>
                        <select class="uk-select uk-form-width-xsmall">
                            <option>8</option>
                            <option>12</option>
                            <option>20</option>
                            <option>32</option>
                        </select>
                    </div>
                    <div>
                        <div class="uk-margin uk-text-center uk-grid-collapse uk-child-width-1-2@s uk-child-width-1-4@m"
                             uk-grid uk-height-match="target: .uk-card-media-top>img">
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod01.gif') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod02.jpg') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod03.jpg') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod04.jpg') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod02.jpg') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod04.jpg') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod01.gif') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-hover">
                                    <div class="uk-card-media-top">
                                        <img src="<?= get_theme_file_uri( '/assets/images/prod03.jpg') ?>" alt=""
                                             style="width: 100%;">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Media Top</h3>
                                        <p>Lorem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-prod-filter-bottom">
                        <div class="uk-align-left">
                            <label>Mostrar</label>
                            <select class="uk-select uk-form-width-xsmall">
                                <option>8</option>
                                <option>12</option>
                                <option>20</option>
                                <option>32</option>
                            </select>
                        </div>
                        <div class="uk-align-right uk-margin-small-top">
                            <ul class="uk-pagination uk-flex-right">
                                <li><a href="#"><span uk-pagination-previous></span></a></li>
                                <li class="uk-active"><span>1</span></li>
                                <li class="uk-disabled"><span>...</span></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#"><span uk-pagination-next></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer();
