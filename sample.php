<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FBN</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     
 <link rel="stylesheet" href="fbn.css">
 <script
  src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <div class="dashboard">
    <div class="azure-nav" style="float: left;height:100vh;position: fixed;">
     <div class="clicks">
        <a href="page.php">
    Dashboard
      </a>
     </div>
    </div>
       <div class="azure-content" style="float:left;width: 80%;margin-left: 15%;">
      <div class="content-nav">
         <div class="c-left">
            <img src="img/firstbank3.png" alt="FCMB Logo">
            <p><b></b></p> 
            <b id="txt"><p></p></b>
         </div>
         <div class="c-right">
             <div class="image">
                 
             </div>
             <p>Welcome<br>
             <b></b>
             
             </p>
             <a><i class="fa fa-caret-down"></i></a>
         </div>
          
      </div> 
       <div class="video-content one">
<div style="width:100%;height: 100px;">
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group col-md-12">
        <div class="col-md-4 float-left">
         <input type="text" class="form-control" placeholder="Enter Face ID" name="faceid">   
        </div>
             <div class="col-md-4 float-left">
         <input type="submit" class="btn btn-sm btn-info form-control" placeholder="Enter Face ID" value="Find">   
        </div>
    </div>
</form> 
</div>

  <table class="table table-striped table-bordered ">
    <thead>
        <th>Face ID</th>
        <th>View</th>
       
    </thead> 
    <tbody>
        <tr>
            <td></td>
            <td><a href="" class="btn btn-sm btn-info">View</a></td>
        
        </tr>
    </tbody> 
  </table>
  
    </div>
       </div>
    </div>
</body>
</html>
