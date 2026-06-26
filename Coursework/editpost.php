<?php
include 'includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    try {
        $image = $_FILES['image']['name'];

        if (!empty($image)) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);
            $sql = 'UPDATE post SET 
                    post_text = :post_text, 
                    image = :image, 
                    user_id = :user_id, 
                    module_id = :module_id 
                    WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':image', $image);
        } else {
            $sql = 'UPDATE post SET 
                    post_text = :post_text, 
                    user_id = :user_id, 
                    module_id = :module_id 
                    WHERE id = :id';
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindValue(':post_text', $_POST['post_text']);
        $stmt->bindValue(':user_id', $_POST['user_id']);
        $stmt->bindValue(':module_id', $_POST['module_id']);
        $stmt->bindValue(':id', $_POST['id']);
        
        $stmt->execute();

        header('location: index.php');
        exit();

    } catch (PDOException $e) {
        $title = 'Error Occurred';
        $output = 'Database error: ' . $e->getMessage();
    }

} else {
    if (isset($_GET['id'])) {
        try {
            $sql = 'SELECT * FROM post WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_GET['id']);
            $stmt->execute();
            $post = $stmt->fetch();

            $users = $pdo->query('SELECT * FROM user');
            $modules = $pdo->query('SELECT * FROM module');

            $title = 'Edit Post';

            ob_start();
            include 'templates/editpost.html.php';
            $output = ob_get_clean();

        } catch (PDOException $e) {
            $title = 'Error Occurred';
            $output = 'Database error: ' . $e->getMessage();
        }
    }
}

include 'templates/layout.html.php';
?>