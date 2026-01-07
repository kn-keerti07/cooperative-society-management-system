<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    
<style>
form#formID {
  background-color: #f9f9f9;
  padding: 25px;
  border-radius: 8px;
  max-width: 600px;
  margin: 0 auto;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form#formID table {
  width: 100%;
}

form#formID td {
  padding: 10px 5px;
  font-weight: 500;
}

form#formID input[type="text"],
form#formID input[type="date"],
form#formID select {
  width: 100%;
  padding: 8px 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

form#formID input[type="submit"],
form#formID input[type="reset"] {
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  margin: 5px;
  cursor: pointer;
}

form#formID input[type="submit"] {
  background-color: #007bff;
  color: white;
}

form#formID input[type="reset"] {
  background-color: #dc3545;
  color: white;
}
</style>

    <div class="content">
        
<div class="header"> 
  <h1 class="page-title"> Withdrawal Details</h1>
    </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
			 <!-- Back to Admin Dashboard Button -->
            <a href="transactiondet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
                  
<div class="well">
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php include('val.php');?>
<form name="form1" id="formID" method="post" action="transactiondet_insert.php">
  <div align="center">
    <table width="514" border="0">
      
      
      <tr>
        <td>Select AccountHolder Name </td>
      <td><select name="accholder_id" class="validate[required,custom[onlyNumber]]" id="accholder_id">
  <option value="">Select Account Holder</option>
  <?php
    include('../dbconnect/db.php');
    $sql = "SELECT * FROM account_holder";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
  ?>
    <option value="<?php echo $row['accountholder_id']; ?>">
      <?php echo $row['full_name'] . ' - ' . $row['account_no']; ?>
    </option>
  <?php
    }
  ?>
</select></td>
</tr>
      <tr>
        <td height="33">Amount</td>
        <td><input name="amount" class="validate[required,custom[onlyNumber]]" type="text" id="amount"></td>
      </tr>
      <tr>
        <td>Date</td>
        <td><input name="date" class="validate[required]" type="date" id="date"></td>
      </tr>
      <tr>
        <td>Time</td>
        <td><input name="time" class="validate[required]" type="text" id="time"></td>
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
      





