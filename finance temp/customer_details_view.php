<?php include('meta_tags.php');  ?>

<?php include('menus.php');  ?>

    
 <?php include('side_menu.php');  ?>
    
    <div class="content">
        
 <div class="header">
            
            <h1 class="page-title">Customer Details</h1>
        </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="customer_details.php" class="btn btn-primary"><i class="icon-plus"></i> Add New Customere Details</a>
   
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table" id="demo-dtable-01">
  <thead>
  <tr>
    <th>S NO </th>
    <th>Customer full name </th>
    <th>Gender</th>
    <th>Occupation</th>
    <th>Address</th>
    <th>City</th>
    <th>Email id </th>
    <th>Contact no </th>
    <th>Customer code </th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
   </thead>
    <tbody>
  <?php
    include('dbconnect.php');
	$sn=1;
	$sql="select * from customer_details";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res))
	{
  ?>
  <tr>
    <td><?php echo $sn++;?></td>
    <td><?php echo $row["customer_full_name"];?></td>
    <td><?php echo $row["gender"];?></td>
    <td><?php echo $row["occupation"];?></td>
    <td><?php echo $row["address"];?></td>
    <td><?php echo $row["city"];?></td>
    <td><?php echo $row["email_id"];?></td>
    <td><?php echo $row["contact_no"];?></td>
    <td><?php echo $row["customer_code"];?></td>
    <td><a href="customer_details_edit1.php?customer_id=<?php echo $row['customer_id'];?>" onClick="return confirm('are you sure want to edit this?')">Edit</a></td>
    <td><a href="customer_details_delete.php?customer_id=<?php echo $row['customer_id'];?>" onClick="return confirm('are you sure want to delete this?')">Delete</a></td>
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





