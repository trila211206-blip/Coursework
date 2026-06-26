<h2>Edit Post</h2>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$post['id']?>">
    
    <label for="post_text">Your Post Content:</label><br>
    <textarea name="post_text" id="post_text" rows="5" cols="50" required><?=htmlspecialchars($post['post_text'], ENT_QUOTES, 'UTF-8')?></textarea><br><br>

    <label for="image">Upload New Screenshot (leave blank to keep current):</label><br>
    <input type="file" name="image" id="image" accept="image/*"><br>
    
    <?php if (!empty($post['image'])): ?>
        <small>Current image: <?=htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8')?></small><br>
    <?php endif; ?><br>

    <label for="user_id">Select Author:</label><br>
    <select name="user_id" id="user_id" required>
        <?php foreach ($users as $user): ?>
            <option value="<?=$user['id']?>" <?php if ($post['user_id'] == $user['id']) echo 'selected'; ?>>
                <?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8')?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="module_id">Select Module:</label><br>
    <select name="module_id" id="module_id" required>
        <?php foreach ($modules as $module): ?>
            <option value="<?=$module['id']?>" <?php if ($post['module_id'] == $module['id']) echo 'selected'; ?>>
                <?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8')?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Update Post">
</form>