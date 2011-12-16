<?php

    require_once('links.php');
    
    $currentpage = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"];
    
    echo '<ul class="container">';
    for ($i =0; $i < count($links); $i++)
    {
        $page = $links[$i];
        if ($page == $currentpage)
            echo '<li class="active"><a href="'.$links[$i].'">'.$links_text[$i].'</a></li>';
        else
            echo '<li><a href="'.$links[$i].'">'.$links_text[$i].'</a></li>';
    }
?>