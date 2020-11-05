<?php $v->layout("themes/template_dash") ?>
<div class="result"></div>

<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/libs/chart.js"); ?>"></script>
    <script src="<?= asset("js/admin.js"); ?>"></script>
    <script>
        var header = document.getElementById("listnav");
        var btns = header.getElementsByClassName("item");
        
        $.get('https://localhost/Projects/easyWork/admin/getView', {'view': 'Inicio'} , view => {
                  $('.result').html(view)
        })
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {

            var current = document.getElementsByClassName("active");

            if (current.length > 0) { 
              current[0].className = current[0].className.replace(" active", "");
            } 
              this.className += " active";

              $.get('https://localhost/Projects/easyWork/admin/getView', {'view': this.innerText} , view => {
                  $('.result').html(view)
              })
            }
          );
        }
    </script>
<?php $v->end(); ?>