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
                </section>
            <hr>
             <div id="dataapptwrapper">
             <section>
             <legend>Manage Appointment Information</legend>
             <br><br>
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
            
            if(isset($_POST['update'])){
                $UpdateQuery = "UPDATE appointment SET PatientID='$_POST[patientid]',
                PhysicianName='$_POST[physicianname]',
                Date='$_POST[date]',
                Time='$_POST[time]',
                Reason='$_POST[reason]',
                Cost='$_POST[cost]' WHERE PatientID='$_POST[patientid]'";
                mysqli_query($conn, $UpdateQuery);
            }
            
            if(isset($_POST['delete'])){
                $DeleteQuery = "DELETE FROM appointment WHERE AppointmentID='$_POST[appointmentid]' LIMIT 1";
                mysqli_query($conn, $DeleteQuery);
            }
            
                if(isset($_POST['insert'])){
                $AddQuery = "INSERT INTO appointment (AppointmentID, PhysicianName, Date, Time, Reason, Cost)
                VALUES('$_POST[addpatientid]',
                '$_POST[addphysician]',
                '$_POST[adddate]',
                '$_POST[addtime]',
                '$_POST[addreason]',
                '$_POST[addcost]')";
                mysqli_query($conn, $AddQuery);
            }
            
        $sql = "SELECT * FROM appointment";
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Appointment ID</th><th>Physician</th><th>Date</th><th>Time</th><th>Reason</th><th>Cost</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<form action=edit_data_appointment.php method=post>";
                echo "<tr>";
                    echo "<td>" . "<input type=text name=appointmentid value='" . $row["AppointmentID"] . "'> </td>";
                    echo "<td>" . "<input type=text name=physicianname value='" . $row["PhysicianName"] . "'> </td>";
                    echo "<td>" . "<input type=text name=date value='" . $row["Date"]. "'> </td>";
                    echo "<td>" . "<input type=text name=time value='" . $row["Time"] . "'> </td>";
                    echo "<td>" . "<input type=text name=reason value='" . $row["Reason"] . "'> </td>";
                    echo "<td>" . "<input type=text name=cost value='" . $row["Cost"] . "'> </td>";
                    echo "<td>" . "<input type=hidden name=hidden value'" . $row["AppointmentID"] ."'> </td>";
                    echo "<td>" . "<input type=submit name=update value=update" . "> </td>";
                    echo "<td>" . "<input type=submit name=delete value=delete" . "> </td>";
                echo "</tr>";
                echo "</form>";
            }
            echo "<form action=edit_data_appointment.php method=post>";
            echo "<tr>";
            echo "<td><input type=text name=addpatientid> </td>";
            echo "<td><input type=text name=addphysician> </td>";
            echo "<td><input type=text name=adddate> </td>";
            echo "<td><input type=text name=addtime> </td>";
            echo "<td><input type=text name=addreason> </td>";
            echo "<td><input type=text name=addcost> </td>";
            echo "<td><input type=submit name=insert value=insert" . "> </td>";
            echo "</form>";
            echo "</table>";
        } else {
            echo "0 results";
        }
        }
        
        $conn->close();
        ?>       </section>
         </div>
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
                         <li><a href='#'><span>Edit</span></a></li>
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
