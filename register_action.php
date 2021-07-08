<?php require_once 'mongoConnexion.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(isLoggedIn()){
        header("Location: index.php");
    }
?>
<?php

   if(isset($_POST['inscription'])){
       
        $email = $_POST['emailRegister'];
        $temp  = $_POST['passwdRegister'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
    
        $arrays = array(
            
            "Email Address" => $email,
            "Password"      => $pass
        
        );
        
        $query = chkemail($email);
        if($query){
            register($arrays);
            header("Location: login.php");
            }
       else{
        echo "Email already registered!";
           echo"<br>";
        echo "Please <a href='register.php'>Register</a> with another email ID";
       }
}

?>