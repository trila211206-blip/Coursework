<?php
try {
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT post.id, post_text, image, post_date, user.username, module.name AS module_name 
            FROM post 
            INNER JOIN user ON post.user_id = user.id 
            INNER JOIN module ON post.module_id = module.id 
            ORDER BY post_date DESC';
    
    $posts = $pdo->query($sql);
    $title = 'Student Posts';

    ob_start();
    include 'templates/posts.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>