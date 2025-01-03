<?php
session_start();
$host = 'localhost';
$dbname = 'projecommerce';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de produit manquant.");
}

$idproduit = (int)$_GET['id'];

function getProduit($pdo, $idproduit) {
    $stmt = $pdo->prepare("SELECT * FROM produits WHERE idProduit = :idProduit");
    $stmt->bindParam(':idProduit', $idproduit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


$produit = getProduit($pdo, $idproduit);

$message = '';

if (!$produit) {
    die("Produit non trouvée.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = (float)$_POST['prix'];
    $quantitestock = $_POST['quantiteStock'];
    $categorie = $_POST['categorie'];
    $image = $_POST['image'];

    

    $stmt = $pdo->prepare("UPDATE produits SET nomProduit = :nom, description =  :description, prix = :prix, quantiteStock = :quantiteStock, categorie = :categorie, image = :image WHERE idProduit = :idproduit");
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
    $stmt->bindParam(':quantiteStock', $quantitestock, PDO::PARAM_STR);
    $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':idproduit', $idproduit, PDO::PARAM_INT);

    if ($stmt->execute()) {
        
        $message = "Le produit a été mise à jour avec succès.";
        $produit = getProduit($pdo, $idproduit);
    } else {
        $message = "Erreur lors de la mise à jour de la recette.";
        
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('./photobackground3.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        
        .center-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .form-container {
            width: 50%;
            max-width: 600px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-family: 'Dancing Script', cursive;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php include("menu.php"); ?>

<div class="center-container">
    <div class="form-container">
        <h1>Modifier le produit</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="nom">Nom du produit</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($produit['nomProduit']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo htmlspecialchars($produit['description']); ?>" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" value="<?php echo htmlspecialchars($produit['prix']); ?>" required>
            </div>
            <div class="form-group">
                <label for="quantiteStock">Quantité stock</label>
                <input type="number" class="form-control" id="quantiteStock" name="quantiteStock" value="<?php echo htmlspecialchars($produit['quantiteStock']); ?>" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <input type="number" class="form-control" id="categorie" name="categorie" value="<?php echo htmlspecialchars($produit['categorie']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($produit['image']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            
        </form>

        <?php if ($message): ?>
        <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
        <br/>
            <div class="return-button">
                <a href="listeproduits.php" class="btn btn-secondary">Retour à l'espace liste des produits</a>
            </div>
    </div>
</div>

</body>
</html>
