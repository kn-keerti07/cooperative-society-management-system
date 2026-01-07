
<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Transaction  Details</h1>
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

$sql="select * from transaction where transaction_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>

<form name="form1" id="formID" method="post" action="transactiondet_update.php">
<input type="hidden" value="<?php echo $row['transaction_id'];?>" name="transaction_id">

  <div align="center">
    <table width="514" border="0">
      
      <tr>
        <td width="236">Transaction_Type</td>
        <td width="262"><input name="transaction_type" class="validate[required,custom[onlyLetter]]" type="text" id="transaction_type" value="<?php echo $row['transaction_type'];?>"></td>
      </tr>
      <tr>
        <td>AccountHolder_ID</td>
        <td><input name="accholder_id" class="validate[required,custom[onlyNumber]]" type="text" id="accholder_id" value="<?php echo $row['accountholder_id'];?>"></td>
      </tr>
      <tr> 
        <td height="33">Amount</td>
        <td><input name="amount" class="validate[required,custom[onlyNumber]]" type="text" id="amount" value="<?php echo $row['amount'];?>"></td>
      </tr>
      <tr>
        <td>Date</td>
        <td><input name="date" class="validate[required]" type="date" id="date" value="<?php echo $row['date'];?>"></td>
      </tr>
      <tr>
        <td>Time</td>
        <td><input name="time" class="validate[required]" type="text" id="time" value="<?php echo $row['time'];?>"></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
          <input type="reset" class="btn btn-danger" name="reset" value="reset">
        </div></td>
      </tr>
      </table>
  </div>
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
      


