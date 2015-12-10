<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');

// Get parameters for sorting
$title = isset($_GET['title']) ? $_GET['title'] : null;
$year1 = isset($_GET['year1']) ? $_GET['year1'] : null;
$year2 = isset($_GET['year2']) ? $_GET['year2'] : null;

if($title) {
    $params = array($title);
    $res = $db->ExecuteSelectQueryAndFetchAll("SELECT * FROM Movie WHERE title LIKE ?;", $params);
}
else if($year1) {
    $params = array($year1, $year2);
    $res = $db->ExecuteSelectQueryAndFetchAll("SELECT * FROM Movie WHERE year >= ? and year <= ?;", $params);
}
else {
    $res = $db->ExecuteSelectQueryAndFetchAll("SELECT * FROM Movie;");
}

$htmlTable = new CHTMLTable();
$output = $htmlTable->drawHTML($res);

$Orange['title'] = "Movie Search";

$Orange['main'] = <<<EOD
<h1>SEARCH TITLE</h1>
<form>
<fieldset>
<legend>Sök</legend>


</form>
<form>
<p><label>Titel: <input type='search' name='title' value='{$title}'/></label></p>
<p>
<label>Skapad mellan åren:
    <input type='text' name='year1' value='{$year1}'/>
    -
    <input type='text' name='year2' value='{$year2}'/>
</label>
</p>

<p><input type='submit' name='submit' value='Sök'/></p>
<p><a href='?'>Visa alla</a></p>
</fieldset>
</form>
<table class='movie'>
<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th></tr>
$output
</table>
EOD;


// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);