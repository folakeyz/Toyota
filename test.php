<?php
require_once 'HTTP/Request2.php';

$subscriptionKey = "8a37f269a10a4d17be3cdc877d6c1e2e";
//$accountId = "c19e12c5-7178-4db9-b873-3e97c5f30d81";
$accountId="7b0c8d10-a05e-4873-9947-5e5003306699";
$location ="westeurope";

//echo accesstoken();
//echo searchvideo();
//$res=json_decode(searchvideo($faceid), true);

//print_r($res[results]);



/**foreach ($res['results'] as $rows) {    
		
			echo $rows['accountId']."\n";
			echo $rows['id'];
}**/

function accesstoken(){
		$request = new Http_Request2('https://api.videoindexer.ai/Auth/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/AccessToken?allowEdit=true');
		$url = $request->getUrl();

		$headers = array(
			// Request headers
			'x-ms-client-request-id' => '',
			'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
		);

		$request->setHeader($headers);

		$parameters = array(
			// Request parameters
			'allowEdit' => 'True',
		);

		$url->setQueryVariables($parameters);

		$request->setMethod(HTTP_Request2::METHOD_GET);

		// Request bodymm./'#

		$request->setBody("{body}");

		try
		{
			$response = $request->send();
		   $axtoken= $response->getBody();
		}
		catch (HttpException $ex)
		{
			echo $ex;
		}
		return $axtoken;
}

function searchvideo($faceid){
		
		$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Videos/Search?face='.$faceid.'&accessToken='.trim(accesstoken(),'"'));
		$url = $request->getUrl();

		$headers = array(
			// Request headers
			'x-ms-client-request-id' => '',
			'Ocp-Apim-Subscription-key' => $GLOBALS['subscriptionKey'],
		);

		$request->setHeader($headers);
/**
		$parameters = array(
			// Request parameters
			'sourceLanguage' => '{string}',
			'isBase' => '{boolean}',
			'hasSourceVideoFile' => '{boolean}',
			'sourceVideoId' => '{string}',
			'state' => '{array}',
			'privacy' => '{array}',
			'id' => '{array}',
			'partition' => '{array}',
			'externalId' => '{array}',
			'owner' => '{array}',
			'face' => '{array}',
			'animatedcharacter' => '{array}',
			'query' => '{array}',
			'textScope' => '{array}',
			'language' => '{array}',
			'pageSize' => '25',
			'skip' => '0',
			'accessToken' => '{string}'
		);

		$url->setQueryVariables($parameters);
**/
		$request->setMethod(HTTP_Request2::METHOD_GET);

		// Request body
		$request->setBody("{body}");

		try
		{
			$response = $request->send();
			$searchresult= $response->getBody();
		}
		catch (HttpException $ex)
		{
			echo $ex;
		}
		return $searchresult;
}

function getvideothumbnail($videoId,$thumbnailId){
	
	$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Videos/'.$videoId.'/Thumbnails/'.$thumbnailId.'?format=Base64&accessToken='.trim(accesstoken(),'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
	
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'format' => 'Jpeg',
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);
**/

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    $thumbid=$response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $thumbid;
	
}

function getvideoaccesstoken($videoId){
		$request = new Http_Request2('https://api.videoindexer.ai/Auth/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Videos/'.$videoId.'/AccessToken?allowEdit=true');
			$url = $request->getUrl();

			$headers = array(
				// Request headers
				'x-ms-client-request-id' => '',
				'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
			);

			$request->setHeader($headers);

/**			$parameters = array(
				// Request parameters
				'allowEdit' => '{boolean}',
			);

			$url->setQueryVariables($parameters); **/

			$request->setMethod(HTTP_Request2::METHOD_GET);

			// Request body
			$request->setBody("{body}");

			try
			{
				$response = $request->send();
				$gvat=$response->getBody();
			}
			catch (HttpException $ex)
			{
				echo $ex;
			}
			return $gvat;
}

function getvideoplayerwidget($videoId,$getvidtoken){
		$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Videos/'.$videoId.'/PlayerWidget?accessToken='.trim($getvidtoken,'"'));
		$url = $request->getUrl();
		
		$headers = array(
			// Request headers
			'x-ms-client-request-id' => '',
			'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
		);

		$request->setHeader($headers);

	/**	$parameters = array(
			// Request parameters
			'accessToken' => '{string}',
		);

		$url->setQueryVariables($parameters);**/

		$request->setMethod(HTTP_Request2::METHOD_GET);

		// Request body
		$request->setBody("{body}");

		try
		{
			$response = $request->send();
			$gvpw=$response->getBody();
		}
		catch (HttpException $ex)
		{
			echo $ex;
		}
		//return $gvpw;
		return $url;
}

function getvideoinsightswidget($videoId,$getvidtoken){

$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Videos/'.$videoId.'/InsightsWidget?widgetType=People&allowEdit=true&accessToken='.trim($getvidtoken,'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'widgetType' => '{array}',
    'allowEdit' => 'False',
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);**/

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $url;
}

function createperson($personmodelid,$name){
    
    $request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Customization/PersonModels/'.$personmodelid.'/Persons?name='.$name.'&accessToken='.trim(accesstoken(),'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);**/

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    $cp=$response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $cp;
}


function createcustomface($personmodelid,$personid){
	$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Customization/PersonModels/'.$personmodelid.'/Persons/'.$personid.'/Faces?accessToken='.trim(accesstoken(),'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);**/

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    $ccf=$response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $ccf;	
}

function getpersons($personmodelid){
	$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Customization/PersonModels/'.$personmodelid.'/Persons?accessToken='.trim(accesstoken(),'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'namePrefix' => '{string}',
    'pageSize' => '25',
    'skip' => '0',
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);**/

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    $gp=$response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $gp;
}

function getcustomfaces($personmodelid,$personid){
	$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Customization/PersonModels/'.$personmodelid.'/Persons/'.$personid.'/Faces?accessToken='.trim(accesstoken(),'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'pageSize' => '25',
    'skip' => '0',
    'sourceType' => '{string}',
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);**/

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
   $gcf=$response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $gcf;
}

function getcustomfacepicture($personmodelid,$personid,$faceid){
	$request = new Http_Request2('https://api.videoindexer.ai/'.$GLOBALS['location'].'/Accounts/'.$GLOBALS['accountId'].'/Customization/PersonModels/'.$personmodelid.'/Persons/'.$personid.'/Faces/'.$faceid.'?accessToken='.trim(accesstoken(),'"'));
$url = $request->getUrl();

$headers = array(
    // Request headers
    'x-ms-client-request-id' => '',
    'Ocp-Apim-Subscription-Key' => $GLOBALS['subscriptionKey'],
);

$request->setHeader($headers);

/**$parameters = array(
    // Request parameters
    'accessToken' => '{string}',
);

$url->setQueryVariables($parameters);**/

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    $gcfp=$response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}
	return $gcfp;
}

?>
