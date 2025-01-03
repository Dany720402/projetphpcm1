<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            
            color: #333;
            padding: 15px;
            text-align: center;
            font-style: italic;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #5a9eec;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td a {
            text-decoration: none;
        }

        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #218838;
        }

        .clear-cart {
            background-color: #dc3545;
            color: white;
        }

        .clear-cart:hover {
            background-color: #c82333;
        }

        .text-center {
            text-align: center;
        }

        .action-btns input {
            background-color: #ffc107;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .action-btns input:hover {
            background-color: #e0a800;
        }

        .cart-summary {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        .empty-cart-message {
            text-align: center;
            font-size: 18px;
            color: #333;
            font-style: italic;
        }
        
    </style>
</head>
<body>

<?php
include('menu.php');
session_start();

function creationDuPanier()
{
   if (!isset($_SESSION['panier']))
   {
      $_SESSION['panier'] = array();
      $_SESSION['panier']['nomProduit'] = array();
      $_SESSION['panier']['idProduit'] = array();
      $_SESSION['panier']['quantiteStock'] = array();
      $_SESSION['panier']['prix'] = array();
   }
}

function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix)
{
    creationDuPanier();

    if (isset($_SESSION['panier']['idProduit']) && is_array($_SESSION['panier']['idProduit'])) {
        $position_produit = array_search($id_produit, $_SESSION['panier']['idProduit']);
    } else {
        $position_produit = false;
    }
   /* $position_produit = array_search($id_produit, $_SESSION['panier']['idProduit']); */
    if ($position_produit !== false)
    {
         $_SESSION['panier']['quantiteStock'][$position_produit] += $quantite;
    }
    else 
    {
        $_SESSION['panier']['nomProduit'][] = $titre;
        $_SESSION['panier']['idProduit'][] = $id_produit;
        $_SESSION['panier']['quantiteStock'][] = $quantite;
        $_SESSION['panier']['prix'][] = $prix;
    }
}

function montantTotal()
{
   $total = 0;
   for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) 
   {
      $total += $_SESSION['panier']['quantiteStock'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return round($total, 2);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre= $_POST['nomProduit']; 
    $id_produit = $_POST['idProduit'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];

    ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix);
}


if (isset($_GET['id_produit_supprimer'])) {
    $id_produit_a_supprimer = $_GET['id_produit_supprimer'];
    retirerproduitDuPanier($id_produit_a_supprimer);
}


function retirerproduitDuPanier($id_produit_a_supprimer) {
    $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['idProduit']);
    if ($position_produit !== false) {
        array_splice($_SESSION['panier']['nomProduit'], $position_produit, 1);
        array_splice($_SESSION['panier']['idProduit'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantiteStock'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1);
    }
}


if (isset($_GET['action']) && $_GET['action'] == 'vider') {
    unset($_SESSION['panier']);
}

echo "<header><h1>Votre Panier</h1></header>";

echo "<table>";
echo "<tr><th>Nom</th><th>Quantité</th><th>Prix Unitaire</th><th>Action</th></tr>";
if (empty($_SESSION['panier']['idProduit'])) 
{
    echo "<tr><td colspan='5' class='empty-cart-message'>Votre panier est vide</td></tr>";
}
else
{
    for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++)
    {
        $idprod = $_SESSION['panier']['idProduit'][$i];
        echo "<tr>";
        echo "<td>" . $_SESSION['panier']['nomProduit'][$i] . "</td>";
        echo "<td>" . $_SESSION['panier']['quantiteStock'][$i] . "</td>";
        echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
        echo "<td class='action-btns'>
                <a href='panier.php?id_produit_supprimer=$idprod'>
                <input type='button' value='Supprimer'>
                </a>
              </td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='3' class='cart-summary'>Total: " . montantTotal() . " CAD</td></tr>";
    echo "<tr><td colspan='5' class='text-center'>
              <a href='?action=vider' class='btn clear-cart'>Vider mon panier</a>
              <a href='paiement.php' class='btn'>Payer</a>
          </td></tr>";
}
echo "</table><br />";

?>

</body>
</html>