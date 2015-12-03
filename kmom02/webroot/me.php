<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');



$Orange['title'] = "Startsida";

$Orange['main'] = "
<h1>Om mig</h1>
<p>Jag heter Hannes Alm och är 38 hela år gammal. Jag är född i skåne, flyttat till Dalarna, flyttat till Stockholm
         och slutligen landat i Blekinge och Karlskrona.<br><br>Jag jobbar samtidigt som jag studerar 10% på Skatteverket där
         jag jobbat i ett år. Innan dess jobbade jag på Telenor i nästan 8 år<br><br>Jag har funderat på att studera i flera år
         men har tyvär inte haft möjligheten efter att jag blev pappa för snart 6 år sen. Men nu öppnade sig möjligheten och då
         kunde jag inte låta bli.<br><br>På min fritid har jag massor att göra, med två barn (samt 2 bonusbarn), hus så har jag inte
         brist på saker att göra. Har även barnasinnet kvar så spelar en del dataspel med.</p>
";

// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);