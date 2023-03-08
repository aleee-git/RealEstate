<?php 
function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'Blueberry8!', 'realestate_db');

    // if ($db) {
    //     echo 'DB conected :)';
    // } else {
    //     echo 'something is wrong :(';
    // }

    if (!$db){
        echo 'something is wrong :(';
        exit;
    }

    return $db;
}

?>
