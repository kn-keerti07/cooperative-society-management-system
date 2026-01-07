<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Complaint  Details</h1>
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

$sql="select * from complaints where complaint_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>

<form name="form1" id="formID" method="post" action="complaintdet_update.php">
<input type="hidden" value="<?php echo $row['complaint_id'];?>" name="complaint_id">

  <div align="center">
    <table width="496" border="0">
      <tr>
        <td width="229">Select Accountholder Name </td>
        <td width="251"><select name="accholder_id" class="validate[required,custom[onlyNumber]]" id="accholder_id">
		<option value="">Select Account Holder</option>
		<?php
		
		$sql2="select * from account_holder";
		$res2=mysqli_query($conn,$sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		?>
		<option value="<?php echo $row2['accountholder_id'];?>"><?php echo $row2['full_name'];?></option>
		<?php
		
		}
		?>
		
        </select></td>
      </tr>
      <tr>
        <td>complaint_title</td>
        <td><input name="com_title" class="validate[required,custom[onlyLetter]]" type="text" id="com_title" value="<?php echo $row['complaint_title'];?>"></td>
      </tr>
      <tr>
       <td>complaint_description</td>
        <td><input name="com_desc" class="validate[required,custom[onlyLetter]]" type="text" id="com_desc" value="<?php echo $row['complaint_description'];?>"></td>
      </tr>
      <tr>
        <td>complaint_date</td>
        <td><input name="com_date" class="validate[required]" type="date" id="com_date" value="<?php echo $row['complaint_date'];?>"></td>
      </tr>
      <tr>
        <td>complaint_status</td>
        <td><input name="com_status" class="validate[required,custom[onlyLetter]]" type="text" id="com_status" value="<?php echo $row['complaint_status'];?>"></td>
      </tr>
      <tr>
        <td height="31" colspan="2"><div align="center">
            <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
            <input type="reset" name="reset" class="btn btn-danger" value="reset">
        </div>
        <div align="center"></div></td>
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
      

