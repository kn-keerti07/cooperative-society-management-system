<?php include('meta_tags.php');  ?>
<style>
.action-link, .action-delete {
  display: inline-block;
  padding: 6px 12px;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}



.action-delete {
  background-color: #6c757d; /* grey button for delete */
  color: #fff;
  border: 1px solid #6c757d;
}

.action-delete:hover {
  background-color: #b30000; /* red on hover */
  color: #fff;
}

.action-link i, .action-delete i {
  margin-right: 6px;
}
</style> 

<?php include('menus.php');  ?>

    
 <?php include('side_menu.php');  ?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    
    <div class="content">
        
 <div class="header">
            
            <h1 class="page-title">Product Request Details</h1>
 </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    
    <div class="btn-group">
  </div>
</div>
<!-- Back to Admin Dashboard Button -->
      <a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
      </a>
<div class="well">
    <table class="table" id="demo-dtable-01">
    <thead>
    <tr>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</div></th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Image</th>
	  <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Name</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Account No</th>
	  <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Accountholder Name</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Quantity</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Request_Date</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Request_Status</th>
     <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
    </tr>
	</thead>
	<tbody>
	<?php
  include('../dbconnect/db.php');
  $sl=1;
  $uname=$_SESSION['uname'];
  $sql="select * from product_request pr, products p,account_holder ah where pr.product_id=p.product_id and ah.account_no=pr.account_no and pr.account_no='$uname'";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
  ?>
      <tr>
      <td><?php echo $sl++;?></td>
      <td><img src="../uploads/<?php echo $row['product_image'];?>" width="100" height="80"></td>
	  <td><?php echo $row['product_name'];?></td>
	  <td><?php echo $row['account_no'];?></td>
      <td><?php echo $row['full_name'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['request_date'];?></td>
      <td><?php echo $row['request_status'];?></td>
      <td>
<a href="productrequestdet_delete.php?id=<?php echo $row['productreq_id']; ?>" class="action-delete" onClick="return confirm('Are you sure want to delete?')">
                    <i class="fas fa-trash"></i> Delete
                  </a>    </tr>
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
        <button class="btn btn-danger"  data-dismiss="modal">Delete</button>
    </div>
</div>


                    
 <?php include('footer.php');  ?>





