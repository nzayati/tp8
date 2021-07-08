<?php require_once 'mongoConnexion.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(isLoggedIn()){
        header("Location: index.php");
    }
?>
<?php

    if(isset($_POST['login'])){
        
        $email = $_POST['email'];
        $upass = $_POST['password'];
        $criteria = array("Email Address"=> $email);
        $query = $collection->findOne($criteria);
        //var_dump($query);
        if(empty($query)){
            echo "Email ID is not registered.";
            echo "Either <a href='register'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
        }
        else{
            
                $pass = $query["password"];
                if(password_verify($upass,$pass)){
                    $var = setsession($email);
                  
                    
                    if($var){
                        
                    header("Location: index.php");
                    }
                    else{
                        echo "Some error";
                    }
                }
                else{
                    echo "You have entered a wrong password";
                    echo "<br>";
                    echo "Either <a href='register'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
                }
                
            
        
        }
    }
    

?>