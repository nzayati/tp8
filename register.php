<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<?php
//session_start();
$bdd = new PDO('mysql:host=localhost;dbname=giantmix', 'root', '');
if (isset($_POST['inscription'])) {
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $motdepasse = sha1($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * WHERE mail = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount(); 
            if ($mailexist == 0) {
                $insertmbr = $bdd->prepare('INSERT INTO user(mail,mdp) VALUES(?,?)');
                $insertmbr->execute(array( $email, $motdepasse));
                $erreur = " Le compte est créé <a href= \"index.php\"> Se connecter </a>";
            } else {
                $erreur = "adresse mail deja utilisée";
            }
        } else {
            $erreur = "l'adresse mail n'est pas valide";
        }
    } else {
        $erreur = "Champs obligatoires";
    }
}
?>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="verification.php" method="POST">
            <h1>Vos informations personnelles</h1>

            <div class="required form-group"> <label for="email">E-mail <sup>*</sup></label> <input type="text" class="is_required validate form-control" data-validate="isEmail" id="email" name="email" value="email"></div>
            <div class="required password form-group"> <label for="passwd">Mot de passe <sup>*</sup></label> <input type="password" class="is_required validate form-control" data-validate="isPasswd" name="passwd" id="passwd"> <span class="form_info">(5 caractères min.)</span></div>
            <input type="submit" id='submit' value="S'inscrire" name="inscription">



        </form>
        <button class="btn btn-default" href="/register.php">
            <span> <i class="fa fa-user left"></i> Vous avez déjà un compte ? Connectez-vous </span>
        </button>
    </div>
</body>

</html>