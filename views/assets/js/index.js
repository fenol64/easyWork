new Glide('.glide', {
    type: 'carousel',
    perView: 4
}).mount()

$(' #btn-form-submit ').click(() => {
    let search = $('#service_box').val()
    let formarted = search.replace(/ /g,"-")
    window.location.href = `https://localhost/Projects/easyWork/servicos/${formarted}`
})

