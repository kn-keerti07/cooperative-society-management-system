<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Product Details</h1>
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

$sql="select * from products where product_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>

<form name="form1" id="formID" method="post" action="productdet_update.php">
<input type="hidden" value="<?php echo $row['product_id'];?>" name="product_id">
  
  <div align="center">
    <table width="483" height="223" border="0">
      
      <tr>
        <td width="208">Product_Name</td>
        <td width="259"><input name="product_name" class="validate[required,custom[onlyLetter]]" type="text" id="product_name" value="<?php echo $row['product_name'];?>"></td>
      </tr>
      <tr>
        <td>Product_Description</td>
        <td><input name="product_desc" class="validate[required,custom[onlyLetter]]" type="text" id="product_desc" value="<?php echo $row['product_description'];?>"></td>
      </tr>
     
      <tr>
        <td>Product_Price</td>
        <td><input name="product_price" class="validate[required]" type="text" id="product_price" value="<?php echo $row['product_price'];?>"></td>
      </tr>
      <tr>
        <td>Product Stock </td>
        <td><select name="status" id="status">
          <option>Stock</option>
          <option>No Stock</option>
        </select></td>
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
      


