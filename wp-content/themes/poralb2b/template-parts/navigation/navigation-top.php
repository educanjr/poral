<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div class="tm-header-mobile uk-hidden@m">
    <nav class="uk-navbar-container uk-navbar uk-margin" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#" uk-toggle="target: #tm-mobile"></a>
        </div>
        <div class="uk-navbar-center">
            <a class="uk-navbar-item uk-logo" href="#">
                <img src="<?= get_logo_url() ?>" alt="Poral">
            </a>
        </div>
    </nav>
    <div id="tm-mobile" class="tm-header" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="#">Inicio</a></li>
                <li><a href="#">Nosotros</a></li>
                <li class="uk-parent">
                    <a href="#">Productos</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Griferia</a></li>
                        <li><a href="#">Pisos y revestimientos</a></li>
                    </ul>
                </li>
                <li><a href="#">Novedades</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="tm-header uk-visible@m" uk-header>
    <div uk-sticky="media=@m; cls-active=uk-navbar-sticky; sel-target=.uk-navbar-container;"  class="uk-sticky">
        <div class="uk-navbar-container">
            <div class="uk-container">
                <nav class="uk-navbar" uk-navbar style="position: relative; z-index: 980;">
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="#">
                            <img src="<?= get_logo_url() ?>" alt="Poral">
                        </a>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active">
                                <a href="#">Inicio</a>
                            </li>
                            <li>
                                <a href="#">Nosotros</a>
                            </li>
                            <li>
                                <a href="#">Productos</a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li><a href="#">Griferias</a></li>
                                        <li><a href="#">Pisos y revestimientos</a></li>
                                        <li><a href="#">Porcelana sanitaria y piletas</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">Novedades</a>
                            </li>
                            <li>
                                <a href="#">Contacto</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
