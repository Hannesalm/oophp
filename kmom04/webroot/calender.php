<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');

// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Kalender";
$Orange['stylesheets'][] = 'css/calender.css';

//Create calender and set values
$calender = new CCalendar();
$calender->getValues();
$calender->generateCalenderData();

$Orange['main'] = "<h1>Kalender</h1>\n" . $calender->printCalendar();

// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);