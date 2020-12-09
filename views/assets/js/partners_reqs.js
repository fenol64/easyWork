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
    $.post('https://localhost/Projects/easyWork/partner/acceptService', {id_post : id_post} , res => {
      let data = JSON.parse(res)

      if (!data.error) {
        location.reload()
      }
    })

    $('#modalService').modal('toggle')
} 


setInterval(() => {
  // get services 
    $.get('https://localhost/Projects/easyWork/partner/getservice/met', res => {
      let data = JSON.parse(res)
      $("#btn-accept").attr('onclick', `acceptService(${data.id_post})`)
      if (!data.error) {
        $('#modalService').modal('toggle')

      }
  })
}, 10000)
