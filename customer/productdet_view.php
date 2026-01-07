<?php include('meta_tags.php'); ?>
<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>

<div class="content">
    <div class="header">
        <h1 class="page-title">Product Details</h1>
    </div>

    <div class="container-fluid">
	<!-- Back to Admin Dashboard Button -->
      <a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
      </a>
        <div class="row">
            <?php
            include('../dbconnect/db.php');
            $sql = "SELECT * FROM products";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <div class="col-md-4" style="margin-bottom: 30px;">
                    <div class="card" style="border: 1px solid #ccc; padding: 15px; border-radius: 10px; height: 100%;">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <p><?php echo $row['product_description']; ?></p>
                        
                        <div class="horizontal-gallery" style="display: flex; overflow-x: auto; gap: 10px; margin-bottom: 10px;">
                            <?php
                            $images = explode(',', $row['product_image']);
                            foreach ($images as $img) {
                                echo '<img src="../uploads/' . trim($img) . '" style="width:100px; height:100px; object-fit:cover; border-radius: 5px;">';
                            }
                            ?>
                        </div>

                        <p><strong>Price:</strong> Rs.<?php echo $row['product_price']; ?></p>
                        <?php if($row['product_status']=='No Stock'){?><strong><font color="#FF0000">NO STOCK</font></strong><?php
						} else { ?>
                        <!-- Quantity Form -->
                        <form action="buy_product.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                            <label for="qty_<?php echo $row['product_id']; ?>">Quantity:</label>
                            <input type="number" id="qty_<?php echo $row['product_id']; ?>" name="quantity" value="1" min="1" style="width: 60px; margin-right: 10px;" required>
                            <button type="submit" class="btn btn-success">Request Now</button>
                        </form>
						<?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Optional Styling -->
<style>
    .horizontal-gallery::-webkit-scrollbar {
        height: 6px;
    }

    .horizontal-gallery::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
    }

    .horizontal-gallery::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    @media (max-width: 768px) {
        .horizontal-gallery img {
            width: 80px;
            height: 80px;
        }
    }
</style>

<?php include('footer.php'); ?>
