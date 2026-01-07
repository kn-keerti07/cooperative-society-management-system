<?php
include('../dbconnect/db.php');
include('meta_tags.php');
include('menus.php');
include('side_menu.php');
?>

<div class="content">
    <div class="header">
        <h1 class="page-title">Complaint Details</h1>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <!-- Back to Admin Dashboard Button -->
            <a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>

            <div class="well">
                <table class="table table-responsive" id="demo-dtable-01">
                    <thead>
                        <tr>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Accountholder Name</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint_title</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint_description</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint_date</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Complaint_status</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to fetch complaints
                        $sl = 1;
                        $sql = "SELECT c.complaint_id, c.complaint_title, c.complaint_description, c.complaint_date, c.complaint_status, a.full_name 
                                FROM complaints c 
                                JOIN account_holder a ON c.accountholder_id = a.accountholder_id";
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
                            <td>
                                <a href="complaintdet_delete.php?id=<?php echo $row['complaint_id']; ?>" 
                                   class="action-box action-delete" 
                                   onClick="return confirm('Are you sure you want to delete?')">
                                   <i class="fas fa-trash" style="margin-right: 4px;"></i> Delete
                                </a>
                            </td>
                            <td>
                                <a href="respond_complaint.php?id=<?php echo $row['complaint_id']; ?>" class="btn btn-primary">
                                    Respond
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<!-- CSS for Action Box and Delete Button -->
<style>
.action-box {
  display: inline-block;
  padding: 6px 12px;
  border-radius: 5px;
  border: 1px solid transparent;
  font-weight: 500;
  text-align: center;
  text-decoration: none;
  transition: all 0.3s ease;
  cursor: pointer;
  font-size: 14px;
}

.action-delete {
  background-color: #6c757d;
  color: #fff;
  border: 1px solid #6c757d;
}

.action-delete:hover {
  background-color: #e63946;
  border-color: #e63946;
  color: #fff;
  box-shadow: 0 0 10px rgba(230, 57, 70, 0.4);
}
</style>
