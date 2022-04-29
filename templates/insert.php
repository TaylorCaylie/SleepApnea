
<?php
include_once("connect_db.php");
//$sym = $_GET['a'];

$sql = "SELECT * FROM Report WHERE idReport = '$sym'"; // CHANGE REPORTS HERE
            $result = $connection->query($sql);


            if(!$result)
            {
                die("Invalid query: " . $connection->error);
            }
            
?>
<form action=' ' method ='post'>


<?
               
               echo "<tr>"
               ?>
                <td><input type="text" name =id value ="<?php echo "Patient ID"; ?>"></td>
                <td><input type="text" name =ht value ="<?php echo "Heart Rate"; ?>"></td>
                <td><input type="text" name =sym value ="<?php echo "Symptoms"; ?>"></td>
                <td><input type="text" name =ad value ="<?php echo "AutoDetected"; ?>"></td>
                <td><input type="text" name =eps value ="<?php echo "Number Of Episodes"; ?>"></td>
                <td><input type="text" name =date value ="<?php echo "Date"; ?>"></td>
                <td><input type="text" name =time value ="<?php echo "Time"; ?>"></td>
              <?php    
?>
<td><input type ="submit"  name='s' value="Update" ></td> <?php
?>
<a href="physician.php">
   <input type="button" value="Back to table" />
   </a>
   <?php

               "</tr>";
              

            
            
            
    ?>

</form>
    <?php        

            
             
           
         
    
 if(isset($_POST['s']))
{

   $ht= $_POST['ht'];
   $id= $_POST['id'];
    $sym= $_POST['sym'];
    $ad= $_POST['ad'];
    $eps= $_POST['eps'];
    $date= $_POST['date'];
    $time= $_POST['time'];


    $Q = "Insert INTO Report (HeartRate, symptoms, AutoDetected, NumberOfEpisodes, idPatient, date, time)
    VALUES ('$ht', '$sym','$ad','$eps','$id','$date','$time');";

    $resultQ = $connection->query($Q);

    mysql_connect("localhost", "user", "root");
    mysql_select_db("SAdb");
    mysql_query($resultQ);
    
    
  //  echo "<script>window.location.href='patient.php'</script>";
}

    
?>