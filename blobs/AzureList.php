<?php
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php"; 
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\BlobProperties;

try{
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=admincctv;AccountKey=JjGDNXyH9SKKDfm9scZNqObPLsxh0u0420pmECu5mPkRP9+aysjneTSf3F6jijGiym8bBYENLGXJvQZz5/5wxw==';

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$source_container="cctv";
 $nextMarker = "";
  $counter = 1;

do {
    // List blobs.
    $blob_list = new ListBlobsOptions();
    $blob_list->setMarker($nextMarker);
    $blob_list = $blobRestProxy->listBlobs($source_container, $blob_list);
    $blobs = $blob_list->getBlobs();
     $nextMarker = $blob_list->getNextMarker();
 
    
      foreach($blobs as $blob){

          
          $counter = $counter + 1;
    }
    //echo "NextMarker = ".$nextMarker."<br>";
    //echo "Files Fetched = ".$counter."<br>";
   
}
   while ($nextMarker != "");
//echo "Total Files: ".$counter."<br>"; 
}
catch(Exception $e){
$code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}  