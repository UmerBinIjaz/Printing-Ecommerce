<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
    $valid = 1;
    $error_message = "";

    // Form validation
    if(empty($_POST['tcat_id'])) {
        $valid = 0;
        $error_message .= "You must select a top-level category<br>";
    }

    if(empty($_POST['mcat_id'])) {
        $valid = 0;
        $error_message .= "You must select a mid-level category<br>";
    }

    if(empty($_POST['ecat_id'])) {
        $valid = 0;
        $error_message .= "You must select an end-level category<br>";
    }

    if(empty($_POST['p_name'])) {
        $valid = 0;
        $error_message .= "Product name cannot be empty<br>";
    }

    // Validate images if they are selected for upload
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Featured Photo
    if(isset($_FILES['p_featured_photo']) && $_FILES['p_featured_photo']['error'] == 0) {
        $path = $_FILES['p_featured_photo']['name'];
        $path_tmp_featured = $_FILES['p_featured_photo']['tmp_name'];
        $ext_featured = pathinfo($path, PATHINFO_EXTENSION);

        if(!in_array($ext_featured, $allowed_extensions)) {
            $valid = 0;
            $error_message .= 'You must upload a jpg, jpeg, gif, or png file for Featured Photo<br>';
        }
    } else {
        $valid = 0;
        $error_message .= 'Featured Photo is required<br>';
    }


    // Second Photo
    if(isset($_FILES['p_sec_photo']) && $_FILES['p_sec_photo']['error'] == 0) {
        $path = $_FILES['p_sec_photo']['name'];
        $path_tmp_sec = $_FILES['p_sec_photo']['tmp_name'];
        $ext_sec = pathinfo($path, PATHINFO_EXTENSION);

        if(!in_array($ext_sec, $allowed_extensions)) {
            $valid = 0;
            $error_message .= 'You must upload a jpg, jpeg, gif, or png file for Second Photo<br>';
        }
    } 
	// else {
    //     $valid = 0;
    //     $error_message .= 'Second Photo is required<br>';
    // }


    if(isset($_FILES['p_third_photo']) && $_FILES['p_third_photo']['error'] == 0) {
        $path = $_FILES['p_third_photo']['name'];
        $path_tmp_third = $_FILES['p_third_photo']['tmp_name'];
        $ext_third = pathinfo($path, PATHINFO_EXTENSION);

        if(!in_array($ext_third, $allowed_extensions)) {
            $valid = 0;
            $error_message .= 'You must upload a jpg, jpeg, gif, or png file for Third Photo<br>';
        }
    } 


    // Optional Photos
    // $photos = ['p_sec_photo' => 'Second Photo', 'p_third_photo' => 'Third Photo'];
    // $photo_tmp_paths = [];

    // foreach ($photos as $key => $label) {
    //     if(isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
    //         $path = $_FILES[$key]['name'];
    //         $path_tmp = $_FILES[$key]['tmp_name'];
    //         $ext = pathinfo($path, PATHINFO_EXTENSION);

    //         if(!in_array($ext, $allowed_extensions)) {
    //             $valid = 0;
    //             $error_message .= "You must upload a jpg, jpeg, gif, or png file for $label<br>";
    //         } else {
    //             $photo_tmp_paths[$key] = $path_tmp;
    //         }
    //     }
    // }

    if($valid == 1) {
        // Prepare data for insertion
        $featured_photo = $_FILES['p_featured_photo']['name'];
		$sec_photo = $_FILES['p_sec_photo']['name'];
		$third_photo = $_FILES['p_third_photo']['name'];
        // $sec_photo = isset($_FILES['p_sec_photo']['name']) ? $_FILES['p_sec_photo']['name'] : '';
        // $third_photo = isset($_FILES['p_third_photo']['name']) ? $_FILES['p_third_photo']['name'] : '';

        // Insert the product information into the database
        $statement = $pdo->prepare("INSERT INTO tbl_product (p_name, p_price, p_featured_photo, p_sec_photo, p_third_photo, p_feature, ecat_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array(
            $_POST['p_name'],
            $_POST['p_price'],
            $featured_photo,
            $sec_photo,
            $third_photo,
            $_POST['p_feature'],
            $_POST['ecat_id'],
        ));

        // Move uploaded photos
        $last_id = $pdo->lastInsertId();
        // $final_featured_name = 'product-featured-' . $last_id . '.' . $ext_featured;
        move_uploaded_file($path_tmp_featured, '../assets/uploads/' . $featured_photo);
		move_uploaded_file($path_tmp_sec, '../assets/uploads/' . $sec_photo);
		move_uploaded_file($path_tmp_third, '../assets/uploads/' . $third_photo);


        // foreach ($photos as $key => $label) {
        //     if(isset($photo_tmp_paths[$key])) {
        //         $ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
        //         // $final_name = 'product-' . strtolower(str_replace(' ', '-', $label)) . '-' . $last_id . '.' . $ext;
        //         move_uploaded_file($photo_tmp_paths[$key], '../assets/uploads/' . $final_name);
        //     }
        // }

        $success_message = 'Product is added successfully.';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Product</h1>
    </div>
    <div class="content-header-right">
        <a href="product.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <?php if($error_message): ?>
            <div class="callout callout-danger">
                <p><?php echo $error_message; ?></p>
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
                                        <option value="<?php echo $row['tcat_id']; ?>"><?php echo $row['tcat_name']; ?></option>
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
                                    $statement->execute(array($_POST['tcat_id']));
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                                    foreach ($result as $row) {
                                        ?>
                                        <option value="<?php echo $row['mcat_id']; ?>"><?php echo $row['mcat_name']; ?></option>
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
                                    $statement->execute(array($_POST['mcat_id']));
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                                    foreach ($result as $row) {
                                        ?>
                                        <option value="<?php echo $row['ecat_id']; ?>"><?php echo $row['ecat_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="p_name" class="form-control" value="">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Price<br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="p_price" class="form-control" value="">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Features</label>
                            <div class="col-sm-8">
                                <textarea name="p_feature" class="form-control" cols="30" rows="10" id="editor1"></textarea>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Featured Photo <span>*</span></label>
                            <div class="col-sm-4" style="padding-top:4px;">
                                <input type="file" name="p_featured_photo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Second Photo</label>
                            <div class="col-sm-4" style="padding-top:4px;">
                                <input type="file" name="p_sec_photo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Third Photo</label>
                            <div class="col-sm-4" style="padding-top:4px;">
                                <input type="file" name="p_third_photo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Add Product</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>

</section>

<?php require_once('footer.php'); ?>