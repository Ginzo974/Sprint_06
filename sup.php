<?php
$bdd = new mysqli('localhost', 'root', '', 'ginzvape');
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];


    $insererArticle = "delete from `gztableau` where id=$id";
    $resultat = mysqli_query($bdd, $insererArticle);
    if ($resultat) {
        header('location:affiche.php');
    } else {
        die(mysqli_error($bdd));
    }
}
