<h2>Add a new post</h2>

<form action="" method="post" enctype="multipart/form-data">
    <label for="post_text">Your Post Content:</label><br>
    <textarea name="post_text" id="post_text" rows="5" cols="50" required></textarea><br><br>

    <label for="image">Upload Screenshot (optional):</label><br>
    <input type="file" name="image" id="image" accept="image/*"><br><br>

    <label for="user_id">Select Author:</label><br>
    <select name="user_id" id="user_id" required>
        <option value="">-- Choose User --</option>
        <?php foreach ($users as $user): ?>
            <option value="<?=$user['id']?>"><?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8')?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="module_id">Select Module:</label><br>
    <select name="module_id" id="module_id" required>
        <option value="">-- Choose Module --</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?=$module['id']?>"><?=htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8')?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Add Post">
</form>