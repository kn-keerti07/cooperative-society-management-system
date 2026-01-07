<?php include('meta_tags.php');  ?>

<?php include('menus.php');  ?>

    
 <?php include('side_menu.php');  ?>
    
    <div class="content">
        
 <div class="header">
            
            <h1 class="page-title">Account Holder Details</h1>
 </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="accountholderdet_form.php" class="btn btn-primary"><i class="icon-plus"></i> Add New Account Holder Details</a>
   
    <div class="btn-group">
  </div>
</div>

<div class="well">
    <table class="table" id="demo-dtable-01">
    <thead>
    <tr>
      <th>Sl No</th>
      <th>Full_name</th>
      <th>DOB</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Email_id</th>
      <th>Contact_no</th>
    
      <th>Account_no</th>
      <th>Create_date</th>
      <th>Photo</th>
  
      <th>Action</th>
      <th>Action</th>
    </tr>
	</thead>
	<tbody>
	<?php
  include('../dbconnect/db.php');
  $sl=1;
  $sql="select * from account_holder";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
  ?>
    <tr>
      <td><?php echo $sl++;?></td>
      <td><?php echo $row['full_name'];?></td>
      <td><?php echo $row['date_of_birth'];?></td>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['address'];?></td>
      <td><?php echo $row['email_id'];?></td>
      <td><?php echo $row['contact_no'];?></td>
     
      <td><?php echo $row['account_no'];?></td>
      <td><?php echo $row['create_date'];?></td>
      <td><?php echo $row['accountholder_photo'];?></td>
      
      <td><a href="accountholderdet_delete.php?id=<?php echo $row['accountholder_id'];?>" onClick="return confirm('Are you sure want to delete?')">Delete</a></td>
      <td><a href="accountholderdet_edit.php?id=<?php echo $row['accountholder_id'];?>">Edit</a></td>
    </tr>
	<?php
  }
  ?>
  </tbody>
  </table>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>


                    
 <?php include('footer.php');  ?>





