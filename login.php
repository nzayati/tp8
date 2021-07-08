<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    
</head>
<?php require_once 'library.php';
    if(isLoggedIn()){
        header("Location: index.php");
    } ?>
<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="login_action.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le mail" name="email" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <input type="submit" id='submit' value='LOGIN' name="login">
            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>


        </form><button class="btn btn-default" onclick="self.location.href='register.php'">
            <span> <i class="fa fa-user left"></i> Pas encore inscrit ? Créez votre compte </span>
        </button>
    </div>
</body>

</html>