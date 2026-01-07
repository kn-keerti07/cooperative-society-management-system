<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header"> 
  <h1 class="page-title"> Payment Details</h1>
    </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                  
<div class="well">
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php include('val.php');?>
<form name="form1" id="formID" method="post" action="paymentsdet_insert.php">
  <table width="454" border="0" align="center">
    
	
    <tr>
      <td width="193">ProductRequest_ID</td>
	  
      <td width="245"><select name="productreq_id" class="validate[required,custom[onlyNumber]]" id="productreq_id">
        <option value="select" selected>Select</option>
		<?php
  include('../dbconnect/db.php');
  $sql="select * from product_request";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
  ?>
  <option value="<?php echo $row['productreq_id'];?>"><?php echo $row['productreq_id'];?></option>
      
	  <?php
	  }
	  ?>
	  </select>      </td>
    </tr>
    <tr>
      <td>Bill_Amount</td>
      <td><input name="bill_amount" class="validate[required,custom[onlyNumber]]" type="text" id="bill_amount"></td>
    </tr>
    <tr>
      <td>Transaction_ID</td>
      <td><select name="transaction_id" class="validate[required,custom[onlyNumber]]" id="transaction_id">
        <option value="select" selected>Select</option>
        <?php
  
  $sql1="select * from transaction";
  $res1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($res1))
  {
  ?>
        <option value="<?php echo $row1['transaction_id'];?>"><?php echo $row1['transaction_id'];?></option>
        <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Payment_Type</td>
      <td><input name="transaction_type" class="validate[required,custom[onlyLetter]]" type="text" id="transaction_type"></td>
    </tr>
    <tr>
      <td>Payment_Date</td>
      <td><input name="transaction_date" class="validate[required]" type="date" id="transaction_date"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
        <input type="reset" name="reset" class="btn btn-danger" value="reset">
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
      


