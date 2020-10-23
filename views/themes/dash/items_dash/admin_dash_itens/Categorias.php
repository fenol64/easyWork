<h1 class="ml-3 blue-bg">Categorias</h1>
<hr>

<button class="btn btn-success m-3 ml-1" data-toggle="modal" data-target="#categoryModal"> Adicionar categoria </button>
<div class="container">
  <table class="ml-3 w-100" id="result_table">
  <tr class="text-center border-bottom">
          <th class="h5">Nome da categoria</th>
          <th class="h5">Tipo da categoria</th>
          <th class="h5">Ações:</th>
      </tr>

      <?php foreach ($categories as $category) :?>
          <tr class="text-center border-bottom">
              <td><?= $category->name_category; ?></td>
              <td><?= $category->type_category; ?></td>
              <td class="p-3">
                  <button class="btn btn-danger" onclick="delete_modals(<?= $category->id_category; ?>)">
                      Deletar
                  </button>
              </td>
          </tr>
      <?php endforeach; ?>
  </table>
</div>
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site().'/admin/AddCategory' ?>" method="post">
            Nome da categoria: <br>
            <input type="text" name="Nome_categoria" class="p-2"><br>
            Tipo da Categoria: <br>
            <select name="tipo_categoria" class="p-2 mt-2 mb-2">
              <option value="">Escolha uma Opção</option>
              <option value="Assistencia-Tecnica">Assistencia Técnica</option>
              <option value="Aulas">Aulas</option>
              <option value="Autos">Autos</option>
              <option value="Consultoria">Consultoria</option>
              <option value="Design-e-Tecnologia">Design e Tecnologia</option>
              <option value="Moda-e-Beleza">Moda e Beleza</option>
              <option value="Reformas">Reformas</option>
              <option value="Saúde">Saúde</option>
              <option value="Serviços-Domésticos">Serviços Domésticos</option>
            </select><br>

            <input type="submit" value="Enviar" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
