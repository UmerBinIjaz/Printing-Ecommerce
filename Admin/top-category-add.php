<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
    $valid = 1;
    $error_message = ''; // Initialize error message
    $success_message = ''; // Initialize success message

    if(empty($_POST['tcat_name'])) {
        $valid = 0;
        $error_message .= "Top Category Name cannot be empty<br>";
    } else {
        // Duplicate Category checking
        $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE tcat_name=?");
        $statement->execute(array($_POST['tcat_name']));
        $total = $statement->rowCount();
        if($total) {
            $valid = 0;
            $error_message .= "Top Category Name already exists<br>";
        }
    }

    // Check if an image is uploaded
    $tcat_image = '';
    if(isset($_FILES['tcat_image']) && $_FILES['tcat_image']['name'] != '') {
        $tcat_image = time() . '_' . $_FILES['tcat_image']['name'];
        $target_file = '../assets/uploads/' . $tcat_image;

        // Validate image file
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        if(!in_array($file_extension, $allowed_extensions)) {
            $valid = 0;
            $error_message .= 'Only jpg, jpeg, png, and gif files are allowed<br>';
        } else {
            move_uploaded_file($_FILES['tcat_image']['tmp_name'], $target_file);
        }
    }

    if($valid == 1) {
        // Saving data into the main table tbl_top_category
        $statement = $pdo->prepare("INSERT INTO tbl_top_category (tcat_name, show_on_menu, tcat_image) VALUES (?, ?, ?)");
        $statement->execute(array($_POST['tcat_name'], $_POST['show_on_menu'], $tcat_image));
    
        $success_message = 'Top Category is added successfully.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Top Level Category</h1>
	</div>
	<div class="content-header-right">
		<a href="top-category.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">Category Image</label>
                            <div class="col-sm-4">
                                <input type="file" class="" name="tcat_image">
                            </div>
                        </div>                               
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Top Category Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tcat_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Show on Menu? <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="show_on_menu" class="form-control" style="width:auto;">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php require_once('footer.php'); ?>