<?php
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php"; 

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;


$connectionString = 'DefaultEndpointsProtocol=https;AccountName=admincctv;AccountKey=JjGDNXyH9SKKDfm9scZNqObPLsxh0u0420pmECu5mPkRP9+aysjneTSf3F6jijGiym8bBYENLGXJvQZz5/5wxw==';

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$blobContainer='cctv';

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$key = 'Lagos_Jakande';
    $blobListOptions = new ListBlobsOptions();
    $blobListOptions->setPrefix($key);
   // $blobListOptions->setDelimiter("/");

    $blobList = $blobRestProxy->listBlobs($blobContainer, $blobListOptions);

    foreach($blobList->getBlobPrefixes() as $key => $blob) {
        echo "BlobPrefix ".$key.": \t".$blob->getUrl()."\n";
    }

    foreach($blobList->getBlobs() as $key => $blob) {
        echo "Blob ".$key.": \t".$blob->getUrl()."\t(".$blob->getUrl().")\n";
    }