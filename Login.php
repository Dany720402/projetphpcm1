<?php
session_start();
include("menu.php");



function SelectionnerAdmin($login, $password) {
    try {
        $connect = mysqli_connect('localhost', 'root', '', 'projecommerce');
        $login = mysqli_real_escape_string($connect, $login);
        $password = mysqli_real_escape_string($connect, $password); 
        
        $req2 = "SELECT * FROM admin WHERE login='$login' and password='$password'";
        $results = mysqli_query($connect, $req2);
        
        if (mysqli_num_rows($results) > 0) {
           
           
            header("Location: admin.php");
            exit();
        } 
    } catch (Exception $e) {
        echo "Il y a une erreur dans le code de ma sélection.";
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["admin_login"]) && isset($_POST["admin_password"])) {
        $login = $_POST["admin_login"];
        $password = $_POST["admin_password"];
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        SelectionnerAdmin($login, $password); 
    } else {
        echo "Veuillez entrer vos informations.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;  
       
    }
    .login-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 100vh;
     
        padding: 20px;
    }
    .login-box {
        width: 40px;
        max-width: 30%;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        flex: 1; 
        margin: 10px;
    }
        .btn {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    h1 {
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
<body>


    <div class="login-container">
    <h1>Bienvenue Administrateur</h1> 
        <div class="login-box">
        <h2>Administrateur</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="admin_login">Login</label>
                    <input type="text" class="form-control" id="admin_login" name="admin_login" placeholder="Entrez votre login" required>
                </div>
                <div class="form-group">
                    <label for="admin_password">Mot de passe</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>
        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
