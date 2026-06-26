<?php
try {
    include 'includes/DatabaseConnection.php';

    if (isset($_POST['id'])) {
        
        $sql = 'DELETE FROM post WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
    }

    header('location: index.php');
    exit();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();

    include 'templates/layout.html.php';
}
?>