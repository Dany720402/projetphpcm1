<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <style>
      
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-container button:hover {
            background-color: #218838;
        }

        .invoice-container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .invoice-container table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .invoice-container th, .invoice-container td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .invoice-container th {
            background-color: #5a9eec;
            color: #fff;
        }

        .invoice-container .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
        .print-btn {
            background-color: #17a2b8;
            color: #fff;
        }

        .print-btn:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $paypal = $_POST['paypal'];
    $paiement_validé = true;
} else {
    $paiement_validé = false;
}

function montantTotal()
{
   $total = 0;
   for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
      $total += $_SESSION['panier']['quantiteStock'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return round($total, 2);
}

?>

<?php if (!$paiement_validé): ?>
  
    <div class="form-container">
        <h2>Informations de Paiement</h2>
        <form method="POST">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="prenom" placeholder="Prénom" required>
            <input type="text" name="adresse" placeholder="Adresse" required>
            <input type="text" name="paypal" placeholder="Numero de la Carte " required>
            <button type="submit">Confirmer le paiement</button>
        </form>
    </div>
<?php else: ?>
  
    <div class="invoice-container">
        <h2>Facture</h2>
        <table>
            <tr>
                <th>Nom Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
            <?php
            $total = 0;
            for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
                $totalProduit = $_SESSION['panier']['quantiteStock'][$i] * $_SESSION['panier']['prix'][$i];
                $total += $totalProduit;
               
                echo "<tr>";
                echo "<td>" . $_SESSION['panier']['nomProduit'][$i] . "</td>";
                echo "<td>" . $_SESSION['panier']['quantiteStock'][$i] . "</td>";
                echo "<td>" . $_SESSION['panier']['prix'][$i] . " CAD</td>";
                echo "<td>" . $totalProduit . " CAD</td>";
                echo "</tr>";
            }
            ?>
            <?php
             $taxe = 0;
             $GrandTotal = 0;
             $taxe = $total * 15/100; 
             $GrandTotal = $total + $taxe;
            ?>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td class="total"><?php echo montantTotal(); ?> CAD</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Taxe</td>
                <td class="total"><?php echo round($taxe, 2); ?> CAD</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Grand Total</td>
                <td class="total"><?php echo round($GrandTotal, 2); ?> CAD</td>
            </tr>
        </table>
        <h3>Informations Client :</h3>
        <p>Nom : <?php echo $nom; ?></p>
        <p>Prénom : <?php echo $prenom; ?></p>
        <p>Adresse : <?php echo $adresse; ?></p>
        <p>Carte PayPal : <?php echo $paypal; ?></p>
        <button class='btn print-btn' onclick='window.print()'>Imprimer la facture</button>
    </div>
<?php endif; ?>

</body>
</html>
