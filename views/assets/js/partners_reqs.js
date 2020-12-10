var header = document.getElementById("listnav");
var btns = header.getElementsByClassName("item");

$.get('https://localhost/Projects/easyWork/partner/getView', {'view': 'Inicio'} , view => {
          $('.view_partner').html(view)
})
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {

    var current = document.getElementsByClassName("active");

    if (current.length > 0) { 
      current[0].className = current[0].className.replace(" active", "");
    } 
      this.className += " active";

      $.get('https://localhost/Projects/easyWork/partner/getView', {'view': this.innerText} , view => {
          $('.view_partner').html(view)
      })
    }
  );
}

function acceptService(id_post) {
  console.log(id_post)
    $.post('https://localhost/Projects/easyWork/partner/acceptService', { id_post } , res => {
      let data = JSON.parse(res)

      if (!data.error) {
        location.reload()
      }
    })

    $('#modalService').modal('toggle')
} 

function post_spec(id_post) {
  $.post('https://localhost/Projects/easyWork/partner/detailService', { id_post : id_post }, res => {
      var data = JSON.parse(res)
      buildModal(data)
  })
}

function endservice(id_post) {
  $.post('https://localhost/Projects/easyWork/partner/endService', { id_post : id_post }, res => {
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
  $('#endbtn').attr('onclick', `endservice(${data[0][0]["id_post"]})`)
}

function renderPost(posts) {
  $('#root').html('')
    posts.forEach(element => {
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


function getposts(type) {
  $.get(`https://localhost/Projects/easyWork/partner/getservices/${type}`, res => {
    let data = JSON.parse(res)
    renderPost(data)
  })
}

setInterval(() => {
  // get services
  getposts('pending') 
  $.get('https://localhost/Projects/easyWork/partner/getservice/met', res => {
    let data = JSON.parse(res)
    $("#btn-accept").attr('onclick', `acceptService(${data.id_post})`)
    if (!data.error) {
      $('#modalService').modal('toggle')

    }
})
}, 1000)





