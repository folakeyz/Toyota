<?php
include'inc/head.php'; 
include'inc/navbar.php'; 
require'inc/dbh.inc.php'; 

?>
<script src="js/canvasjs.min.js"></script>
     <div class="three-boxes">
         <div class="boxes">
          <div class="l-box">
              <div class="circle text-center">
                  <i class="fa fa-upload"></i>
              </div>  
            </div> 
             <div class="r-box">
                <p><b>Total Uploaded Content</b></p>
                <?php //include'blobs/AzureList.php';  
                 $check = "SELECT * FROM `videos`";
                 $result=mysqli_query($conn, $check);
                 $counter=mysqli_num_rows($result);
                 ?>
                
                
                <h3><b><?=$counter;?></b></h3>
            </div> 
         </div>
         <div class="boxes">
              <div class="l-box">
              <div class="circle text-center">
                  <i class="fa fa-spinner"></i>
              </div>  
            </div> 
             <div class="r-box">
                <p><b>Available Branches</b></p>
                <?php //include'blobs/AzureList.php';  
                 $check6 = "SELECT * FROM `location`";
                 $result6=mysqli_query($conn, $check6);
                 $counter6=mysqli_num_rows($result6);
                 ?>
                <h3><b><?=$counter6;?></b></h3>
            </div> 
         </div>
         <div class="boxes">
              <div class="l-box">
              <div class="circle text-center">
                  <i class="fa fa-video"></i>
              </div>  
            </div> 
             <div class="r-box">
                <p><b>Videos</b></p>
                <?php
                 $vid=".mp4";
                  $check2 = "SELECT * FROM `videos` WHERE `name` LIKE '%$vid%'";
                 $result2=mysqli_query($conn, $check2);
                 $counter2=mysqli_num_rows($result2);
                 ?>
                <h3><b><?=$counter2;?></b></h3>
            </div> 
         </div>
          <div class="boxes">
              <div class="l-box">
              <div class="circle text-center">
                  <i class="fa fa-image"></i>
              </div>  
            </div> 
             <div class="r-box">
                <p><b>Total Camera</b></p>
               <?php
                
                  $check3 = "SELECT * FROM `camera`";
                 $result3=mysqli_query($conn, $check3);
                 $counter3=mysqli_num_rows($result3);
                 ?>
                <h3><b><?=$counter3;?></b></h3>
            </div> 
         </div>
     </div>
     <div class="large-box">
         <div class="l-content">
              <?php
    $findvid = "SELECT * FROM `location` WHERE `id`=1";
    $vidresult=mysqli_query($conn, $findvid);
    $loc1=mysqli_fetch_assoc($vidresult);
    $venue=$loc1['location'];
             
               $findvid2 = "SELECT * FROM `location` WHERE `id`=2";
    $vidresult2=mysqli_query($conn, $findvid2);
    $loc2=mysqli_fetch_assoc($vidresult2);
    $venue2=$loc2['location'];
   $lagos = $venue;
    $abuja = $venue2;
    $sql3 = "SELECT * FROM videos WHERE name LIKE '%$lagos%' ";
    $result1s = $conn->query($sql3);
    $mresult = mysqli_num_rows($result1s);
    $sql4 = "SELECT * FROM videos WHERE name LIKE '%$abuja%'";
    $result2s = $conn->query($sql4);
    $mresult2 = mysqli_num_rows($result2s);
       
$dataPoints = array( 
	array("label"=>$venue, "y"=>$mresult),
	array("label"=>$venue2, "y"=>$mresult2)
);
             $mp4="mp4";
             $jpg="jpg";
    $sql7 = "SELECT * FROM videos WHERE name LIKE '%$lagos%' AND url LIKE '%$mp4%' ";
    $result7 = $conn->query($sql7);
    $mresult7 = mysqli_num_rows($result7);
    $sql8 = "SELECT * FROM videos WHERE name LIKE '%$abuja%' AND url LIKE '%$mp4%'";
    $result8 = $conn->query($sql8);
    $mresult8 = mysqli_num_rows($result8);
     $sql9 = "SELECT * FROM videos WHERE name LIKE '%$abuja%' AND url LIKE '%$jpg%'";
    $result9 = $conn->query($sql9);
    $mresult9 = mysqli_num_rows($result9);
    $sql10 = "SELECT * FROM videos WHERE name LIKE '%$abuja%' AND url LIKE '%$jpg%'";
    $result10 = $conn->query($sql10);
    $mresult10 = mysqli_num_rows($result10);
    $dataPoints2 = array( 
	array("label"=>$venue, "y"=>$mresult7),
	array("label"=>$venue2, "y"=>$mresult8)
)
 
?>

<div id="chartContainer"></div>
<div id="chartContainer2"></div>
       
<script>
    window.onload = function() {
        var chart2 = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            backgroundColor: false,
            theme: "light2",
            title: {
                text: "Total Blobs in Storage",
                fontSize: 15
            },
            subtitles: [{
                text: "<?=$venue;?>/<?=$venue2;?>"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "####",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
            }]
        });
        chart2.render();

        var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            backgroundColor: false,
            theme: "light2",
            title: {
                text: "Thumbnails and Videos in Storage",
                fontSize: 20
            },

            axisY: {
                title: ""
            },
            data: [{
                type: "column",
                yValueFormatString: "#### Files",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>,
            }]
        });

        chart.render();
    }
</script> 
         </div>
     </div>
   <?php
   include'upload.php';
include'inc/footer.php'; ?>