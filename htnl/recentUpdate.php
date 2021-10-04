<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Update</title>
    <link rel="stylesheet" href="../css/recentUpdate.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Josefin+Slab:ital,wght@0,400;0,600;1,300;1,400;1,600&family=Muli:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <div class="container">
        <div class="hambugarMenu">
            <div class="line line-1">

            </div>
            <div class="line line-2">

            </div>
            <div class="line line-3">

            </div>
        </div>
    
    <section class="sidebar">
        <ul class="menu">
        <li class="menu-item">
            <a href="../index.html" class="menu-link" data-conten="Home">Home</a>
        </li>
        <li class="menu-item">
            <a href="login.html" class="menu-link" data-conten="Report">Report</a>
        </li>
        <li class="menu-item">
            <a href="registration.html" class="menu-link" data-conten="Registration">Registration</a>
        </li>
        <li class="menu-item">
            <a href="team.html" class="menu-link" data-conten="Team">Team</a>
        </li>
        <li class="menu-item">
            <a href="contact.html" class="menu-link" data-conten="Contact">Contact</a>
        </li>
    </ul>
        <div class="social-media">
            <a href="https://www.facebook.com/alamin.rony.1023"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.facebook.com/saimasshowrov/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/janjahangir.hossain/"><i class="fab fa-twitter"></i></a>
        </div>
    </section>
        <div class="allBox">
            <div class="box1">
                <div class="percent">
                    <div class="chart1" data-percent="0">
                    </div>
                    
                </div>
                <!-- <div class="number">
                        <h2 id="infected"><span>%</span></h2>
                </div> -->
                <!-- <h2 class="text" >Total Infected: <span ></span></h2> -->
                <h2 class="text" id="infected"></h2>
                <h2 class="text" id="infected1"></h2>
                
                
            </div>
            <div class="box2">
                <div class="percent">
                    <div class="chart2" data-percent="0">
                    </div>
                    
                </div>
                <h2 class="text" id="Deaths"></h2>
                <h2 class="text" id="Deaths1"></h2>
                
                <!-- <h2 class="text">Total Deaths : 10</h2>
                <h2 class="text">Newly Deaths : 5</h2> -->
            </div>
            <div class="box3">
                <div class="percent">
                    <div class="chart3" data-percent="0">
                    </div>
                    <!-- <div class="number">
                        <h2>70<span>%</span></h2>
                    </div> -->
                </div>
                <h2 class="text" id="Healthy"></h2>
                <h2 class="text" id="Healthy1"></h2>
                <!-- <h2 class="text" >Total Healthy : 500</h2>
                <h2 class="text">Newly Healthy : 100</h2> -->
            </div>
            <div class="box4">
                <div class="percent">
                    <div class="chart4" data-percent="0">
                    </div>
                    <!-- <div class="number">
                        <h2>70<span>%</span></h2>
                    </div> -->
                </div>
                <h2 class="text" id="Vaccine"></h2>
                <h2 class="text" id="Vaccine1"></h2>
                <!-- <h2 class="text">Total Vaccine Doses : 5000</h2>
                <h2 class="text">Newly Vaccine Doses : 400</h2> -->
            </div>
            
    </div>
        
    </div>
    
    <script src="../index.js"></script>
    <script src="../easypiechart.js"></script>
    <script>
        var element1 = document.querySelector('.chart1');
        var emt1 = new EasyPieChart(element1, {
            // your options goes here
            barColor: ' #337aff',
            trackColor : '#f2f2f2',
            scaleColor: '#dfe0e0',
            scaleLength : false,
            lineCap : 'round',
            lineWidth : 8,
            size : 150,
            rotate : 0,
            animate : 1400,
        });
        var element2 = document.querySelector('.chart2');
        var emt2 = new EasyPieChart(element2, {
            // your options goes here
            barColor: '#ef1e25',
            trackColor : '#f2f2f2',
            scaleColor: '#dfe0e0',
            scaleLength : false,
            lineCap : 'round',
            lineWidth : 8,
            size : 150,
            rotate : 0,
            animate : 1400,
        });
        var element3 = document.querySelector('.chart3');
        var emt3 = new EasyPieChart(element3, {
            // your options goes here
            barColor: '#33ff68',
            trackColor : '#f2f2f2',
            scaleColor: '#dfe0e0',
            scaleLength : false,
            lineCap : 'round',
            lineWidth : 8,
            size : 150,
            rotate : 0,
            animate : 1400,
        });
        var element4 = document.querySelector('.chart4');
        var emt4 = new EasyPieChart(element4, {
            // your options goes here
            barColor: '#2980b9',
            trackColor : '#f2f2f2',
            scaleColor: '#dfe0e0',
            scaleLength : false,
            lineCap : 'round',
            lineWidth : 8,
            size : 150,
            rotate : 0,
            animate : 1400,
        });


        function addData(){
            let N = <?php 
           
                            $hostname = 'localhost';
                            $username = 'root';
                            $password = '';
                            $dbname = 'bangladesh_covid19';
                            $conn = new mysqli($hostname,$username,$password,$dbname);
                            if($conn->connect_error){
                                echo " Connection error !";
                            }else{
                               
                                $Negative = "Negative";
                                $sql = "SELECT test_result FROM report_table WHERE report_table.test_result='$Negative'";  
                                //$sql = "SELECT * FROM table_test_registration Positive "; 
                                $result = mysqli_query($conn, $sql);  
                                $json_array = array(); 
                                $count = 0; 
                                while($row = mysqli_fetch_assoc($result))  
                                {  
                                    $json_array[] = $row;  
                                    $count +=1;
                                }  
                                
                                echo json_encode($count); 
                            }
                            //$conn.close();
                    ?>;
            let P = <?php 
           
                            $hostname = 'localhost';
                            $username = 'root';
                            $password = '';
                            $dbname = 'bangladesh_covid19';
                            $conn = new mysqli($hostname,$username,$password,$dbname);
                            if($conn->connect_error){
                                echo " Connection error !";
                            }else{
                                $Positive = "Positive";
                                
                                $sql = "SELECT test_result FROM report_table WHERE report_table.test_result='$Positive'";  
                                //$sql = "SELECT * FROM table_test_registration Positive "; 
                                $result = mysqli_query($conn, $sql);  
                                $json_array = array(); 
                                $count = 0; 
                                while($row = mysqli_fetch_assoc($result))  
                                {  
                                    $json_array[] = $row;  
                                    $count +=1;
                                }  
                                
                                echo json_encode($count); 
                            }
                            //$conn.close();
                    ?>;
            let Deaths = <?php 
           
                    $hostname = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'bangladesh_covid19';
                    $conn = new mysqli($hostname,$username,$password,$dbname);
                    if($conn->connect_error){
                        echo " Connection error !";
                    }else{
                        
                        
                        $sql = "SELECT * FROM deaths_table "; 
                        $result = mysqli_query($conn, $sql);  
                        $json_array = array(); 
                        $count = 0; 
                        while($row = mysqli_fetch_assoc($result))  
                        {  
                            $json_array[] = $row;  
                            $count +=1;
                        }  
                        
                        echo json_encode($count); 
                    }
                    //$conn.close();
            ?>;

let vaccine = <?php 
           
           $hostname = 'localhost';
           $username = 'root';
           $password = '';
           $dbname = 'bangladesh_covid19';
           $conn = new mysqli($hostname,$username,$password,$dbname);
           if($conn->connect_error){
               echo " Connection error !";
           }else{
               
               
               $sql = "SELECT * FROM vaccine_table "; 
               $result = mysqli_query($conn, $sql);  
               $json_array = array(); 
               $count = 0; 
               while($row = mysqli_fetch_assoc($result))  
               {  
                   $json_array[] = $row;  
                   $count +=1;
               }  
               
               echo json_encode($count); 
           }
           //$conn.close();
        ?>;
        let vaccineRegistration = <?php 
           
           $hostname = 'localhost';
           $username = 'root';
           $password = '';
           $dbname = 'bangladesh_covid19';
           $conn = new mysqli($hostname,$username,$password,$dbname);
           if($conn->connect_error){
               echo " Connection error !";
           }else{
               
               
               $sql = "SELECT * FROM table_vaccine_registration "; 
               $result = mysqli_query($conn, $sql);  
               $json_array = array(); 
               $count = 0; 
               while($row = mysqli_fetch_assoc($result))  
               {  
                   $json_array[] = $row;  
                   $count +=1;
               }  
               
               echo json_encode($count); 
           }
           //$conn.close();
        ?>;
        

        let t = 0;
        t = P + N;
        let p1 = 0, n1=0;
        p1 = Math.ceil((P/t)*100);
        n1 = Math.ceil((N/t)*100);
        console.log(p1);
        let vppt =0;
        vppt =P/t;
        let die = 0;
        die = Math.ceil((Deaths/t)*100);
        let vac = Math.ceil((vaccine/vaccineRegistration)*100);

        console.log(typeof(N));
        console.log("P "+P);
        console.log((N/t)*100);
        console.log(vppt);
        console.log(die);
        emt1.update(p1);
        emt2.update(die);
        emt3.update(n1);
        emt4.update(vac);
            
        document.getElementById("infected").innerHTML ="Total Infected : "+p1+"%"; 
        document.getElementById("infected1").innerHTML ="Total Infected : "+P; 
 
        document.getElementById("Deaths").innerHTML ="Total Deaths : "+die+"%"; 
        document.getElementById("Deaths1").innerHTML ="Total Deaths : "+Deaths;
         
        document.getElementById("Healthy").innerHTML ="Total Healthy : "+n1+"%"; 
        document.getElementById("Healthy1").innerHTML ="Total Healthy : "+N;
        
        document.getElementById("Vaccine").innerHTML ="Total Vaccine Doses : : "+vac+"%"; 
        document.getElementById("Vaccine1").innerHTML ="Total Vaccine Doses : "+vaccineRegistration;

        }
        addData();

    </script>
</body>
</html>