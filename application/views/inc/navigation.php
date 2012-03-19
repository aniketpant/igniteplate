<?php

    require_once('links.php');
    
    $currentpage = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"];
?>
    <ul>
<?php
    for ($i =0; $i < count($links); $i++):
        $page = $links[$i];
        if ($page == $currentpage):
?>
        <li class="active"><a href="<?php echo $links[$i]; ?>"><?php echo $links_text[$i]; ?></a></li>
<?php
        else:
?>
        <li><a href="<?php echo $links[$i]; ?>"><?php echo $links_text[$i]; ?></a></li>
<?php
        endif;
    endfor;
?>
    </ul>