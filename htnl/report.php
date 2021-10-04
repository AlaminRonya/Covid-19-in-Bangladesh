<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report View</title>
    <link rel="stylesheet" href="../css/report.css">
    <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="container">
            <div class="wrapper">
              <div class="content">
                <a href="../index.html">HOME</a> 
              
                <div class="search-div">
                <!-- <button id="button" >I</button> -->
                  <input type="text" id="searchId" placeholder="Enter your email"  >
                  <!-- <button id="button1" >I</button> -->
                </div>
                
               

              </div>
            </div>
            <div class="table">
              <table>
                <tr id="header">
                  <th>Serial Number</th>
                  <th>Full Name</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Phone Number</th>
                  <th>Present Address</th>
                  <th>Permanent Address</th>
                  <th>Date of Birth</th>
                  <th>Occupation</th>
                  <th>Gender</th>
                  <th>Registration</th>
                  <th>Report</th>
                  <th>Report Of Date</th>
                </tr>
                <tbody id="myTable">
                      
                
                <!-- <tr>
                    <td>Md. Al Amin </td>
              
                    <td>+8801750349979 </td>
                    <td>Uttara,Dhaka-Bangladesh</td>
                    <td>Rajnarayanpur,Aminpur,Pabna,Dhaka-Bangladesh</td>
                    <td>10/15/1997</td>
                    <td>Male</td>
                    <td>Student</td>
                    <td>Positive</td>
                </tr>
                <tr>
                    <td>Saima </td>
                    <td>+8801310830379 </td>
                    <td>Cox-bazar,Dhaka-Bangladesh</td>
                    <td>Malibag,Dhaka-Bangladesh</td>
                    <td>10/14/1997</td>
                    <td>Female</td>
                    <td>Student</td>
                    <td>Negative</td>
                </tr>
                <tr>
                    <td>Md. Jahangir Alam </td>
                    
                    <td>+8801625605347 </td>
                    <td>MDhaka-Bangladesh</td>
                    <td>Uttara,Dhaka-Bangladesh</td>
                    <td>02/24/2021</td>
                    <td>Male</td>
                    <td>Student</td>
                    <td>Positive</td>
                </tr>
                <tr>
                    <td>Md. Al Amin </td>
                    
                    <td>+8801750349979 </td>
                    <td>Rajnarayanpur,Aminpur,Pabna,Dhaka-Bangladesh</td>
                    <td>Uttara,Dhaka-Bangladesh</td>
                    <td>02/24/2021</td>
                    <td>Male</td>
                    <td>Student</td>
                    <td>Positive</td>
                </tr>
                <tr>
                    <td>Md. Al Amin </td>
                    
                    <td>+8801750349979 </td>
                    <td>Rajnarayanpur,Aminpur,Pabna,Dhaka-Bangladesh</td>
                    <td>Uttara,Dhaka-Bangladesh</td>
                    <td>02/24/2021</td>
                    <td>Male</td>
                    <td>Student</td>
                    <td>Positive</td>
                </tr>
                <tr>
                    <td>Md. Al Amin </td>
                    
                    <td>+8801750349979 </td>
                    <td>Rajnarayanpur,Aminpur,Pabna,Dhaka-Bangladesh</td>
                    <td>Uttara,Dhaka-Bangladesh</td>
                    <td>10/24/2021</td>
                    <td>Male</td>
                    <td>Worker</td>
                    <td>Positive</td>
                </tr> -->
                </tbody>
        
            </table>
          </div>

    </div>

    <script>
        let c = 0;
        
        function addData(){
            let words = <?php 
           
                            $hostname = 'localhost';
                            $username = 'root';
                            $password = '';
                            $dbname = 'bangladesh_covid19';
                            $conn = new mysqli($hostname,$username,$password,$dbname);
                            if($conn->connect_error){
                                echo " Connection error !";
                            }else{
                                $sql = "SELECT * FROM table_test_registration, report_table WHERE table_test_registration.userId=report_table.userId";  
                                //$sql = "SELECT * FROM table_test_registration "; 
                                $result = mysqli_query($conn, $sql);  
                                $json_array = array();  
                                while($row = mysqli_fetch_assoc($result))  
                                {  
                                    $json_array[] = $row;  
                                }  
                                
                                echo json_encode($json_array); 
                            }
                            //$conn.close();
                    ?>;
        let vaccine = <?php
           if($conn->connect_error){
               echo " Connection error !";
           }else{
               //$sql = "SELECT * FROM table_vaccine_registration  WHERE table_test_registration.userEmail=result_table.gmail_id ";  
               $sql = "SELECT * FROM table_vaccine_registration, vaccine_table WHERE table_vaccine_registration.userId=vaccine_table.userId"; 
               $result = mysqli_query($conn, $sql);  
               $json_array = array();  
               while($row = mysqli_fetch_assoc($result))  
               {  
                   $json_array[] = $row;  
               }  
               
               echo json_encode($json_array); 
           }
          // $conn.close();
   ?>;
   words.push(...vaccine);
            buildTable(words);
            //console.log(words);
           for(let i = 0 ;i<vaccine.length; i++){
                console.log(vaccine[i]);
            }
        }

        
             
           
           


    function buildTable(data){
        let table = document.getElementById('myTable');

        for (let i = 0; i < data.length; i++){
            let row = `<tr>
                        <td>${i+1}</td>
                        <td>${data[i].fullName}</td>
                        <td>${data[i].userName}</td>
                        <td>${data[i].userEmail}</td>
                        <td>${data[i].userNumber}</td>
                        <td>${data[i].presentAddress}</td>
                        <td>${data[i].permanentAddress}</td>
                        <td>${data[i].DOB}</td>
                        <td>${data[i].occupation}</td>
                        <td>${data[i].gender}</td>
                        <td>${data[i].registration}</td>
                        <td>${data[i].test_result}</td>
                        <td>${data[i].report_date}</td>
                  </tr>`
            table.innerHTML += row;
        }
    }
    addData();

    var search_input = document.querySelector("#searchId");
    search_input.addEventListener("keyup", function(e){
        let filter = document.getElementById("searchId").value;
        let myTable = document.getElementById('myTable');
        let tr = myTable.getElementsByTagName('tr');
        console.log(tr.length);
        for(let i = 0;i<tr.length; i++){
            let td = tr[i].getElementsByTagName('td')[3];
            //console.log("fff"+td);
            if(td){
                let textValue = td.textContent || td.innerHTML;
                //console.log("fff "+textValue);
                if(textValue.indexOf(filter)>-1){
                    tr[i].style.display ="";
                }else{
                    tr[i].style.display ="none";
                }
            }
        }
    
    }); 
    </script>
</body>
</html>