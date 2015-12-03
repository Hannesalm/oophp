<?php
/**
 * Config-file for Orange. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Orange paths.
 *
 */
define('Orange_INSTALL_PATH', __DIR__ . '/..');
define('Orange_THEME_PATH', Orange_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(Orange_INSTALL_PATH . '/src/bootstrap.php');
include "./../src/cNavigation.php";


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Orange variable.
 *
 */
$Orange = array();
$Orange['lang']         = 'sv';
$Orange['title_append'] = ' | Orange min webbtemplate';

$menu = array(
    'startsida'  => array('text'=>'Startsida',  'url'=>'me.php'),
    'redovisning'  => array('text'=>'Redovisning',  'url'=>'redovisning.php'),
    'kallkod' => array('text'=>'Källkod', 'url'=>'scource.php'),
);
$Orange['header'] = <<<EOD
<img class='sitelogo' src='./../img/orangeLogo.png' alt='Orange Logo'/>
<span class='sitetitle'>Orange webbtemplate</span>
<span class='siteslogan'>Återanvändbar modul för webbutveckling med PHP</span>
EOD;

$Orange['footer'] = <<<EOD
<span class='sitefooter'>Copyright (c) Hannes Alm (hannes@almar.se)</span>
EOD;

$Orange['navbar'] = cNavigation::GenerateMenu($menu);

/**
 * Theme related settings.
 *
 */
//$Orange['stylesheet'] = 'css/style.css';
$Orange['stylesheets'] = array('css/style.css');
$Orange['favicon']    = './../img/orangeFavicon.png';