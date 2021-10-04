



<?php


    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bangladesh_covid19';
    $conn = new mysqli($hostname,$username,$password,$dbname);
    $counter = 0;
    if($conn->connect_error){
        echo " Connection error !";
    }else{
        
        function checkKeys($conn, $randStr){
            $checkQuery = "SELECT * FROM table_test_registration,table_vaccine_registration";
            $checkResult = mysqli_query($conn, $checkQuery);
            while($row = mysqli_fetch_assoc($checkResult)){
                if($row['userId']==$randStr){
                    $keyExists = true;
                    break;
                }else{
                    $keyExists = false;
                }
            }
            return $keyExists;
        }
        function generateKey($conn){
            $keyLength = 8;
            $str = "zxcvbnmasdfghjklqwertyuiop1234567890/*+()@#$%^&?<>{}[]|\ZXCVBNMASDFGHJKLQWERTYUIOP";
            $randStr = substr(str_shuffle($str),0,$keyLength);
            $checkKey = checkKeys($conn,$randStr);
            while($checkKey == true){
                $randStr = substr(str_shuffle($str),0,$keyLength);
                $checkKey = checkKeys($conn,$randStr);
            }
            return $randStr;
        }

        // echo generateKey($conn);
        


        



        // echo " Connection  !";
        
        $userId = generateKey($conn);
        $fullName = trim($_POST['fullname']);
        $userName = trim($_POST['userName']);
        $userEmail = trim($_POST['userEmail']);
        $userNumber = trim($_POST['userNumber']);
        $userPassword = trim($_POST['userPassword']);
        $confirmPassword = trim($_POST['confirmPassword']);
        $presentAddress = trim($_POST['presentAddress']);
        $permanentAddress = trim($_POST['permanentAddress']);
        $DOB = trim($_POST['DOB']);
        $occupation = trim($_POST['occupation']);
        $gender = trim($_POST['gender']);
        $onlineRegistration = trim(implode(',', $_POST['ch']));

        // if(empty($userId) || empty($fullName) || empty($userName) || empty($userEmail) || empty($userNumber) || empty($userPassword) || 
        // empty($confirmPassword) || empty($presentAddress) || empty($permanentAddress) || empty($DOB) || empty($occupation) || empty($gender) || empty($onlineRegistration)){
        //     echo "Empty!";
        // }else{

        

            if(isset($_POST['submit'])){
                if(empty($userId) || empty($fullName) || empty($userName) || empty($userEmail) || empty($userNumber) || empty($userPassword) || 
                empty($confirmPassword) || empty($presentAddress) || empty($permanentAddress) || empty($DOB) || empty($occupation) || empty($gender) || empty($onlineRegistration) || (strlen($userPassword)<5)){
                    echo "Empty!";
                }else{
                if($userPassword==$confirmPassword){
                    if($onlineRegistration =='Test'){
                    
                            $sql = "INSERT INTO table_test_registration (userId,fullName,userName,userEmail,userNumber,userPassword,presentAddress,permanentAddress,DOB,occupation,gender,registration) VALUES('$userId','$fullName','$userName','$userEmail','$userNumber','$userPassword','$presentAddress','$permanentAddress','$DOB','$occupation','$gender','$onlineRegistration')";
                            if(mysqli_query($conn, $sql)){
                                echo($userPassword."Inserted");
                                $counter = 1;
                            }else{
                                echo("Not Inserted");
                            }

                    }else{
                        
                        $sql = "INSERT INTO table_vaccine_registration (userId,fullName,userName,userEmail,userNumber,userPassword,presentAddress,permanentAddress,DOB,occupation,gender,registration) VALUES('$userId','$fullName','$userName','$userEmail','$userNumber','$userPassword','$presentAddress','$permanentAddress','$DOB','$occupation','$gender','$onlineRegistration')";
                        if(mysqli_query($conn, $sql)){
                            $counter = 1;
                            echo("Inserted");

                            
                        }else{
                            echo("Not Inserted");
                        }

                    }
                }else{
                    echo("Not match user-password and confirm-password");
                }
            }
        }
    }



?>


<script>
    let cnt = <?php echo json_encode($counter); ?>;
    //alert(cnt);
    if(cnt){
        let name = <?php echo json_encode($fullName); ?>;
        let email = <?php echo json_encode($userEmail); ?>;
        let password = <?php echo json_encode($userPassword); ?>;
        alert(`Name : ${name}
Email : ${email}
Password : ${password}`);

    }
    //let num = parseFloat(name1)+1;
    
    //console.log((num+1));
    //console.log(name1);

    function getRandomNumber(min , max){
        let step1 = max - min  + 1;
        let step2 = Math.random()*step1;
        let result = Math.floor(step2)+min;
        return result;
    }
    let res = getRandomNumber(1,10000);

</script>

