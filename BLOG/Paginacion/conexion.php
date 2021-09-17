<?php
try {
    $mbd = new PDO('mysql:host=localhost;dbname=bbddblog', 'root', '');

    
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>