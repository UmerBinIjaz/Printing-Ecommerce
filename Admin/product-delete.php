<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
// Get the product ID from the URL
$p_id = $_GET['id'];

// First, fetch the product information to delete associated photos
$statement = $pdo->prepare("SELECT p_featured_photo, p_sec_photo, p_third_photo FROM tbl_product WHERE p_id=?");
$statement->execute(array($p_id));
$product = $statement->fetch(PDO::FETCH_ASSOC);

if ($product) {
    // Delete associated photos if they exist
    if (file_exists('../assets/uploads/' . $product['p_featured_photo']) && !empty($product['p_featured_photo'])) {
        unlink('../assets/uploads/' . $product['p_featured_photo']);
    }
    if (file_exists('../assets/uploads/' . $product['p_sec_photo']) && !empty($product['p_sec_photo'])) {
        unlink('../assets/uploads/' . $product['p_sec_photo']);
    }
    if (file_exists('../assets/uploads/' . $product['p_third_photo']) && !empty($product['p_third_photo'])) {
        unlink('../assets/uploads/' . $product['p_third_photo']);
    }

    // Now, delete the product from the database
    $statement = $pdo->prepare("DELETE FROM tbl_product WHERE p_id=?");
    $statement->execute(array($p_id));

    // Set a success message
    $success_message = 'Product is deleted successfully.';
} else {
    // Set an error message if the product is not found
    $error_message = 'Product not found.';
}

// Redirect to the product listing page after deletion
header('Location: product.php');
exit;
?>