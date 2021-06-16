<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="verification.php" method="POST">
            <h1>Vos informations personnelles</h1>

            <div class="required form-group"> <label for="email">E-mail <sup>*</sup></label> <input type="text" class="is_required validate form-control" data-validate="isEmail" id="email" name="email" value="email"></div>
            <div class="required password form-group"> <label for="passwd">Mot de passe <sup>*</sup></label> <input type="password" class="is_required validate form-control" data-validate="isPasswd" name="passwd" id="passwd"> <span class="form_info">(5 caractères min.)</span></div>
            <input type="submit" id='submit' value="S'inscrire">



        </form>
        <button class="btn btn-default" href="/register.php">
            <span> <i class="fa fa-user left"></i> Vous avez déjà un compte ? Connectez-vous </span>
        </button>
    </div>
</body>

</html>