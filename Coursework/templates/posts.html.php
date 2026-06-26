<h2>List of Posts</h2>

<?php foreach($posts as $post): ?>
    <blockquote style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
        <p><?=htmlspecialchars($post['post_text'], ENT_QUOTES, 'UTF-8')?></p>
        
        <?php if (!empty($post['image'])): ?>
            <img height="100px" src="images/<?=htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8')?>" alt="Screenshot" /><br><br>
        <?php endif; ?>

        <small>
            Module: <strong><?=htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8')?></strong> | 
            Author: <?=htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8')?> |
            Date: <?=date("D d M Y", strtotime($post['post_date']))?>
        </small>
        
        <br><br>
        <a href="editpost.php?id=<?=$post['id']?>">Edit</a>
        <form action="deletepost.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
<?php endforeach; ?>