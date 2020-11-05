<h1 class="blue-bg ml-2"> Notas </h1>
<hr>
<?php if (!$hates): ?>
    <h2 class="text-center blue-bg mt-5"> Você ainda não tem avaliações de seus serviços </h2>
<?php else: ?>
    <div class="d-flex justify-content-center">
        <table>
            <tr>
                <th class="pl-5 pr-5 h3 ">ID do serviço</th>
                <th class="pl-5 pr-5 h3 ">Valor da nota</th>
            </tr>
            <?php foreach ($hates as $hate): ?>
                <tr class="text-center">
                    <td class="pl-5 pr-5 border-bottom">#<?=$hate->id_post?></td>
                    <td class="pl-5 pr-5 border-bottom">
                        <?php for ($i=0; $i < $hate->hate_value; $i++):?>
                            <img src="<?= asset('img/icons/star.png') ?>">
                        <?php endfor; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>
