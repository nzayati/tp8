<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    
</head>
<?php
if (isset($_POST['login'])){
  $user=htmlspecialchars($_POST['username']);
  $password= sha1($_POST['password']);
  if(!empty($mailconnect) AND !empty($password)){
    $requser = $bdd ->prepare("SELECT * FROM user WHERE id = ? AND mdp =?");
    $requser->execute(array($mailconnect,$password));
    $userexist = $requser->rowCount();
    if($userexist==1){
      $userinfo=$requser->fetch();
      $_SESSION['id']=$userinfo['idUser'];
      $_SESSION['mdp']=$userinfo['mdp'];
      header("Location: recherche.php?id=".$_SESSION['id']);
    }
    else {
      $erreur="Le mdp ou l'email ne correspondent à aucun utilisateur";
    }
  }
  else {
    $erreur="Champs obligatoires";
  }

}
 ?>
<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="verification.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

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


        </form><button class="btn btn-default" href="register.php">
            <span> <i class="fa fa-user left"></i> Pas encore inscrit ? Créez votre compte </span>
        </button>
    </div>
</body>

</html>