<h1 class="blue-bg"> Posts </h1>
<hr>
<div class="d-flex flex-wrap justify-content-center">
    <?php if ($posts): ?>
        <?php foreach ($posts as $post): ?>
            <div class="card m-2" style="width: 28rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->post_head ?></h5>
                    <p class="card-text"><?= $post->post_body ?></p>
                    <a href="#" class="card-link text-danger">Denunciar Post</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2>Não há posts cadastrados</h2>
    <?php endif;?>
</div>