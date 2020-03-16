<?php
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php"; 
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\BlobProperties;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\ContainerAcl;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

try{
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=toyotacctvstorageaccount;AccountKey=Z0tSLlnnuj42jupCGuAcqaxDXSmp3LtoFcXqYSSqcfX9XS/mgKATvfBtrfdkDvf4oZDcKuuME1KAeeeRxO1pUA==';

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$source_container="toyotacctvcontainer";
 $nextMarker = "";
  $counter = 1;
    
do {
    // List blobs.
    $blob_list = new ListBlobsOptions();
    $blob_list->setMarker($nextMarker);
    $blob_list = $blobRestProxy->listBlobs($source_container, $blob_list);
    $blobs = $blob_list->getBlobs();
     $nextMarker = $blob_list->getNextMarker();
 
    
    //  $nItemsPerPage = 5000;
  //$page = isset($_GET['page'])?$_GET['page']:1;
    //$count=count($blobs);
    echo '<form method="post" action="action.php" id="form">';
    echo'<p id="upload-info"></p>';
      foreach($blobs as $blob)
    {
    $props = $blob->getProperties();
  $props->getLastModified()->format('Y-m-d H:i:s');
 
 echo $url = $blob->getUrl().'<br>';
echo $photo_name=$blob->getName().'<br>';
$content = $props->getContentType();

$string = $photo_name;
$date = substr($string, -23);
$rtime = substr_replace($date, "", -13);
 $timestamp = substr($string, -12);
$timestamp2=substr_replace($timestamp, "", -4);
$rtime;
 $counter = $counter + 1;

echo'<input type="hidden" name="name[]" value="'.$photo_name.'" id="name">'; 
 echo'<input type="hidden" name="url[]" value="'.$url.'" id="url">';
 echo'<input type="hidden" name="date[]" value="'.$rtime.'" id="date">'; 
 echo'<input type="hidden" name="content[]" value="'.$content.'" id="content">'; 
 echo'<input type="hidden" name="time[]" value="'.$timestamp2.'">'; 
          
          
          
    }
 

   echo "NextMarker = ".$nextMarker."<br>";
   echo "Files Fetched = ".$counter."<br>";
   
}
while ($nextMarker != "");
//echo "Total Files: ".$counter."<br>"; 
     echo'<input type="hidden" name="count" value="'.$counter.'" id="count">'; 
 echo'<input type="submit" name="sub" class="btn" id="click">        
   </form>';

}

catch(Exception $e){
$code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}  
       

?>

<?php
include'inc/head.php'; 
?>

<script>
$(document).ready(function(){
 $('#click').click(function(){
       
    });
  // set time out 5 sec
     setTimeout(function(){
        $('#click').trigger('click');
    }, 3600000);
});
</script>

