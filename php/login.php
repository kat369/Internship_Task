<?php



    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM userdata 
                     WHERE email = '%s'",
                     $mysqli-> real_escape_string($_POST["email"]));
                     
        $result = $mysqli->query($sql);
        
        $user = $result->fetch_assoc();

         if ($user) {
            if(password_verify($_POST["password"], $user["password_hash"])){
              
                echo '<script>window.location.href="../../Internship_Task/profile.html"</script>' ;
            
            }
            else {
                echo ("login credentials doesn't match");
            }
         } else {
            echo "Account not found...";
         }

     

?>