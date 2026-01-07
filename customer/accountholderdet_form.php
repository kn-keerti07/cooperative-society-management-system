<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Account Holder  Details</h1>
        </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                  
<div class="well">
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php include('val.php');?>
<form name="form1" id="formID" method="post" action="accountholderdet_insert.php">
  <div align="center">
    <table width="491" border="0">
      <tr>
        <td width="217">Full_Name</td>
        <td width="258"><input name="Fullname" class="validate[required,custom[onlyLetter]]" type="text" id="Fullname"></td>
      </tr>
      <tr>
        <td>Date_of_Birth</td>
        <td><input name="dob" class="validate[required,custom[date]]" type="date" id="dob"></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input name="Gend" class="validate[required]" type="text" id="Gend"></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><textarea name="Adrs" class="validate[required]" id="Adrs"></textarea></td>
      </tr>
      <tr>
        <td>Email_ID</td>
        <td><input name="emailid" class="validate[required,custom[email]]"  type="text" id="emailid"></td>
      </tr>
      <tr>
        <td>Contact_No</td>
        <td><input name="contactno" class="validate[required,custom[mobile]]" type="text" id="contactno"></td>
      </tr>
      <tr>
        <td>Occupation</td>
        <td><div align="left">
          <input name="occupa" class="validate[required,custom[onlyLetter]]" type="text" id="occupa">
        </div></td>
      </tr>
      <tr>
        <td>Account_No</td>
        <td><input name="accno" class="validate[required,custom[onlyNumber]]" type="text" id="accno"></td>
      </tr>
      <tr>
        <td>Create_Date</td>
        <td><input name="createdate" class="validate[required,custom[date]]"  type="date" id="createdate"></td>
      </tr>
      <tr>
        <td>AccountHolder_Photo</td>
        <td><input name="accholderphoto" class="validate[required]" type="text" id="accholderphoto"></td>
      </tr>
      <tr>
        <td>Signature</td>
        <td><input name="sign" class="validate[required]" type="text" id="sign"></td>
      </tr>
      <tr>
        <td>Aadhar_No</td>
        <td><input name="adharno" class="validate[required,custom[onlyNumber]]" type="text" id="adharno"></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
          <input type="reset" name="reset" class="btn btn-danger" value="reset">
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
      