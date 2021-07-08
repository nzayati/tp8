
<?php
    require_once 'library.php';
    if(isLoggedIn()){
       
        echo "Logged in!";
        $email = $_SESSION["email"];
        echo "Welcome $email!!!";
        

    }
    else{
        header("Location: login.php");
    }

    if(isset($_POST['logout'])){
        
        $var = removeall();
        if($var){
            header("Location:login.php");
        }
        else{
            echo "Error!";
        }
    
    }
?>
<html>
    <body>
        <form method="post" action="">
            <input type="submit" name="logout" value="Logout!">
        </form>
    </body>
</html>