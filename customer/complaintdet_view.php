<?php 
include('meta_tags.php'); ?>
<style>
.action-link, .action-delete {
  display: inline-block;
  padding: 6px 12px;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}



.action-delete {
  background-color: #6c757d; /* grey button for delete */
  color: #fff;
  border: 1px solid #6c757d;
}

.action-delete:hover {
  background-color: #b30000; /* red on hover */
  color: #fff;
}

.action-link i, .action-delete i {
  margin-right: 6px;
}
</style> 
<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 


<div class="content">
    <div class="header">
        <h1 class="page-title">Complaint Details</h1>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
		<div class="btn-toolbar">
    <a href="complaintdet_form.php" class="btn btn-primary"><i class="icon-plus"></i> Add New Complaint Details</a>
   
    <div class="btn-group">
  </div>
</div>
            <div class="btn-toolbar">
                <!-- Optional: Add 'Add New Complaint' button if necessary -->
                <!-- <a href="complaintdet_form.php" class="btn btn-primary"><i class="icon-plus"></i> Add New Complaint Details</a> -->
            </div>
<!-- Back to Admin Dashboard Button -->
      <a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
      </a>
            <div class="well">
                <table class="table" id="demo-dtable-01">
                    <thead>
                        <tr>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Accountholder Name</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint Title</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint Description</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint Date</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint Status</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Admin Response</th>
                            <th colspan="1" style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../dbconnect/db.php');
                        $sl = 1;
                        $uname = $_SESSION['uname']; // Account number (assuming this is how the user is identified)
                        $sql = "SELECT * FROM complaints c 
                                JOIN account_holder a ON c.accountholder_id = a.accountholder_id 
                                WHERE a.account_no = '$uname'";  // Use account number to filter complaints
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['complaint_title']; ?></td>
                            <td><?php echo $row['complaint_description']; ?></td>
                            <td><?php echo $row['complaint_date']; ?></td>
                            <td><?php echo $row['complaint_status']; ?></td>

                            <!-- Admin Response Column -->
                            <td>
                                <?php 
                                if (!empty($row['admin_response'])) {
                                    echo "<p><strong>Response:</strong> " . htmlspecialchars($row['admin_response']) . "</p>";
                                    echo "<p><strong>Response Date:</strong> " . $row['response_date'] . "</p>";
                                } else {
                                    echo "<em>No response yet.</em>";
                                }
                                ?>
                            </td>

                <td>
                  <a href="complaintdet_delete.php?id=<?php echo $row['complaint_id']; ?>" class="action-delete" onClick="return confirm('Are you sure want to delete?')">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
                <td>                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
