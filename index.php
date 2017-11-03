<?php

if(isset($_GET['url'])){
    $explode = array_filter(explode('/', $_GET['url']));
    $url = $explode[0].'.php';

    if(is_file('pages/'.$url)){
        include_once 'pages/'.$url;
    }else{
        include_once 'pages/404.php';
    }

}else{
    include_once 'pages/home.php';
}

?>