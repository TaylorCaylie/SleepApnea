<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="AI Platform to Monitor Heart Health">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet"> 

        <!-- Redundant style sheet, so i commented it out-->
        <!--<link rel="stylesheet" href="../static/css/styles.css"> -->

        
        <link rel="stylesheet" href="../static/css/dashboard_style.css">

        <title>Physician Portal</title>
    </head>
    <body>
        <header>
            <nav>
                <ul class="nav__links">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="patient.html">Patient</a></li>
                    <li><a href="physician.html" class="activePage">Physician</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <a href="base.html">Sign Up</a>
        </header>
        <div class = "header">  <h1> Dr.X's Report</h1> </div>
        <table id="phys_table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Reading (Date-Time)</th>
                    <th>Auto Detected Arrhythmias</th>
                    <th>Heart Rate</th>
                    <th>View Symptoms</th>
                    <th>View Report</th>
                    <th>Viewed</th>
                    <th>Additional  Details and notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kyle</td>
                    <td>2/18/22-9:15</td>
                    <td>No</td>
                    <td>124 BPM</td>
                    <td>Heart Racing</td>
                    <td><a href=#>View Report </a></td>
                    <td>No</td>
                    <td>Bad</td>
                
                </tr>
                <tr>
                    <td>Jim</td>
                    <td>2/18/22-9:15</td>
                    <td>Yes</td>
                    <td>123 BPM</td>
                    <td>None</td>
                    <td><a href=#>View Report </a></td>
                    <td>Yes</td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td>Bob</td>
                    <td>2/18/22-9:15</td>
                    <td>No</td>
                    <td>124 BPM</td>
                    <td>Heart Racing</td>
                    <td><a href=#>View Report </a></td>
                    <td>No</td>
                    <td>Bad</td>
                
                </tr>
                <tr>
                    <td>Dan</td>
                    <td>2/18/22-9:15</td>
                    <td>Yes</td>
                    <td>123 BPM</td>
                    <td>None</td>
                    <td><a href=#>View Report </a></td>
                    <td>Yes</td>
                    <td>Good</td>
                </tr>
                <!-- and so on... -->
            </tbody>
        </table>

        <footer>
        
            <div class="footer-down">
                Copyright &copy; 2022 QoLT
            </div>
        </footer>
    </body>
</html>