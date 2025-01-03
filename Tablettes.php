<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - SmartDevices</title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

 
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            height: 450px; 
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-bottom: 1px solid #ddd;
            height: 250px; 
            object-fit: cover;
            object-position: center;
        }

        .card-title {
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .card-text {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }

        .container {
            padding-top: 20px;
            padding-bottom: 40px;
        }
        .welcome-text {
            font-style: italic; 
        }
    </style>
</head>
<body>


    <?php include 'menu.php'; ?>

    
    <?php
    $mysqli = new mysqli("localhost", "root", "", "projecommerce");
    if ($mysqli->connect_error) {
        die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
    }

    $req = "SELECT idProduit, nomProduit, image, prix FROM produits where categorie=2";
    $resultat = $mysqli->query($req) or die("Erreur SQL : " . $mysqli->error);
    ?>

    <div class="container mt-5">
    <h1 class="text-center mb-4 welcome-text">Bienvenue dans notre Boutique</h1>
        <div class="row g-4">
            <?php while ($produit = $resultat->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card h-100 text-center shadow-sm">
                    <a href="detaille.php?id=<?= $produit['idProduit'] ?>">
                        <img src="<?= htmlspecialchars($produit['image']) ?>" class="card-img-top"
                         alt="<?= htmlspecialchars($produit['nomProduit']) ?>">
                  </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($produit['nomProduit']) ?></h5>
                            <p class="card-text"><?= $produit['prix'] ?> $</p>
                          
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>





   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
