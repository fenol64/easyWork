
    function makeReq(type) {
        $.post('https://localhost/Projects/easyWork/dash/getService', { type }, res => {
            var data = JSON.parse(res)
            renderPost(data)
        })
    }

    function renderPost(data) {
        $('#root').html('')
        if (data["erro"]) {
            $('#root').html(`<div class="text-center h2 mt-5">${data["erro"]}</div>`)
            return;
        }

        data.forEach(element => {
            $('#root').append(`
                <div class="box_user_service p-2 pl-3 mt-3" onclick="post_spec(${element[0]["id_post"]})"  data-toggle="modal" data-target="#exampleModal">
                    <div class="post_head font-weight-bold h5">${element[0]["post_head"]}</div>
                    <div class="partner_name ml-5">
                        <img src="https://localhost/Projects/easyWork/src/shared/${element[1]["profile_pic"]}" width="30"> ${element[1]["nome"].charAt(0).toUpperCase() + element[1]["nome"].slice(1)}
                    </div>
                    <div class="message_user text-success">${element[2]}</div>
                </div>
            `)
        })
    }

    function post_spec(id_post) {
        $.post('https://localhost/Projects/easyWork/dash/detailService', { id_post }, res => {
            var data = JSON.parse(res)
            buildModal(data)
        })
    }

    function buildModal (data) {
        $('#tags').html('')
        $('#titulo').html(data[0][0]["post_head"])
        $('#Desc').html(data[0][0]["post_body"]) 
        data[0][3].forEach(element => {
            $('#tags').append(`<span class="tag">${element}</span> `)
        })
        $('#pic').attr('src', `https://localhost/Projects/easyWork/src/shared/${data[0][1]["profile_pic"]}`)
        $('#pic').attr('width', '60')
        $('#nome_partner').html(`${data[0][1]["nome"]} ${data[0][1]["Snome"]}`)
        $('#desc_partner').html(data[0][1]["bio"])
    }

    $('#agendado').toggleClass("active_user")

    $('#agendado').on('click', () => {
       makeReq('met')
       $('#agendado').addClass("active_user")
       $('#andamento').removeClass("active_user")
       $('#finalizado').removeClass("active_user")
    })

    $('#andamento').on('click', () => {
       makeReq('pending')
       $('#agendado').removeClass("active_user")
       $('#andamento').addClass("active_user")
       $('#finalizado').removeClass("active_user")

    })

    $('#finalizado').on('click', () => {
       makeReq('ok')
       $('#agendado').removeClass("active_user")
       $('#andamento').removeClass("active_user")
       $('#finalizado').addClass("active_user")
    })
    makeReq('met')

    setInterval(() => {
        makeReq('met')
    }, 10000);