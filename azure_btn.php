 <?php
        
   // echo 
 
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