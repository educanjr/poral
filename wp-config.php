<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'poralb2b');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '<Nd.2AK![B20JuFFaC_vrjFd,1 y9S(&T}T`#>j&0qMj57n>Yba<j00{*H2KrK.{');
define('SECURE_AUTH_KEY', 'dz*sF?-W _}Uo#WWFGvL`Y_zQ_o Sq_p2nfPeD6*lbB j(z#<laiTMK6(:CAiPW(');
define('LOGGED_IN_KEY', 'fYx`>gBG[S[H}_w~MJKI8H:!a-W#S>^$FpB=bI$?Xm|3<V.d$wmHEZ)iHzu%o&4o');
define('NONCE_KEY', '~juM.w&Eh..j__9C3CZ@tf,Xto1X&.Uo&4iuHNGkNJ #-m9}oV==@fTL$kj~E,.B');
define('AUTH_SALT', 'a%zr1iXn+ua!NiC$-.Re`Ah7I2.i!9V6,`Kg{}o6,Z[?]QCYFge<B[e,w~Frfhi8');
define('SECURE_AUTH_SALT', ' z$sY+qi!Uga/;%#*yJ[*OhbqSM.7}hEpTIm5r`kvyt[GPcJ-&dVWmkHjT2v/{cV');
define('LOGGED_IN_SALT', 'P@[j-k[}?{4?>pVoW-S|{7`$qDDt3acqsa2vLvvU)X0a,iAa+#=.ZnHJti=bdz a');
define('NONCE_SALT', 'rPzL`Lr:sQ}%h,4A%)dQWr@$7oe|>Z6 O#Z:`l8<%<H}ZV#u8H)Y33E,0&C@/vMP');
define('automatic_updater_disabled', true );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'ps_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

