
<?php
include_once("connect_db.php");
$sym = $_GET['a'];

$sql = "SELECT * FROM Report WHERE idReport = '$sym'"; // CHANGE REPORTS HERE
            $result = $connection->query($sql);


            if(!$result)
            {
                die("Invalid query: " . $connection->error);
            }
            
?>
<form action=' ' method ='post'>


<?php while($row = $result->fetch_assoc()){ 
               
               echo "<tr>"
               ?>
                <td><input type="hidden" name =nm value ="<?php echo $row['idPatient']; ?>"></td>
                <td><input type="hidden" name =P value ="<?php echo $row['idReport']; ?>"></td>

              <td><input type="text" name =sy value ="<?php echo $row['Symptoms']; ?>"></td>
              <?php    
?>
<td><input type ="submit"  name='s' value="Update" ></td> 
<a href="physician.php">
<input type="button" value="Back to table" />
</a>
<?php

               "</tr>";
              

            }
            
            
    ?>

</form>
    <?php        

            
             
           
         
     
 if(isset($_POST['s']))
{

   $m = $_POST['sy'];
    $j = $_POST['nm'];
    $k = $_POST['P'];

    $Q = "update Report set symptoms ='$m' WHERE idReport = '$k'";

    $resultQ = $connection->query($Q);

    mysql_connect("localhost", "user", "root");
    mysql_select_db("SAdb");
    mysql_query($resultQ);
    
    
   // echo "<script>window.location.href='patient.php'</script>";
}
?>



