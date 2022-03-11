<?php

require_once 'include/database.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $dist = $_POST['distributor'];
}


    $sql = "SELECT title FROM 'movie' WHERE 'title'=$title";

    $requete = $db->query($sql);
