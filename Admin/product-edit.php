<?php require_once('header.php'); ?>

<?php

if(isset($_POST['form1'])) {
    $valid = 1;
    $error_message = "";

    if(empty($_POST['tcat_id'])) {
        $valid = 0;
        $error_message .= "You must have to select a top level category<br>";
    }

    if(empty($_POST['mcat_id'])) {
        $valid = 0;
        $error_message .= "You must have to select a mid level category<br>";
    }

    if(empty($_POST['ecat_id'])) {
        $valid = 0;
        $error_message .= "You must have to select an end level category<br>";
    }

    if(empty($_POST['p_name'])) {
        $valid = 0;
        $error_message .= "Product name cannot be empty<br>";
    }

    // Only validate the images if they are selected for upload
    if(isset($_FILES['p_featured_photo']) && $_FILES['p_featured_photo']['error'] == 0) {
        $path = $_FILES['p_featured_photo']['name'];
        $path_tmp = $_FILES['p_featured_photo']['tmp_name'];
        
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if(!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif, or png file for Featured Photo<br>';
        }
    }

    if(isset($_FILES['p_sec_photo']) && $_FILES['p_sec_photo']['error'] == 0) {
        $sec_path = $_FILES['p_sec_photo']['name'];
        $sec_tmp = $_FILES['p_sec_photo']['tmp_name'];
        
        $sec_ext = pathinfo($sec_path, PATHINFO_EXTENSION);
        if(!in_array($sec_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif, or png file for Second Photo<br>';
        }
    }

    if(isset($_FILES['p_third_photo']) && $_FILES['p_third_photo']['error'] == 0) {
        $third_path = $_FILES['p_third_photo']['name'];
        $third_tmp = $_FILES['p_third_photo']['tmp_name'];
        
        $third_ext = pathinfo($third_path, PATHINFO_EXTENSION);
        if(!in_array($third_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif, or png file for Third Photo<br>';
        }
    }

    if($valid == 1) {
        // Update the product information in the database
        $statement = $pdo->prepare("UPDATE tbl_product SET 
                                    p_name=?, 
                                    p_price=?, 
                                    p_feature=?,
                                    ecat_id=?
                                    WHERE p_id=?");
        $statement->execute(array(
            $_POST['p_name'],
            $_POST['p_price'],
            $_POST['p_feature'],
            $_POST['ecat_id'],
            $_REQUEST['id']
        ));

        // Update the featured photo if a new one is uploaded
        if(isset($path) && $path != '') {
            $final_name = 'product-featured-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file($path_tmp, '../assets/uploads/'.$final_name);
            $statement = $pdo->prepare("UPDATE tbl_product SET p_featured_photo=? WHERE p_id=?");
            $statement->execute(array($final_name, $_REQUEST['id']));
            unlink('../assets/uploads/'.$_POST['current_photo']);
        }

        // Update the second photo if a new one is uploaded
        if(isset($sec_path) && $sec_path != '') {
            $sec_final_name = 'product-sec-'.$_REQUEST['id'].'.'.$sec_ext;
            move_uploaded_file($sec_tmp, '../assets/uploads/'.$sec_final_name);
            $statement = $pdo->prepare("UPDATE tbl_product SET p_sec_photo=? WHERE p_id=?");
            $statement->execute(array($sec_final_name, $_REQUEST['id']));
            unlink('../assets/uploads/'.$_POST['second_photo']);
        }

        // Update the third photo if a new one is uploaded
        if(isset($third_path) && $third_path != '') {
            $third_final_name = 'product-third-'.$_REQUEST['id'].'.'.$third_ext;
            move_uploaded_file($third_tmp, '../assets/uploads/'.$third_final_name);
            $statement = $pdo->prepare("UPDATE tbl_product SET p_third_photo=? WHERE p_id=?");
            $statement->execute(array($third_final_name, $_REQUEST['id']));
            unlink('../assets/uploads/'.$_POST['Third_photo']);
        }

        $success_message = 'Product is updated successfully.';
    }
}

?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Product</h1>
	</div>
	<div class="content-header-right">
		<a href="product.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$p_name = $row['p_name'];
	$p_price = $row['p_price'];
	$p_featured_photo = $row['p_featured_photo'];
	$p_sec_photo = $row['p_sec_photo'];
	$p_third_photo = $row['p_third_photo'];
	$p_feature = $row['p_feature'];
	$ecat_id = $row['ecat_id'];

}

$statement = $pdo->prepare("SELECT * 
                        FROM tbl_end_category t1
                        JOIN tbl_mid_category t2
                        ON t1.mcat_id = t2.mcat_id
                        JOIN tbl_top_category t3
                        ON t2.tcat_id = t3.tcat_id
                        WHERE t1.ecat_id=?");
$statement->execute(array($ecat_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$ecat_name = $row['ecat_name'];
    $mcat_id = $row['mcat_id'];
    $tcat_id = $row['tcat_id'];
}


?>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="tcat_id" class="form-control select2 top-cat">
		                            <option value="">Select Top Level Category</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM tbl_top_category ORDER BY tcat_name ASC");
		                            $statement->execute();
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		                                <option value="<?php echo $row['tcat_id']; ?>" <?php if($row['tcat_id'] == $tcat_id){echo 'selected';} ?>><?php echo $row['tcat_name']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="mcat_id" class="form-control select2 mid-cat">
		                            <option value="">Select Mid Level Category</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id = ? ORDER BY mcat_name ASC");
		                            $statement->execute(array($tcat_id));
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		                                <option value="<?php echo $row['mcat_id']; ?>" <?php if($row['mcat_id'] == $mcat_id){echo 'selected';} ?>><?php echo $row['mcat_name']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">End Level Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="ecat_id" class="form-control select2 end-cat">
		                            <option value="">Select End Level Category</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM tbl_end_category WHERE mcat_id = ? ORDER BY ecat_name ASC");
		                            $statement->execute(array($mcat_id));
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		                                <option value="<?php echo $row['ecat_id']; ?>" <?php if($row['ecat_id'] == $ecat_id){echo 'selected';} ?>><?php echo $row['ecat_name']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_name" class="form-control" value="<?php echo $p_name; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Price<br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_price" class="form-control" value="<?php echo $p_price; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="p_feature" class="form-control" cols="30" rows="10" id="editor1"><?php echo $p_feature; ?></textarea>
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Existing Featured Photo</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<img src="../assets/uploads/<?php echo $p_featured_photo; ?>" alt="" style="width:150px;">
								<input type="hidden" name="current_photo" value="<?php echo $p_featured_photo; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Change Featured Photo </label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="p_featured_photo">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Existing Second Photo</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<img src="../assets/uploads/<?php echo $p_sec_photo; ?>" alt="" style="width:150px;">
								<input type="hidden" name="second_photo" value="<?php echo $p_sec_photo; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Change Second Photo </label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="p_sec_photo">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Existing Third Photo</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<img src="../assets/uploads/<?php echo $p_third_photo; ?>" alt="" style="width:150px;">
								<input type="hidden" name="Third_photo" value="<?php echo $p_third_photo; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Change Third Photo </label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="p_third_photo">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>


					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>