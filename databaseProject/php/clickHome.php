<?php
    if(isset($_COOKIE['user_ID'])&&isset($_COOKIE['kind'])){
        echo ("<meta http-equiv='refresh' content='0; url=../taskChoice.php'>");
    }
    else
        echo ("<meta http-equiv='refresh' content='0; url=logout.php'>");
?>