<!DOCTYPE html>
<html lang="en">

<head>
	
	<title></title>
</head>
<body>
	
<?php 

include("conn.php");

global $connection;
$assigneduser='';
$sql = "select * from assigned";
$result =mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($result))
{
$assigneduser .= '<option value="'.$row['id'].'">'.$row['assignedUsers'].'</option>'; 
}


?>


<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addnew.php">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-10">
						<input type="text"  name="fname" class="form-control" placeholder="Enter Name">
						</div>
					</div>
					<div style="height:20px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Contact:</label>
						</div>
						<div class="col-lg-10">
						<input type="tel" name="contact" id="phone"   class="form-control" placeholder="Enter Contact" required>
						</div>
					</div>
					<div style="height:20px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Email:</label>
						</div>
						<div class="col-lg-10">
						<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Fill your correct email-id" required>
						<span id="msg" style="position:absolute"></span>
					</div>
						
					</div>
                    <div style="height:20px;"></div>
                    <div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Website:</label>
						</div>
						<div class="col-lg-10">
							
						<input type="url" name="webaddress" class="form-control" placeholder="Enter Address" required >
						</div>
					</div>
                    <div class="row">
                    <div style="height:20px;"></div>
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Category:</label>
						</div>
						<div class="col-lg-10">
						<input type="text" name="category" class="form-control" placeholder="Enter Category" requird >
						</div>
					</div>
                    <div class="row">
                    <div style="height:20px;"></div>
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Description:</label>
						</div>
						<div class="col-lg-10">
						<input type="text" name="description" class="form-control" placeholder="Enter Description" required>
						</div>
					</div>
					<div class="row">
                    <div style="height:20px;"></div>
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Assigned User:</label>
						</div>
						<div class="col-lg-10">
						<select name="assignedUser" id="assignedUser" class="form-control" >
						<option value="" selected="true">select</option>
						<?php echo $assigneduser;?>
						</select>
						</div>
					</div>
                   
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="insertdata" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
 
            </div>
        </div>
    </div>

	</body>
</html>
<script type="text/javascript"> 
 $(document).ready(function()
 {  
      $('#email') .keyup(function(){  
           var email = $('#email').val();  
           if(email== "")
          {
                $("#msg").fadeOut();
           }
           else
           {
                $.ajax({
                          url: "checkemail.php",
                          method: "POST",
                          data:{email:email},
                          success: function(data)
                          {
                               $("#msg").fadeIn().html(data);
                          }
                     });
           }

     }); 
             
 });  



            
 </script> 