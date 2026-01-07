<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>
    

    <div class="content">
        
<div class="header"> 
  <h1 class="page-title"> Product Details</h1>
    </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                  
<div class="well">
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php include('val.php');?>
<form action="productdet_insert.php" method="post" enctype="multipart/form-data" name="form1" id="formID">
  
  <div align="center">
    <table width="483" border="0">
      
      <tr>
        <td width="208">Product_Name</td>
        <td width="259"><input name="product_name" class="validate[required,custom[onlyLetter]]" type="text" id="product_name"></td>
      </tr>
      <tr>
        <td>Product_Description</td>
        <td><input name="product_desc" class="validate[required]" type="text" id="product_desc"></td>
      </tr>
      <tr>
        <td>Product_Image</td>
        <td><input name="product_img" type="file" id="product_img"></td>
      </tr>
      <tr>
        <td>Product_Price</td>
        <td><input name="product_price" class="validate[required,custom[onlyNumber]]" type="text" id="product_price"></td>
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
      



