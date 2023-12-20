<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <label for="name"></label><input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input type="text" name="description" class="form-control" id="description">
    </div>
    <div class="mb-3">
        <label for="time" class="form-label">Время</label>
        <input type="text" name="time" class="form-control" id="time">
    </div>
    <div class="mb-3">
        <label for="is_active" class="form-label">Приоритет задачи</label>
        <input type="text" name="priority" class="form-control" id="is_active">
    </div>


    <button type="submit" name="add_post" value="1" class="btn btn-primary">Submit</button>
</form>
<?php if(!empty($_SESSION['msg'])): ?>
    <?php echo '<p class="msg"> ' . nl2br($_SESSION['msg']) . ' </p>'; ?>
    <?php unset($_SESSION['msg']); ?>
<?php endif; ?>