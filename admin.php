<?php 
session_start();
include("menu.php");
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
            background-color: #f0f0f0;  
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

        .link-box {
            text-align: center;
            padding: 20px 40px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .link-box a {
            font-size: 1.25rem;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 5px;
            background-color: #007bff;
            transition: background-color 0.3s;
        }

        .link-box a:hover {
            background-color: #0056b3;
        }
        .title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-style: italic;
        }
    </style>
</head>
<div>
    <div class="login-container">
    <div class="title">Gestion des produit </div>
    <div class="link-box">
            <a href="listeproduits.php">Liste des produits</a>
            <a href="ajoutP.php">Ajouter Produit</a>
            <a href="SupprimerP.php">Supprimer Produit</a>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </div>
</html>
