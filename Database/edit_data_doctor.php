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
             <div id="wrapper3">
             <section>
             <legend>Manage Doctor Information</legend>
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
                $UpdateQuery = "UPDATE doctor SET DoctorID='$_POST[doctorid]',
                FirstName='$_POST[firstname]',
                LastName='$_POST[lastname]',
                PhoneNumber='$_POST[phonenumber]',
                Address='$_POST[address]' WHERE DoctorID='$_POST[hidden]'";
                mysqli_query($conn, $UpdateQuery);
            }
            
            if(isset($_POST['delete'])){
                $DeleteQuery = "DELETE FROM doctor WHERE DoctorID='$_POST[doctorid]' LIMIT 1";
                mysqli_query($conn, $DeleteQuery);
            }
            
             if(isset($_POST['insert'])){
                $AddQuery = "INSERT INTO patient (DoctorID, FirstName, LastName, PhoneNumber, Address)
                VALUES('$_POST[adddoctorid]',
                '$_POST[addfirstname]',
                '$_POST[addlastname]',
                '$_POST[addphonenumber]',
                '$_POST[addaddress]')";
                mysqli_query($conn, $AddQuery);
            }
            
        $sql = "SELECT * FROM doctor";
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Doctor ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Address</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<form action=edit_data_doctor.php method=post>";
                echo "<tr>";
                    echo "<td>" . "<input type=text name=doctorid value='" . $row["DoctorID"] . "'> </td>";
                    echo "<td>" . "<input type=text name=firstname value='" . $row["FirstName"] . "'> </td>";
                    echo "<td>" . "<input type=text name=lastname value='" . $row["LastName"]. "'> </td>";
                    echo "<td>" . "<input type=text name=phonenumber value='" . $row["PhoneNumber"] . "'> </td>";
                    echo "<td>" . "<input type=text name=address value='" . $row["Address"] . "'> </td>";
                    echo "<td>" . "<input type=hidden name=hidden value='" . $row["DoctorID"] . "'> </td>";
                    echo "<td>" . "<input type=submit name=update value=Update" . "> </td>";
                    echo "<td>" . "<input type=submit name=delete value=Delete" . "> </td>";
                echo "</tr>";
                echo "</form>";
            }
            echo "<form action=edit_data_doctor.php method=post>";
            echo "<tr>";
            echo "<td><input type=text name=adddoctorid> </td>";
            echo "<td><input type=text name=addfirstname> </td>";
            echo "<td><input type=text name=addlastname> </td>";
            echo "<td><input type=text name=addphonenumber> </td>";
            echo "<td><input type=text name=addaddress> </td>";
            echo "<td><input type=submit name=insert value=Insert" . "> </td>";
            echo "</form>";
            echo "</table>";
            
        } else {
            echo "0 results";
        }
        }
        
        $conn->close();
        ?>       
    </section>
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
                         <li><a href='#'><span>Edit</span></a></li>
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
