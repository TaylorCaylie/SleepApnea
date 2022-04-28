<!DOCTYPE HTML>

<?php

include_once("connect_db.php");
?>


<html>
    <head>
    <!-- Include jQuery script to make edits to the table-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>




        <meta charset="UTF-8">
        <meta name="description" content="AI Platform to Monitor Heart Health">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../static/css/dashboard_style.css">
        <title>Patient Portal</title>
    </head>
    <body>
        <header>
            <nav>
                <ul class="nav__links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="patient.php" class="activePage">Patient</a></li>
                    <li><a href="physician.php">Physician</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="base.php">Sign Up</a>
        </header>

        <h1> My Reports </h1>

        <table id="myreports_table">
            <!-- tr defines a row of cells. Each cell can represent a report-->
            <!-- This first one = table header, which is defined by th= table header (i think) -->
            <tr> 
                <th>Date</th>
                <th>Time</th>
                <th>Detected Arrhythmias</th>
                <th>Heart Rate</th>
                <th>View/Edit Symptoms</th>
                <th>View Report</th>
                <th>Email Report</th>
                <th>Download Report</th>
          
            </tr>
            
            <!--1. Make editable text box, that has a text limit, that stores the text in the database: reports table, in the symptoms column--> 

            <form action="insert.php" method="post" id="symptoms_form"></form>


         
           




            <?php
            // DATABASE OPERATIONS HERE
            // auht0 connection flow: User signs in, gets their token. Use the sub-claim for that token, add it to the patient database, and then retreive the user id (that Pat made) from that patient,
            // and then display the reports based on what user id is logged in.
            
            // GOES HERE

            // Read all the rows from the database table
            $sql = "SELECT * FROM Report"; // CHANGE REPORTS HERE
            $result = $connection->query($sql);

            // Check if the query is valid:
            if(!$result)
            {
                die("Invalid query: " . $connection->error);
            }
            
            // Read the data from each row, and add to the table:
            // Currently, this is actually pulling from the REPORTS table

            // View/Edit symptoms: allow certain amount of text, store the text in the database
            // View report: pop-up text box that shows detected arrhythmias, heart rate, symptoms, the date and time
            // Email report: pop up that populates the email to with the appropriate doctor, fill email with the report
            // Download report: allow user to save report in PDF format

            while($row = $result->fetch_assoc()){ 
               
                echo "<tr>
                <td>" . $row["Date"] . "</td> 
                <td>" . $row["Time"] . "</td>    
                <td>" . $row["AutoDetected"] . "</td>       
                <td>" . $row["HeartRate"] . "</td>     
                <td contenteditable>" .$row["Symptoms"] . "</td> 
                <td>Click to view</td>
                <td>Click to email</td>
                <td>Download now</td>
              
                </tr>";



    


            }
           
            

            

            

            //<tr>
            //    <td>05/11/2021</td>
            //    <td>7:56 AM</td>
            //    <td>None</td>
            //    <td>70 BPM</td>
            //    <td>None</td>
            //    <td>Click to view</td>
            //    <td>Click to email</td>
            //   <td>Download now</td>
            //</tr>

            //<tr>
            //    <td>07/20/2021</td>
            //    <td>8:05 AM</td>
            //    <td>None</td>
            //    <td>60 BPM</td>
            //    <td>Atrial Fibrillation</td>
            //    <td>Click to view</td>
            //    <td>Click to email</td>
            //    <td>Download now</td>
            //</tr>

            ?>
        </table>

     <?php //   <form action="upload.php" method="post" enctype="multipart/form-data">
//<label for="file">Filename:</label>
//<input type="file" name="file" id="file" />
//<br />
//<input type="submit" name="submit" value="Submit" />
//</form>
?>

    
        <!-- Add this to every HTML document-->
        <footer>
        
            <div class="footer-down">
                Copyright &copy; 2022 QoLT
            </div>
        </footer>
        <!-- ...to here... -->

    </body>
</html>