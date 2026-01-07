<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Schemes  Details</h1>
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

$sql="select * from schemes where scheme_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>

<form name="form1" id="formID" method="post" action="schemesdet_update.php">
<input type="hidden" value="<?php echo $row['scheme_id'];?>" name="scheme_id">
  <div align="center">
    <table width="450" border="0">
      
      <tr>
        <td width="200">Scheme_Name</td>
        <td width="234"><input name="scheme_name" class="validate[required,custom[onlyLetter]]" type="text" id="scheme_name" value="<?php echo $row['scheme_name'];?>"></td>
      </tr>
      <tr>
        <td>Scheme_Description</td>
        <td><input name="scheme_desc" class="validate[required,custom[onlyLetter]]" type="text" id="scheme_desc" value="<?php echo $row['scheme_description'];?>"></td>
      </tr>
      <tr>
        <td>Scheme_Attach_File</td>
        <td><input name="scheme_attach" class="validate[required]" type="text" id="scheme_attach" value="<?php echo $row['scheme_attachfile'];?>"></td>
      </tr>
      <tr>
        <td height="36">Scheme_Duration</td>
        <td><input name="scheme_duration" class="validate[required]" type="text" id="scheme_duration" value="<?php echo $row['scheme_duration'];?>"></td>
      </tr>
      <tr>
        <td>Scheme_Status</td>
        <td><input name="scheme_status" class="validate[required,custom[onlyLetter]]" type="text" id="scheme_status" value="<?php echo $row['scheme_status'];?>"></td>
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
      

