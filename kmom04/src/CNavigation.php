<?php


class CNavigation
{
    public static function GenerateMenu($items) {
        $html = "<nav>\n";
        foreach($items as $key => $item) {
            $selected = (isset($_GET['url'])) && $_GET['url'] == $key ? 'selected' : null;
            $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
        return $html;
    }
};

