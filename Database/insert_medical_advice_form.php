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
             <legend>ICD-10 Insertions</legend><br>
            <form action="insert_medical_advice_form.php" method="post"><!--or get-->
            <p>Press "Submit" to insert ICD-10 table data.</p>
            <input type="submit" name="submit"><br><br>
            </form>
            <!--<textarea name="advice_output" rows="4" cols="50">
                
            </textarea>-->
        <?php
        
    if(isset($_POST['submit'])){
            
        
        
        $mysqli = new mysqli('localhost', 'MedicalSystem', 'password');
        if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        
        echo 'Success... ' . $mysqli->host_info . "\n";
        
       mysqli_select_db($mysqli, "medicalsystem");
       
       $sql = "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A000', 'Cholera due to Vibrio cholerae 01, biovar cholerae', 'Cholera due to Vibrio cholerae 01, biovar cholerae');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A001', 'Cholera due to Vibrio cholerae 01, biovar eltor', 'Cholera due to Vibrio cholerae 01, biovar eltor');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A009', 'Cholera, unspecified', 'Cholera, unspecified');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A01', 'Typhoid and paratyphoid fevers', 'Typhoid and paratyphoid fevers');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A010', 'Typhoid fever', 'Typhoid fever');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A0100', 'Typhoid fever, unspecified', 'Typhoid fever, unspecified');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A0101', 'Typhoid meningitis', 'Typhoid meningitis');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A0102', 'Typhoid fever with heart involvement', 'Typhoid fever with heart involvement');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A0103', 'Typhoid pneumonia', 'Typhoid pneumonia');";
       
       $sql .= "INSERT INTO Advice (Code, Name, Advice)
       VALUES('A00', 'Cholera', 'Cholera')";
       
       
       
       if($mysqli->multi_query($sql) === TRUE){
        echo '<br />';
        echo 'ICD-10 data inserted...';
       } else {
        echo '<br />';
        echo "Error inserting data... " . $mysqli->error;
       }

        $mysqli->close();
     }
        ?>     </div>   
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
                           <li><a href='#'><span>Insert</span></a></li>
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
