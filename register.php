<?php
    require_once 'library.php';
    if(isLoggedIn()){
        header("Location: index.php");
    }
?><html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="register_action.php" method="POST">
            <h1>Vos informations personnelles</h1>

            <div class="required form-group"> <label for="email">E-mail <sup>*</sup></label> <input type="text" class="is_required validate form-control" data-validate="isEmail" id="email" name="emailRegister"></div>
            <div class="required password form-group"> <label for="passwd">Mot de passe <sup>*</sup></label> <input type="password" class="is_required validate form-control" data-validate="isPasswd" name="passwdRegister" id="passwd"> <span class="form_info">(5 caractères min.)</span></div>
            <div class="required password form-group"> <label for="inputConfirmpassword">Confirmer le mot de passe <sup>*</sup></label> <input type="password" class="is_required validate form-control" data-validate="isPasswd" name="passwdRegister" id="cpass" onblur="chk()" placeholder="Confirm Password"> </div>
            <div id="error"></div>
            <input type="submit" id='submit' value="S'inscrire" name="inscription">


        </form>
        
        <script src="script.js" type="text/javascript"></script>
        <button class="btn btn-default" onclick="self.location.href='login.php'">
            <span> <i class="fa fa-user left"></i> Vous avez déjà un compte ? Connectez-vous </span>
        </button>
    </div>
</body>


</html>