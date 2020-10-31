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

function banPost(id_post) {
    if (confirm("Você realmente deseja tirar esse post do ar?")) {
        $.post('https://localhost/Projects/easyWork/admin/BanPost', { id_post }, res => {
            data = JSON.parse(res)
            $(`#${id_post}`).html(data["ok"])
        })
    }
}

setTimeout(() => {
    $(".message").hide()
}, 3000)

function awnser(id_question) {

    let data = {
        id_question,
        awnser: $(`textarea[id="${id_question}"]`).val()
    }

    $.post('https://localhost/Projects/easyWork/admin/awnserQuestion', data, res => {
        data = JSON.parse(res)
        $(`div[id="${id_question}"]`).html(`<span class="text-success">${data["ok"]}</span>`)

    })

    $(`textarea[id="${id_question}"]`).remove()
    $(`.msg`).html(`<div>${data["awnser"]}</div>`)
    $(`button[id="${id_question}"]`).remove()

}
