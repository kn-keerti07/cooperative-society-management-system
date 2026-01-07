<?php include('meta_tags.php');  ?>

<?php include('menus.php');  ?>

    
 <?php include('side_menu.php');  ?>
    
    <div class="content">
        
 <div class="header">
            
            <h1 class="page-title">Payment Details</h1>
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
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
	  <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Image</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Name</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Bill_amount</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction_id</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction_type</th>
      <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction_date</th>
    </tr>
	</thead>
	<tbody>
	<?php
  include('../dbconnect/db.php');
  $sl=1;
  $uname=$_SESSION['uname'];
  $sql="select * from payments p,product_request pr,products pp where p.productreq_id=pr.productreq_id and pp.product_id =pr.product_id  and pr.account_no='$uname'";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
  ?>
    <tr>
      <td><?php echo $sl++;?></td>
	  <td><img src="../uploads/<?php echo $row['product_image'];?>" width="200" height="120"></td>
      <td><?php echo $row['product_name'];?></td>
	  <td><?php echo $row['bill_amount'];?></td>
      <td><?php echo $row['transaction_id'];?></td>
      <td><?php echo $row['transaction_type'];?></td>
      <td><?php echo $row['transaction_date'];?></td>
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





