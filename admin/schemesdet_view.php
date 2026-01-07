<?php include('meta_tags.php');  ?>
<?php include('menus.php');  ?>
<?php include('side_menu.php');  ?>

<div class="content">
    <div class="header">
        <h1 class="page-title">Schemes Details</h1>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <a href="schemesdet_form.php" class="btn btn-primary"><i class="icon-plus"></i> Add New Schemes Details</a>
                <div class="btn-group"></div>
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
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Scheme_Name</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Scheme_Description</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Scheme_Attachfile</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Scheme_Duration</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Scheme_Status</th>
                            <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../dbconnect/db.php');
                        $sl=1;
                        $sql="select * from schemes";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($res)) {
                        ?>
                        <tr>
                            <td><?php echo $sl++;?></td>
                            <td><?php echo $row['scheme_name'];?></td>
                            <td><?php echo $row['scheme_description'];?></td>
                            <td><a href="<?php echo $row['scheme_attachfile']; ?>" class="btn btn-primary">Download File</a></td>
                            <td><?php echo $row['scheme_duration'];?></td>
                            <td><?php echo $row['scheme_status'];?></td>
                            <td>
                                <a href="schemesdet_delete.php?id=<?php echo $row['scheme_id'];?>" 
                                   class="action-box action-delete" 
                                   onClick="return confirm('Are you sure you want to delete?')">
                                   <i class="fas fa-trash" style="margin-right: 4px;"></i> Delete
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

<?php include('footer.php');  ?>

<!-- CSS for Action Box and Delete Button -->
<style>
/* Common Action Box */
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

/* Delete Button - Default Gray */
.action-delete {
  background-color: #6c757d; /* Gray */
  color: #fff;
  border: 1px solid #6c757d;
}

.action-delete:hover {
  background-color: #e63946; /* Red on hover */
  border-color: #e63946;
  color: #fff;
  box-shadow: 0 0 10px rgba(230, 57, 70, 0.4);
}
</style>
	