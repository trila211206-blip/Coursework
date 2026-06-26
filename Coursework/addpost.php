<?php
include 'includes/DatabaseConnection.php';

if (isset($_POST['post_text'])) {
    try {
        $image = $_FILES['image']['name'];
        if (!empty($image)) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);
        }

        $sql = 'INSERT INTO post SET 
            post_text = :post_text,
            post_date = CURDATE(),
            image = :image,
            user_id = :user_id,
            module_id = :module_id';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_text', $_POST['post_text']);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':user_id', $_POST['user_id']);
        $stmt->bindValue(':module_id', $_POST['module_id']);
        $stmt->execute();

        header('location: index.php');
        exit();

    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add a New Post';

    $sql_users = 'SELECT * FROM user';
    $users = $pdo->query($sql_users);

    $sql_modules = 'SELECT * FROM module';
    $modules = $pdo->query($sql_modules);
    
    ob_start();
    include 'templates/addpost.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
?>