<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Startsida";

$Orange['main'] = <<<EOD
<h1>Redovisning</h1>
<h2>Kmom01</h2>
<h3>Vilken utvecklingsmiljö använder du?</h3>
<p>Jag har installerat den utevklingsmiljö som va rekommenderad i den förra kursen. Jag har dock bytt ut bla Atom mot phpstorm, vilket jag tycker funkar kanon
   Jag har även en raspberry PI som jag använde som webserver vilket gör min lösning oberoende vilken dator jag sitter på. Jag har även börjat anvada Git</p>
<h3>Berätta hur det gick att jobba igenom guiden “20 steg för att komma igång PHP”, var något nytt eller kan du det?</h3>
<p>Jag gjorde inte mycket i den. Kände att jag ville komma igång med kmom01 momentet direkt. Jag är mer learning by doing, och då vill jag göra
   kursmomentet direkt.</p>
<h3>Vad döpte du din webbmall Anax till?</h3>
<p>jag döpte min webmal till Orange. Mest för att jag gillar Apelsiner</p>
<h3>Vad anser du om strukturen i Anax, gjorde du några egna förbättringar eller något du hoppade över?</h3>
<p>Jag gillar strukturen. Men det är väldigt nytt så gjorde inga förändringar utan körde på samma. Vill lära mig denna innan jag ger mig på förändringar känner jag</p>
<h3>Gick det bra att inkludera source.php? Gjorde du det som en modul i ditt Anax?</h3>
<p>Jag gjorde det som en modul. Tyckte det gick bra och va inga större problem att implementera.</p>
<h3>Gjorde du extrauppgiften med GitHub?</h3>
<p>Jag har inte lagt upp det på Git än. Håller fortfarande på att lära mig det men har för avsikt att göra det inom en snart framtid!</p>
<h2>Kmom02</h2>
<h3>Hur väl känner du till objektorienterade koncept och programmeringssätt?</h3>
<p>Jag är helt ny till objektorienterad programmering när det kommer till PHP. Jag en del kunskap med mig från c++ kursen men känner att dom ändå är ganska olika på flera sätt. Har haft ganska svårt att få till det i huvudet och förstå hur allt ska va uppbyggt. En tröskel som är högre denna gång än i förra kursen.</p>
<h3>Jobbade du igenom oophp20-guiden eller skumläste du den?</h3>
<p>Jag skummade igenom den enbart. Jag har svårt att sätta mig och läsa teoretiskt och sen göra praktiskt. jag är mer en DOER och vill skriva kod direkt för att lära mig. Tittar hellre på tutorialfilmer än att sitta och läsa teoretiskt.</p>
<h3>Berätta om hur du löste uppgiften med Månadens Babe, hur tänkte du och hur gjorde du, hur organiserade du din kod?</h3>
<p>Jag hade extremt svårt att kokmma igång med detta projekt. Försökte göra det enkelt från början genom att jag försökte få fram dagar i en månad först. Sen försökte jag få fram vilken veckodag som va först i just den månaden som va vald. På det viset visste jag hur många dagar som skulle va "tomma" för den månaden. Vidare gjorde jag en loop som loopade igenom veckorna och satte allt i tabell. Efter det satte jag att den skulle känna igen om det va en söndag eller inte. Med probelemn jag hade så va dessa funktioner det enda jag han med. Hade velat göra mer men tiden räckte inte till.</p>
EOD;

// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);