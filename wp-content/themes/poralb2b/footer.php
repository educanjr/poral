<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<section id="ps_footer_contact" class="uk-section uk-section-primary tm-footer">
    <div class="uk-container">
        <div class="uk-grid-large uk-child-width-1-1@s uk-child-width-1-2@m" uk-grid>
            <div>
                <div class="uk-flex uk-margin">
                    <i class="fa fa-location-arrow uk-align-left uk-margin-auto-vertical"></i>
                    <div class="uk-align-left uk-margin-remove">
                        <h5>Dirección</h5>
                        <p>Avda. Honorio Pueyrredón 6020 (Ruta 25), Villa Rosa, Bs.As.</p>
                    </div>
                </div>
                <div class="uk-flex uk-margin">
                    <i class="fa fa-phone uk-align-left uk-margin-auto-vertical"></i>
                    <div class="uk-align-left uk-margin-remove">
                        <h5>Teléfono</h5>
                        <p>+54 230 449-4143</p>
                    </div>
                </div>
                <div class="uk-flex uk-margin">
                    <i class="fa fa-envelope uk-align-left uk-margin-auto-vertical"></i>
                    <div class="uk-align-left uk-margin-remove">
                        <h5>E-Mail</h5>
                        <p>info@correo.com</p>
                    </div>
                </div>
                <div class="uk-flex uk-margin">
                    <i class="fa fa-clock uk-align-left uk-margin-auto-vertical"></i>
                    <div class="uk-align-left uk-margin-remove">
                        <h5>Horario</h5>
                        <p>Lunes a Viernes / 9 hs a 18 hs</p>
                    </div>
                </div>
            </div>
            <div>
                <h5 style="margin: 0 0 20px 0;">SUSCRIBASE A NUESTRO NEWSLETTER</h5>
                <p style="margin: 0 0 10px 0;">Envíenos su correo electrónico para que reciba nuestras ultimas novedades en productos y promociones.</p>
                <form style="border-bottom: 1px solid #707070;">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="ps_footer_subscribe">E-Mail</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="ps_footer_subscribe" type="email" placeholder="e-mail">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <input type="submit" class="uk-button uk-button-default" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
