<h1 class="ml-3 blue-bg">Usuários</h1>
<hr>
<div class="d-flex justify-content-center">
    <table class="mt-5 text-center">
        <tr class="border-bottom">
            <th class="pl-4 pr-4">Foto de Perfil</th>
            <th class="pl-4 pr-4">Nome completo</th>
            <th class="pl-4 pr-4">Data de Nascimento</th>
            <th class="pl-4 pr-4">Biografia</th>
            <th class="pl-4 pr-4">Email</th>
            <th class="pl-4 pr-4">CPF</th>
            <th class="pl-4 pr-4">Nível</th>
            <th class="pl-4 pr-4">Ações:</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td class="pl-4 mr-4 border-bottom"><img src="<?= getProfilePic($user->profile_pic) ?>" width="50"></td>
                <td class="pl-4 mr-4 border-bottom"><?=$user->nome.' '. $user->Snome?></td>
                <td class="pl-4 mr-4 border-bottom"><?=$user->nasc ?></td>
                <td class="pl-4 mr-4 border-bottom"><?=$user->bio ?></td>
                <td class="pl-4 mr-4 border-bottom"><?=$user->email ?></td>
                <td class="pl-4 mr-4 border-bottom"><?=$user->cpf ?></td>
                <td class="pl-4 mr-4 border-bottom"><?=$user->tipo ?></td>
                <!--  -->
                <td class="pl-4 mr-4 border-bottom">

                    <?php if ($user->status_acc == 'baned'):?>
                        <button class="btn btn-danger" id="<?=$user->id_user ?>" onclick="banUser(<?=$user->id_user ?>)"> 
                            Desbanir
                        </button>
                    <?php else: ?>
                        <button class="btn btn-danger" id="<?=$user->id_user ?>" onclick="banUser(<?=$user->id_user ?>)"> 
                            Banir
                        </button>
                    <?php endif;?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>