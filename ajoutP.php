<?php 
session_start();
include("menu.php");

function ajouterProduit($nom, $description, $prix, $quantitestock, $categorie, $photo) {
    try {
        $connect = mysqli_connect('localhost', 'root', '', 'projecommerce');
        if (!$connect) {
            die("La connexion a échoué: " . mysqli_connect_error());
        }

        $req = "INSERT INTO produits (nomProduit, description, prix, quantitestock, categorie, image)
                VALUES ('$nom', '$description', '$prix', '$quantitestock', '$categorie', '$photo')";

        if (mysqli_query($connect, $req)) {
            header("Location: admin.php"); 
            exit();
        } else {
            echo "Erreur: " . $req . "<br>" . mysqli_error($connect);
        }

        mysqli_close($connect);
    } catch (Exception $e) {
        echo "Il y a une erreur dans le code d'ajout: " . $e->getMessage();
    }
}

if (isset($_POST["nom"], $_POST["description"], $_POST["prix"], $_POST["quantitestock"], $_POST["categorie"], $_POST["photo"])) {
    
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $quantitestock = $_POST["quantitestock"];
    $categorie = $_POST["categorie"];
    $photo = $_POST["photo"];
   

    ajouterProduit($nom, $description, $prix, $quantitestock, $categorie, $photo);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('./photoAdmin.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-bottom: 40px;
        }

        .form-box {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .form-box h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            
            transition: background-color 0.3s;
            font-weight: bold;
        }

      
    </style>
</head>
<body>

    <div class="login-container">
        <div class="form-box">
            <h2>Ajouter un Produit</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nom">Nom du produit</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" id="prix" name="prix" required>
                </div>
                <div class="form-group">
                    <label for="quantitestock">Quantité en stock</label>
                    <input type="number" class="form-control" id="quantitestock" name="quantitestock" required>
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <input type="number" class="form-control" id="categorie" name="categorie" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo (URL)</label>
                    <input type="text" class="form-control" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ajouter le produit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
