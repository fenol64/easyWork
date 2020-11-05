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