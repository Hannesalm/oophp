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
include "./../src/CNavigation.php";


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
    'calender' => array('text'=>'Kalender', 'url'=>'calender.php')
);

$Orange['navbar'] = cNavigation::GenerateMenu($menu);

$Orange['header'] = <<<EOD
<img class='sitelogo' src='./../img/orangeLogo.png' alt='Orange Logo'/>
<span class='sitetitle'>Orange webbtemplate</span>
<span class='siteslogan'>Återanvändbar modul för webbutveckling med PHP</span>
EOD;

$Orange['footer'] = <<<EOD
<footer>
    <span class='sitefooter'>Copyright (c) Hannes Alm (hannes@almar.se) | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span>
    <div class='icons'>
    <a href='http://validator.w3.org/check/referer'><img title='HTML5' src='./../img/html5Flat.png' alt='HTML5'/></a>
    <a href='http://jigsaw.w3.org/css-validator/check/referer'><img title='CSS3'src='./../img/cssFlat.png' alt='CSS'/></a>
    <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&ucn_task=conformance'><img title='UNICORN' src='./../img/w3Flat.png' alt='UNICORN'/></a>
    <a href='#'><img title='Facebookpage' src='./../img/facebookFlat.png' alt='FACEBOOK'/></a>
    <a href='#'><img title='GITHUB' src='./../img/gitFlat.png' alt='GITHUB'/></a>
<div>
</footer>
EOD;

/**
 * Theme related settings.
 *
 */
//$Orange['stylesheet'] = 'css/style.css';
$Orange['stylesheets'] = array('css/style.css');
$Orange['favicon']    = './../img/orangeFavicon.png';