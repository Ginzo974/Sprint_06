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


if (!empty($_GET['modifid'])) {
    $id = $_GET['modifid'];
    $recupdonnee = "SELECT*FROM `gztableau` where id=$id";
    $resultat = mysqli_query($bdd, $recupdonnee);
    $donnee = mysqli_fetch_assoc($resultat);
    $reference = $donnee['reference'];
    $nom_article = $donnee['nom_article'];
    $description = $donnee['descript'];
    $prix_achat = $donnee['prix_achat'];
    $prix_vente = $donnee['prix_vente'];
    $quantite_stock = $donnee['quantite_stock'];




    if (isset($_POST['submit'])) {
        if (
            !empty($_POST['reference']) && !empty($_POST['descript']) && !empty($_POST['nom_article']) &&
            !empty($_POST['prix_achat']) && !empty($_POST['prix_vente']) && !empty($_POST['quantite_stock'])

        ) {
            $reference = htmlspecialchars($_POST['reference']);
            $nom_article = ($_POST['nom_article']);
            $description = nl2br(htmlspecialchars($_POST['descript']));
            $prix_achat = ($_POST['prix_achat']);
            $prix_vente = ($_POST['prix_vente']);
            $quantite_stock = ($_POST['quantite_stock']);




            $insererArticle = "UPDATE gztableau set reference='$reference',nom_article='$nom_article',descript='$description',prix_achat='$prix_achat',prix_vente='$prix_vente',quantite_stock='$quantite_stock' where id=$id;";
            $result = mysqli_query($bdd, $insererArticle);
            if ($result) {
                header('location:affiche.php');
            } else {
                die(mysqli_error($bdd));
            }
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Sprint_06</title>
    </head>

    <body>
        <div class="container my-5">

            <form method="POST" action="">

                <div class="mb-3">
                    <label class="form-label">Référence</label>
                    <input type="text" class="form-control" placeholder="Entrer la réference de l'article" name="reference" autocomplete="off" value="<?php echo $reference; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nom de l'article</label>
                    <input type="text" class="form-control" placeholder="Entrer le nom de l'article" name="nom_article" autocomplete="off" value="<?php echo $nom_article; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description de l'article</label>
                    <input type="text" class="form-control" placeholder="Entrer la description de l'article" name="descript" autocomplete="off" value="<?php echo $description; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prix d'achat</label>
                    <input type="float" class="form-control" placeholder="Entrer le prix d'achat de l'article" name="prix_achat" autocomplete="off" value="<?php echo $prix_achat; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prix de vente</label>
                    <input type="float" class="form-control" placeholder="Entrer le prix de vente de l'article" name="prix_vente" autocomplete="off" value="<?php echo $prix_vente; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantité</label>
                    <input type="number" class="form-control" placeholder="Entrer la quantité" name="quantite_stock" autocomplete="off" value="<?php echo $quantite_stock; ?>">
                </div>

                <button type="submit" class="btn btn-primary" name="submit" value="hh">Modifier</button>

            </form>

        </div>

    </body>

    </html>

<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Sprint_06</title>
    </head>

    <body>
        <div class="container my-5">

            <h1>J'ai des problèmes</h1>

        </div>

    </body>

    </html>
<?php
}
?>