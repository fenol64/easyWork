<h1 class="blue-bg ml-2"> Serviços </h1>
<hr>
<p class="h5 ml-5 pl-3">Aqui estão seus serviços já realizados</p>

<?php if($posts): ?>
    <div class="d-flex justify-content-center">
        <table class="text-center mt-5">
            <th>ID</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Valor</th>
            <?php foreach ($posts as $post): ?>
                <tr class="text-center">
                    <td class="p-4 border-bottom">#<?=$post->id_post?></td>
                    <td class="pl-5 pr-5 border-bottom"><?=$post->post_head?></td>
                    <td class="pl-5 pr-5 border-bottom"><?=$post->post_body?></td>
                    <td class="pl-5 pr-5 border-bottom"><?=$post->value?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php  else: ?>
    <h2 class="blue-bg text-center"> Você não tem serviços realizados! </h2>
<?php endif; ?>