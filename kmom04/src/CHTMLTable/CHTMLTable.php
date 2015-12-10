<?php

class CHTMLTable {

    public function drawHTML($res){
        $td = null;
        foreach($res AS $key => $val) {
            $td .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}' /></td><td>{$val->title}</td><td>{$val->YEAR}</td></tr>";
        }
return $td;
    }
}