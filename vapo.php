<?php
$bdd = new mysqli('localhost', 'root', '', 'ginzvape');

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['reference']) && !empty($_POST['description']) && !empty($_POST['nom_article']) && !empty($_POST['prix_achat']) && !empty($_POST['prix_vente']) && !empty($_POST['quantite_stock']) && !empty($_POST['type'])) {
        $reference = htmlspecialchars($_POST['reference']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $nom_article = ($_POST['nom_article']);
        $prix_achat = ($_POST['prix_achat']);
        $prix_vente = ($_POST['prix_vente']);
        $quantite_stock = ($_POST['quantite_stock']);
        $type = ($_POST['type']);

        $insererArticle = "insert into `gztableau`(reference, nom_article, descript, prix_achat, prix_vente, quantite_stock, type)
        Values ('$reference', '$nom_article', '$description', '$prix_achat', '$prix_vente', '$quantite_stock', '$type')";
        $result = mysqli_query($bdd, $insererArticle);

        echo "L'article a bien été envoyé";
    } else {
        echo "Veuillez compléter tous les champs...";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulaire</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">

</head>


<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="img/vapshop.webp" width="120px" height="100px">
            <a class="navbar-re" href="affiche.php">Retour vers l'accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

            </div>
        </nav>
        <br>
    </header>

    <div class="container">
        <form method="POST" action="">
            <div class="mb-3">
                <input type="radio" id="yo" name="type" value="Vapoteuse">
                <label for="yo">Vapoteuse</label>

                <input type="radio" id="ya" name="type" value="E-liquide">
                <label for="ya">E-liquide</label>
                <br><br>


                <label>Référence du produit</label>
                <input type="text" class="form-control" name="reference" placeholder="Entrez une référence">

            </div>
            <div class="mb-3">
                <label>Nom du produit</label>
                <input type="text" class="form-control" name="nom_article" placeholder="Entrez le nom du produit">
            </div>
            <div class="mb-3">
                <label>Description du produit</label>
                <input type="text" class="form-control" name="description" placeholder="Entrez la description du produit">
            </div>
            <div class="mb-3">
                <label>Prix d'achat</label>
                <input type="text" class="form-control" name="prix_achat" placeholder="Entrez le prix d'achat">
            </div>
            <div class="mb-3">
                <label>Prix de vente</label>
                <input type="text" class="form-control" name="prix_vente" placeholder="Entrez le prix de vente">
            </div>
            <div class="mb-3">
                <label>Quantité en stock</label>
                <input type="text" class="form-control" name="quantite_stock" placeholder="Entrez la quantité en stock">
            </div>




            <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
        </form>
    </div>
    </div>


    <!-- <form method="POST" action="">
        <input type="text" name="reference">
        <br>
        <input type="text" name="nom_article">
        <br>
        <textarea type="text" name="description"></textarea>
        <br>
        <input type="text" name="prix_achat">
        <br>
        <input type="text" name="prix_vente">
        <br>
        <input type="text" name="quantite_stock">
        <br>
        <input type="text" name="type de produit">
        <br>
        <input type="submit" name="envoyer">
    </form>
</body> -->

</html>