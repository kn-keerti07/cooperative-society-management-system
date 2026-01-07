<?php include('meta_tags.php');  ?>

<?php include('menus.php');  ?>

    
 <?php include('side_menu.php');  ?>
    
    <div class="content">
        
 <div class="header">
            
            <h1 class="page-title">Transaction Details</h1>
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

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bank Actions</title>
  <style>
  

    .button {
      background-color: #3498db; /* Blue */
      border: none;
      color: white;
      padding: 15px 30px;
      margin: 10px;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #2980b9;
    }

    /* Optional: Specific button colors */
    .withdrawal { background-color: #e74c3c; }
    .withdrawal:hover { background-color: #c0392b; }
	
	.transanction { background-color:#0099FF; }
    .transanction:hover { background-color:#FFFFFF; }

    .deposit { background-color: #2ecc71; }
    .deposit:hover { background-color: #27ae60; }

    .search { background-color: #f39c12; }
    .search:hover { background-color: #d68910; }
  </style>
</head>
<body>
<a href="transactiondet_form.php" class="button transanction"  >ADD TRANSACTION</a>
  <a href="withdraval_view.php" class="button withdrawal"  >WITHDRAWAL</a>
  <a href="deposite_view.php" class="button deposit">DEPOSIT</a>
  <a href="search_account_holder_view.php" class="button search">SEARCH ACCOUNT HOLDER</a>

</body>
</html>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
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





