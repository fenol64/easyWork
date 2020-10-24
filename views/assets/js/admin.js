function delete_modals(id_category) {
    
    if (confirm("Você realmente deseja deletar essa categoria?")) {
        $.post('https://localhost/Projects/easyWork/admin/delCategory', { category: id_category }, res => {
            data = JSON.parse(res);
            $('#result_table').html('')

            $('#result_table').append(`
                <tr class="text-center border-bottom">
                    <th class="h5">Nome da categoria</th>
                    <th class="h5">Tipo da categoria</th>
                    <th class="h5">Ações:</th>
                </tr>
            `)
        
            data.forEach(element => {
                $('#result_table').append(`
                    <tr class="text-center border-bottom">
                        <td>${element[0]["name_category"]}</td>
                        <td>${element[0]["type_category"]}</td>
                        <td class="p-3">
                            <button class="btn btn-danger" onclick="delete_modals(${element[0]["id_category"]})">
                                Deletar
                            </button>
                        </td>
                    </tr>
                `)
            });

        })
    }
}

function banUser(id_user) {
    if (confirm("Você realmente deseja Banir este usuário?")) {
        $.post('https://localhost/Projects/easyWork/admin/BanUser', { id_user }, res => {
            data = JSON.parse(res)
            $(`#${id_user}`).html(data["ok"])
        })
    }
}

setTimeout(() => {
    $(".message").hide()
}, 3000)


