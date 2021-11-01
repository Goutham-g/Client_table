<?php 
include("conn.php");
global $connection;
session_start();
$assigneduser='';
$sql = "SELECT * from assigned ";
$result =mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($result))
{
$assigneduser .= '<option value="'.$row['id'].'" selected="true">'.$row['assignedUsers'].'</option>'; 
}						
?>

<!DOCTYPE html>
<html>
<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
<div class="well" style="margin:auto; padding:auto; width:110%;">
		<div class="row">

			<div class="col-md-12 mt-4">

					

<hr>








<div class="container">
	<?php
	if(isset($_SESSION['status']))
	{ ?>		
		<div class="text-center">
			<p>
				<?php echo $_SESSION['status']; 
				unset($_SESSION['status']); ?>
			</p>
		</div>
	<?php } ?>
	<!-- <div class="well" style="margin:auto; padding:auto; width:100%;"> -->
	<span style="font-size:25px; color:blue"><center><strong>Client Records</strong></center></span>	
		<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
		<span class="pull-right">
			<form action="code.php" method="POST" enctype="multipart/form-data">
			Select file :<input type="file" name="import_file" /><br><button type="submit" name="import_button" class="btn btn-success">Upload / Import </button>
			</form>
		</span>
		<table table-layout="fixed"   class="table table-striped table-hover table-bordered" style="margin-top:1em;">
			<thead>
			    <th>Sl.No</th>
				<th>Name</th>
				<th>contact</th>
				<th>Email</th>
				<th>Website</th>
				<th>Category</th>
				<th>Description</th>
				<th>Assigned</th>
				<th>Action</th>				
			</thead>
			<tbody>
			<?php
				include('conn.php');
				global $connection;
				// Display query
				$query = "SELECT user.userid,user.name,user.contact ,user.email,user.webaddress ,user.category ,user.description,
						assigned.assignedUsers
						FROM user 
						INNER JOIN assigned ON user.assigned=assigned.id";
				$result = mysqli_query($connection,$query);
				$i=1;
				while($row=mysqli_fetch_array($result)){
					$usser = $row['userid'];
					
					?>
					<tr id="<?php echo $row['userid']; ?>">
					    <td><?php echo $i; ?></td>
						<td data-target="name"><?php echo ucwords($row['name']); ?></td>
						<td data-target="contact"><?php echo ucwords($row['contact']); ?></td>
						<td data-target="email"><?php echo $row['email']; ?></td>
						<td data-target="webaddress"><?php echo $row['webaddress']; ?></td>
						<td data-target="category"><?php echo $row['category']; ?></td>
						<td data-target="description"><?php echo $row['description']; ?></td>
						<td data-target="assignedUsers"><?php echo $row['assignedUsers']; ?></td>
						<td>
							<a href="#edit<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a> 
							<a href="#del<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i></a>
							<?php include('button.php'); ?>
						</td>
						<!-- <td>
						<a href='#' id="" data-id= <?php echo $row['userid'] ?> data-role='update' class='btn btn-success'><span class='fa fa-edit'></span></a></td>
							
						</td> -->
					</tr>
					
					<?php
					$i++;
				}
 
			?>
			</tbody>
		</table>
	</div>
	<?php include('add_modal.php'); ?>
</div>
</body>
<script>
// $(document).ready(function(){
//     $(document).on('click','a[data-role=update]', function(){
// 		// alert("hai");
//         var userId = ($(this).data('id'));
		
//         var name = $('#'+userId).children('td[data-target=name]').text();
//         var contact    = $('#'+userId).children('td[data-target=contact]').text();
//         var email   = $('#'+userId).children('td[data-target=email]').text();
// 		var webaddress = $('#'+userId).children('td[data-target=webaddress]').text();
//         var category    = $('#'+userId).children('td[data-target=category]').text();
//         var description   = $('#'+userId).children('td[data-target=description]').text();
// 		var assignedUsers   = $('#'+userId).children('td[data-target=assignedUsers]').text();

//         $('#userid').val(userId);
//         $('#name').val(name);
//         $('#contact').val(contact);
// 		$('#email').val(email);
//         $('#webaddress').val(webaddress);
//         $('#category').val(category);
// 		$('#description').val(description);
//         $('#assignedUser').val(assignedUsers);
//         $('#editModal').modal('toggle');
//     });
// });
// $('#updateButton').click(function()
// {
// 	// alert("checking");

//     var userid         = $('#userid').val();
//     var name   = $('#name').val();
//     var contact      = $('#contact').val();
//     var email     = $('#email').val();
// 	var webaddress         = $('#webaddress').val();
//     var category   = $('#category').val();
//     var description      = $('#description').val();
//     var assignedUser     = $('#assignedUser').val();

//     $.ajax({
//         url : "/table/edit.php",
//         method : "POST",
//         data : {userid:userid, name:name, contact:contact,email:email,webaddress:webaddress,category:category,description:description,assignedUser:assignedUser},
//         success :function(response)
//         {
//             // $('#'+id).children('td[data-target=fullname]').text(Fullname);
//             // $('#'+id).children('td[data-target=email]').text(Email);
//             // $('#'+id).children('td[data-target=mobile]').text(Mobile);         
		
// 			// $('#'+userId).children('td[data-target=name]').text(name);
// 			// $('#'+userId).children('td[data-target=contact]').text(contact);
// 			// $('#'+userId).children('td[data-target=email]').text(email);
// 			// $('#'+userId).children('td[data-target=webaddress]').text(webaddress);
// 			// $('#'+userId).children('td[data-target=category]').text(category);
// 			// $('#'+userId).children('td[data-target=description]').text(description);
// 			// $('#'+userId).children('td[data-target=assignedUsers]').text(assignedUser);
// 			// $('#editModal').modal('toggle');
//         }
//     });
// });
</script>