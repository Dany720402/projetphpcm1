<?php

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


$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$sql = "SELECT idProduit, nomProduit, description, prix, quantitestock, categorie, image FROM produits LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);


$totalProduits = $pdo->query("SELECT COUNT(*) FROM produits")->fetchColumn();
$totalPages = ceil($totalProduits / $limit);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
        h1 {
            margin-top: 5%;
         font-family: 'Dancing Script', cursive;
        }

        table {
            width: 80%; 
            margin: 20px auto; 
            border-collapse: collapse; 
            background-color: rgba(255, 255, 255, 0.8); 
        }

        th, td {
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }

        th {
            background-color:#007bff;
            color: white; 
        }


        img {
            max-width: 100px; 
            height: auto;
        }
    
        .pagination {
  display: flex;
  justify-content: center; 
  margin-top: 20px;
}

.pagination a {
  margin: 0 5px;
  padding: 8px 16px;
  text-decoration: none;
  color: #333;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.pagination a.active {
  background-color: #4CAF50; 
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
  background-color: #ddd; 
}

  
   </style>
</head>
<body>

<?php include("menu.php"); ?>

<h1 style="text-align: center;">Liste des Produits</h1>

<table>
    <thead>
        <tr>
            <th>Numéro de produit</th>
            <th>Nom du produit</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Quantité en stock</th>
            <th>Catégorie</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?php echo htmlspecialchars($produit['idProduit']); ?></td>
            <td><?php echo htmlspecialchars($produit['nomProduit']); ?></td>
            <td><?php echo htmlspecialchars($produit['description']); ?></td>
            <td><?php echo htmlspecialchars($produit['prix']); ?></td>
            <td><?php echo htmlspecialchars($produit['quantitestock']); ?></td>
            <td><?php echo htmlspecialchars($produit['categorie']); ?></td>
            <td>
               
                <?php if (!empty($produit['image'])): ?>
                    <a href="modifierProduit.php?id=<?= $produit['idProduit'] ?>">
                    <img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="Photo de <?php echo htmlspecialchars($produit['nomProduit']); ?>">
                    </a>
                    <?php else: ?>
                    Pas de photo
                <?php endif; ?>
               
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Pagination -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">Précédent</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>>
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Suivant</a>
    <?php endif; ?>
</div>

</body>
</html>