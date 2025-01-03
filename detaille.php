<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .product-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .product-image {
            border-radius: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php 
    include 'menu.php'; 
    session_start();
    ?>

    <?php
    if (isset($_GET["id"])) {
        $mysqli = new mysqli("localhost", "root", "", "projecommerce");
        if ($mysqli->connect_error) {
            die('Erreur de connexion : ' . $mysqli->connect_error);
        }

        $idProduit = intval($_GET["id"]);
        $req = "SELECT * FROM produits WHERE idProduit = ?";
        $stmt = $mysqli->prepare($req);
        $stmt->bind_param("i", $idProduit);
        $stmt->execute();
        $resultat = $stmt->get_result();

        if ($resultat->num_rows > 0) {
            $produit = $resultat->fetch_assoc();
    ?>
    <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-lg-8">
    <div class="product-card">
    <div class="row">
                                <div class="col-md-6">
                                    <img src="<?= htmlspecialchars($produit['image']) ?>" 
                                         class="img-fluid product-image" 
                                         alt="<?= htmlspecialchars($produit['nomProduit']) ?>">
                                </div>
                                <div class="col-md-6">
                                    <h2 class="mb-3"><?= htmlspecialchars($produit['nomProduit']) ?></h2>
                                    <p class="text-muted"><strong>Description :</strong> <?= htmlspecialchars($produit['description']) ?></p>
                                    <p><strong>Prix :</strong> <span class="text-success"><?= $produit['prix'] ?> $</span></p>
                                    <p><strong>Catégorie :</strong> <?= $produit['categorie'] ?></p>
                                    
                                    <?php if ($produit['quantiteStock'] > 0): ?>
                                        <p><strong>Stock disponible :</strong> <?= $produit['quantiteStock'] ?></p>
                                        <form method="post" action="panier.php">
                                            <input type="hidden" name="idProduit" value="<?= $produit['idProduit'] ?>">
                                            <input type="hidden" name="prix" value="<?= $produit['prix'] ?>">
                                            <input type="hidden" name="nomProduit" value="<?= htmlspecialchars($produit['nomProduit']) ?>"> <!-- Champ caché pour le nom -->
                                            <label for="quantite" class="form-label">Quantité :</label>
                                            <select id="quantite" name="quantite" class="form-select mb-3 w-auto">
                                                <?php for ($i = 1; $i <= min($produit['quantiteStock'], 5); $i++): ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <button type="submit" class="btn btn-custom">Ajouter au panier</button>
                                        </form>
                                    <?php else: ?>
                                        <p class="text-danger"><strong>Rupture de stock</strong></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            echo "<div class='container mt-5'><p class='text-danger'>Produit introuvable.</p></div>";
        }

        $stmt->close();
        $mysqli->close();
    } else {
        echo "<div class='container mt-5'><p class='text-danger'>ID de produit non spécifié.</p></div>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>