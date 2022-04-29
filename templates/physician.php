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
        <title>Physician Portal</title>
    </head>
    <body>
        <header>
            <nav>
                <ul class="nav__links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/patient" class="activePage">Patient</a></li>
                    <li><a href="/doctor">Physician</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
            <a href="/signin">Sign Up</a>
        </header>

        <h1> My Reports </h1>

        <table id="phys_table">
            <!-- tr defines a row of cells. Each cell can represent a report-->
            <!-- This first one = table header, which is defined by th= table header (i think) -->
            <tr> 
            <th>Patient</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Auto Detected Arrhythmias</th>
                    <th>Heart Rate</th>
                    <th>View Symptoms</th>
                    <th>View Report</th>
                    <th>Viewed</th>
                    <th>Update</th>
            </tr>
            
            <!--1. Make editable text box, that has a text limit, that stores the text in the database: reports table, in the symptoms column--> 

            <form action="insert.php" method="post" id="symptoms_form"></form>


         




            <?php
            // DATABASE OPERATIONS HERE
            // auht0 connection flow: User signs in, gets their token. Use the sub-claim for that token, add it to the patient database, and then retreive the user id (that Pat made) from that patient,
            // and then display the reports based on what user id is logged in.
            
            // GOES HERE

            // Read all the rows from the database table
            $sql = "SELECT r.HeartRate, r.idReport, r.Symptoms, r.AutoDetected, r.NumberOfEpisodes, r.Date, r.Time, p.FirstName, p.LastName 
            FROM Patient AS p, Report AS r
            WHERE p.idPatient =r.idPatient" ; // CHANGE REPORTS HERE
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
                <td>" . $row["FirstName"] . "</td> 
                <td>" . $row["Date"] . "</td> 
                <td>" . $row["Time"] . "</td> 
                <td>" . $row["AutoDetected"] . "</td> 
                <td>" . $row["HeartRate"] . "</td> 
                <td>" . $row["Symptoms"] . "</td> 
                <td><a href=#>View Report </a></td>
                <td><a href=#>No </a></td>"



                
                ?>
                <td><a href="update.php?a=<?php echo $row['idReport']; ?>">Update Report</a></td>
                <?php
                "</tr>";

            ?>
        </table>

        <a href="insert.php">
   <input type="button" value="Insert New Record" />
   </a>
   
    
        <!-- Add this to every HTML document-->
        <footer>
        
            <div class="footer-down">
                Copyright &copy; 2022 QoLT
            </div>
        </footer>
        <!-- ...to here... -->

    </body>
</html>