<?php
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php"; 
require_once 'WindowsAzure/WindowsAzure.php';
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Blob\Models\SetBlobPropertiesOptions;
use WindowsAzure\Blob\Models\ListBlobsOptions;
try {
    $containerName = "cctv";
   $connectionString = 'DefaultEndpointsProtocol=https;AccountName=admincctv;AccountKey=JjGDNXyH9SKKDfm9scZNqObPLsxh0u0420pmECu5mPkRP9+aysjneTSf3F6jijGiym8bBYENLGXJvQZz5/5wxw==';
    $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString); 
    $nextMarker = "";
    $counter = 1;
do {
    $listBlobsOptions = new ListBlobsOptions();
    $listBlobsOptions->setMarker($nextMarker);
    $blob_list = $blobRestProxy->listBlobs($containerName, $listBlobsOptions);
    $blobs = $blob_list->getBlobs();
    $nextMarker = $blob_list->getNextMarker();
    foreach($blobs as $blob) {
        echo $blob->getUrl()."\n";
        $counter = $counter + 1;
    }
    echo "NextMarker = ".$nextMarker."\n";
    echo "Files Fetched = ".$counter."\n";
} while ($nextMarker != "");
echo "Total Files: ".$counter."\n";
}
catch(Exception $e){
$code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}  
?>
