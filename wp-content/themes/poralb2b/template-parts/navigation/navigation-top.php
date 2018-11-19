<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage PoralB2B
 * @since 1.0
 * @version 1.2
 */

$menu_items = wp_get_nav_menu_items('MainMenu');
?>
<div class="tm-header-mobile uk-hidden@m">
    <nav class="uk-navbar-container uk-navbar uk-margin" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#" uk-toggle="target: #tm-mobile"></a>
        </div>
        <div class="uk-navbar-center">
            <a class="uk-navbar-item uk-logo" href="<?= get_site_url() ?>">
                <img src="<?= get_logo_url() ?>" alt="Poral">
            </a>
        </div>
    </nav>
    <div id="tm-mobile" class="tm-header" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default">
                <?php foreach ($menu_items as $menu_item) :
                    $menu_title = $menu_item->title;
                    $menu_url = $menu_item->url; ?>
                    <li class="uk-active"><a href="<?= $menu_url ?>"><?= $menu_title ?></a></li>
                <?php endforeach; ?>
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
                        <a class="uk-navbar-item uk-logo" href="<?= get_site_url() ?>">
                            <img src="<?= get_logo_url() ?>" alt="Poral">
                        </a>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <?php foreach ($menu_items as $menu_item) :
                                $menu_title = $menu_item->title;
                                $menu_url = $menu_item->url; ?>
                                <li class="uk-active"><a href="<?= $menu_url ?>"><?= $menu_title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
