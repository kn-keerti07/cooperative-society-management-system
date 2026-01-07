<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Payment  Details</h1>
    </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                  
<div class="well">
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php include('val.php');?>
<?php

include('../dbconnect/db.php');
$id=$_REQUEST['id'];

$sql="select * from account_holder where accountholder_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>
<?php

include('../dbconnect/db.php');
$id=$_REQUEST['id'];

$sql="select * from payments where payment_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>

<form name="form1" id="formID" method="post" action="paymentsdet_update.php">
<input type="hidden" value="<?php echo $row['payment_id'];?>" name="payment_id">

  <table width="454" border="0" align="center">
    
    <tr>
      <td width="193">ProductRequest_ID</td>
      <td width="245"><input name="productreq_id" class="validate[required,custom[onlyNumber]]" type="text" id="productreq_id" value="<?php echo $row['productreq_id'];?>"></td>
    </tr>
    <tr>
      <td>Bill_Amount</td>
      <td><input name="bill_amount" class="validate[required,custom[onlyNumber]]" type="text" id="bill_amount" value="<?php echo $row['bill_amount'];?>"></td>
    </tr>
    <tr>
      <td>Transaction_ID</td>
      <td><input name="transaction_id" class="validate[required,custom[onlyNumber]]" type="text" id="transaction_id" value="<?php echo $row['transaction_id'];?>"></td>
    </tr>
    <tr>
      <td>Transaction_Type</td>
      <td><input name="transaction_type" class="validate[required,custom[onlyLetter]]" type="text" id="transaction_type" value="<?php echo $row['transaction_type'];?>"></td>
    </tr>
    <tr>
      <td>Transaction_Date</td>
      <td><input name="transaction_date" class="validate[required]" type="date" id="transaction_date" value="<?php echo $row['transaction_date'];?>"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
        <input type="reset" class="btn btn-danger" name="reset" value="reset">
      </div></td>
    </tr>
  </table>
</form>
</div>
  </div>

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
      

