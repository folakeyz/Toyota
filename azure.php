<?php
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php"; 

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;
use WindowsAzure\Common\ServicesBuilder;


$connectionString = 'DefaultEndpointsProtocol=https;AccountName=fbncctvacct;AccountKey=gWzFx7hIhGMmJqs2MsqZdxlh13wD/nnH4E4N0BE5kI/XfU/QfBZqOnrEUWO2lutKKZpiIDKrq6b5BIstqhJrNA==';

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$source_container="fbn-cctv";

try {
    // List blobs.
    $blob_list = $blobRestProxy->listBlobs($source_container);
    $blobs = $blob_list->getBlobs();
    
$nItemsPerPage = 5;
  $page = isset($_GET['page'])?$_GET['page']:1;
    $count=count($blobs);
      foreach(array_slice($blobs, $nItemsPerPage*($page-1), $nItemsPerPage) as $blob)
    {
      //  echo $blob->getName().": ".$blob->getUrl()."<br /><br />";
        
          // echo  $blobs->getUrl().'<br>';
echo'<div class="azures"><video controls>
  <source src="'.$blob->getUrl().'" type="video/mp4">
</video>
<p>'.$photo_name=strtolower($blob->getName()).'</p>
</div>';
//echo $rs=upload_own_image("raagaimg",$photo_name,$blob->getUrl());
        //echo "<br /><br />";
    }
   
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here: 
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}