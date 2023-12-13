<form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" name="login" value="1" class="btn btn-primary">Submit</button>
</form>
<?php if(!empty($_SESSION['msg'])): ?>
    <?php echo '<p class="msg"> ' . nl2br($_SESSION['msg']) . ' </p>'; ?>
    <?php unset($_SESSION['msg']); ?>
<?php endif; ?>