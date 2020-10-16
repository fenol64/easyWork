(function () {


    function makeReq(type) {
        $.post('https://localhost/Projects/easyWork/dash/getService', { type }, res => {
            console.log(res)
        })
    }

    $('#agendado').on('click', () => {
        makeReq('met')
    })

    $('#andamento').on('click', () => {
        makeReq('pending')

    })

    $('#finalizado').on('click', () => {
        makeReq('ok')

    })

} ())