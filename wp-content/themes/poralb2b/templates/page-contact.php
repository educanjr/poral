<?php
/*
Template Name: Poral Contacto
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

    <section id="ps_map" class="uk-margin">
        <div class="uk-container">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Avda.%20Honorio%20Pueyrred%C3%B3n%206020%20&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

                    </iframe>
                </div>
                <style>
                    .mapouter{text-align:right;height:500px;width:100%;}
                    .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}
                    .gmap_canvas>iframe{height:500px;width:100%;}
                </style>
            </div>
        </div>
    </section>

    <section id="ps_form_contact" class="uk-margin">
        <div class="uk-container uk-container-xsmall">
            <form>
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Contacte con nosotros</legend>

                    <div class="uk-margin">
                        <label for="ps_form_name">Nombre</label>
                        <input id="ps_form_name" class="uk-input" type="text" placeholder="Nombre">
                    </div>

                    <div class="uk-margin">
                        <label for="ps_form_email">E-Mail</label>
                        <input id="ps_form_email" class="uk-input" type="email" placeholder="e-mail">
                    </div>

                    <div class="uk-margin">
                        <label for="ps_form_phone">Teléfono</label>
                        <input id="ps_form_phone" class="uk-input" type="number" placeholder="teléfono">
                    </div>

                    <div class="uk-margin">
                        <label for="ps_form_msg">Mensaje</label>
                        <textarea id="ps_form_msg" class="uk-textarea" rows="5" placeholder="Mensaje"></textarea>
                    </div>

                    <div class="uk-margin">
                        <input type="submit" class="uk-button uk-button-default" value="Enviar">
                    </div>

                </fieldset>
            </form>
        </div>
    </section>


<?php get_footer();
