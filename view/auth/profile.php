<?php if (empty($_SESSION['user'])) : ?>
<?php header('Location: /index.php') ?>
<?php endif ?>
<?php
foreach ($userPosts as $post) {
    echo $post['title'] . '<br>';
    echo $post['content'] . '<br>';
    echo $post['count_view'] . '<br>';
    echo $post['created_at'] . '<br>';
    ?>
    <form action="/remove_post" method="POST">
        <button type="submit" name="slug" value="<?= $post['slug'] ?>" class="btn btn-primary">Удалить</button>
    </form>
    <a href="blog/edit_post/?id_post=<?=$post['id_post']; ?>">Изменить</a>
    <?php
    echo '-----------------' . '<br>';
}