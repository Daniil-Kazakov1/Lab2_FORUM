<?php

    $connect = mysqli_connect('localhost', 'root', '', 'my_forum');

    if (!$connect) {
        die('Error connect to DataBase');
    }
