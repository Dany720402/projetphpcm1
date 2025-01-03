<?php 
session_start();
include("menu.php");

function supprimerProduit($id) {
    try {
        $connect = mysqli_connect('localhost', 'root', '', 'projecommerce');
        if (!$connect) {
            die("La connexion a échoué: " . mysqli_connect_error());
        }

        $req = "DELETE FROM produits WHERE idProduit  = '$id'";

        if (mysqli_query($connect, $req)) {
            echo "<div class='alert alert-success'>Produit supprimé avec succès.</div>";
            header("Location: admin.php"); 

        } else {
            echo "<div class='alert alert-danger'>Erreur: " . mysqli_error($connect) . "</div>";
        }

        mysqli_close($connect);
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erreur: " . $e->getMessage() . "</div>";
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    supprimerProduit($id);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #555;
        }

        .btn {
            background-color:#007bff;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
         
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="form-container">
            <h2>Supprimer Produit</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="id">ID du Produit</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="Entrez l'ID du Produit" required>
                </div>
                <button type="submit" class="btn btn-custom btn-block">Supprimer</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
