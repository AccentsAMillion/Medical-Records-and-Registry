<!DOCTYPE html>
    <html>
    <head>
         <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
          <script src="jquery-1.11.0.js" type="text/javascript"</script>
          <script src="jquery-1.11.0.min.js" type="text/javascript"</script>
   <link rel="stylesheet" href="sidebardesign.css">
   <link rel="stylesheet" type="text/css" href="main.css">
   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
   <script src="jquery-1.11.0.js" type="text/javascript"</script>
   <script src="jquery-1.11.0.min.js" type="text/javascript"</script>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
          
    <style  type="text/css" media="screen"> 
    table, th, td {
                 border: 1px solid black;
            }
    </style> 
    </head>
    <body>
         <header id="main_header">
            <img class="m_experts" src="imgs/dbLogo.png">
        </header>  
      <div id="wrapper">
        <div id="main_content">
                <section>
                   
            <nav>
                <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="insert_patient_form.php">Patients</a></li>
                <li><a href="insert_appointment_form.php">Appointments</a></li>
                <li><a href="insert_new_hire_employee_form.php">Employees</a></li>
                <li><a href="insert_onsite_doctor_form.php">Doctors</a></li>
                </ul>
            </nav>
            <hr>
             <div id="wrapper2">
             <legend>Patient Search</legend>
             <br><br>
        <form action="search_db_patient.php" method="post">
            Search: <input type="text" name="search" />
            <input type="submit" name="submit" value="Search" />
        </form> 
        <?php
            $servername = "localhost";
            $username = "MedicalSystem";
            $password = "password";
            $dbname = "medicalsystem";
            $conn = new mysqli($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo 'Success... ' . $conn->host_info;
        }
        
        if(isset($_POST['submit'])){
            $name=$_POST['search'];
            $sql="SELECT PatientID, FirstName, LastName, PhoneNumber, Address FROM patient WHERE  FirstName LIKE '%" . $name . "%' OR PatientID LIKE '%" . $name  ."%'";// 
            $mydb=mysqli_select_db($conn, $sql);
            $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo'<br />';
            echo mysqli_num_rows($result)." Rows";
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Patient ID</th><th>Name</th><th>Phone</th><th>Address</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["PatientID"]."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["PhoneNumber"]."</td><td>".$row["Address"]."</td></tr>";
            }
            echo "</table>";
        } 
        }
        else{
            echo "</br>";
            echo  "0 results..."; 
        }
        } 
        $conn->close();
        ?></div>
     </section>
        
                    <aside id="left_col">
                        <h2 class="side_topics">Database Structure</h2>
             <hr>
                <br>
                       <div id='cssmenu'>
                <ul>
                <li class='active'><a href='#'><span>NAVIGATION</span></a></li>
                
                <li class='has-sub'><a href='#'><span>Patient Database</span></a>
                    <ul>
                        <li><span><a href='edit_data_patient.php'><span>Edit</span></a></li>
                        <li class='last'><span><a href='my_data_patient.php'><span>View</span></a></li> 
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Appointment Database</span></a>
                    <ul>
                         <li><a href='edit_data_appointment.php'><span>Edit</span></a></li>
                         <li class='last'><a href='my_data_appointment.php'><span>View</span></a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Medical Advice</span></a>
                    <ul>
                           <li><a href='insert_medical_advice_form.php'><span>Insert</span></a></li>
                           <li class='last'><a href='search_db_advice.php'><span>Search</span></a></li>

                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Search Database</span></a>
                    <ul>
                        <li><a href='search_db_appointment.php'><span>Appointments</span></a></li>
                        <li><a href='search_db_patient.php'><span>Patients</span></a></li>
                        <li><a href='search_db_doctor.php'><span>Doctors</span></a></li>
                        <li class='last'><a href='search_db_employee.php'><span>Employees</span></a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Employee Database</span></a>
                    <ul>
                         <li><a href='edit_data_employee.php'><span>Edit</span></a></li>
                         <li class='last'><a href='my_data_employee.php'><span>View</span></a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Doctors Onsite</span></a>
                    <ul>
                         <li><a href='edit_data_doctor.php'><span>Edit</span></a></li>
                         <li class='last'><a href='my_data_doctor.php'><span>View</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
                       <img class="m_symbol" src="imgs/medicinesymbol.jpg">
                    </aside>
        </div>
      </div>

        <footer>
            &copy; Create By&#58;JDNCM Systems Solutions 
        </footer>
        </div>
    </body>
</html>
