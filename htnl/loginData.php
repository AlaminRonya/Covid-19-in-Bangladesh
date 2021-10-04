<?php
    if(isset($_POST['submit'])){
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'bangladesh_covid19';
            $conn = new mysqli($hostname,$username,$password,$dbname);
            $userEmail = trim($_POST['email']);
            echo $userEmail;
            $userPassword = trim($_POST['password']);
            if($conn->connect_error){
                echo " Connection error !";
            }else{
                //$sql = "SELECT * FROM result_table  WHERE result_table.gmail_id=$userEmail AND result_table.gmail_id=$userPassword ."'";  
                $sql = "SELECT userEmail, userPassword FROM table_test_registration WHERE userEmail='".$userEmail."' AND userPassword='".$userPassword."' "; 
                //echo ($sql);
                $result = mysqli_query($conn, $sql);
                $count = 0;
                while($row = mysqli_fetch_assoc($result)){ 
                    $count +=1;
                }

                if($count>0){
                    header("Location:  report.php");
                }
                else{
                    echo ("<script>alert('You Have Entered Incorrect Email Or Password')</script>");
                    
                }
            }
    }
?>