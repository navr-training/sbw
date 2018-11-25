<?php

function btn_edit($uri) {
    return anchor($uri, '<span class="fa fa-edit"></span>');
}
function btn_delete($uri) {
    return anchor($uri, '<span class="fa fa-remove"></span>', array(
        'onclick' => "return confirm('Are you sure you want to delete the user?');"
        ));
}

function get_excerpt($article, $numwords = 50) {
    $string = '';
    $url = 'article/' . intval($article->id) . '/' . e($article->slug);
    $string .= '<h2>' . anchor($url, e($article->title)) . '</h2>';
    return $string;
}

function e($string) {
    return htmlentities($string);
}

function get_menu($array, $child = FALSE) {
    $CI =& get_instance();
    $str = '';
    
    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">' . PHP_EOL : '<ul class="dropdown-menu" role="menu">' . PHP_EOL;
        
        foreach ($array as $item) {
            
            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="' . base_url(e($item['slug'])) . '">' . e($item['title']);
                $str .= '<span class="caret"></span></a> ' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else{
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a href="' . base_url($item['slug']) . '">' . e($item['title']) . '</a>';
            }
            
            $str .= '</li>' . PHP_EOL;
        }
        
        $str .= '</ul>' . PHP_EOL;
    }
    return $str;
}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}