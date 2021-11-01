

<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($connection,"select * from user where userid='".$row['userid']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Are you sure to delete <strong><?php echo ucwords($drow['name'].' '.$row['contact']); ?></strong> from the list?</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?id=<?php echo $row['userid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
 
            </div>
        </div>
    </div>
<!-- /.modal -->
 
<!-- Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				
				<div class="container-fluid">
				<form method="" action="">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Name:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" id="name" name="fname" class="form-control">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Contact:</label>
						</div>
						<div class="col-lg-10">
							<input type="int" id="contact" name="contact" class="form-control" >
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Email:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" id="email" name="email" class="form-control" >
						</div>
					</div>

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Website:</label>
						</div>
						<div class="col-lg-10">
							<input type="text"  id="webaddress" name="webaddress" class="form-control">
						</div>
					</div>

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Category:</label>
						</div>
						<div class="col-lg-10">
							<input type="text"  id="category" name="category" class="form-control" >
						</div>
					</div>

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Description:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" id="description" name="description" class="form-control" >
						</div>
					</div>
					<div class="row">
                    <div style="height:20px;"></div>
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Assigned User:</label>
						</div>
						<div class="col-lg-10">
						<select name="assignedUser" id="assignedUser" class="form-control" >
							<option value="">Select</option>
								<?php echo $assigneduser; ?>
						</select>
						</div>
					</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="button" id="updateButton" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</button>
                </div>
				</form>
            </div>
        </div>
    </div>