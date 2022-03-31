<?php
try {
    // dev configuration
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0) {
        $bdd = new mysqli(
            'localhost',
            'root',
            '',
            'ginzvape'
        );
    }
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0) {
        $bdd = new mysqli('109.234.164.161', $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD'], 'sc1lgvu9627_louis-quentin.sprint-06');
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];


    $insererArticle = "delete from `gztableau` where id=$id";
    $resultat = mysqli_query($bdd, $insererArticle);
    if ($resultat) {
        header('location:index.php');
    } else {
        die(mysqli_error($bdd));
    }
}
