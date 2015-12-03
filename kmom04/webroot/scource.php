<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Visa källkod";

$Orange['stylesheets'][] = 'css/source.css';

$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));

$Orange['main'] = "<h1>Visa källkod</h1>\n" . $source->View();




// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);