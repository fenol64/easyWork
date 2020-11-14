$(function () {
    $("form").submit(function (e) {
        e.preventDefault()

        var form = $(this);
        var action = form.attr("action");
        var data = form.serialize();

        if (action === 'https://localhost/Projects/easyWork/register-partner') {
            uploadFile($('#profilepic'))
            var data = {
                'mei': document.getElementById('mei').value,
                'capable': JSON.stringify(todos)
            }
        }

        if (action === 'https://localhost/Projects/easyWork/dash/addService') {
            var data = {
                'title': $('#title').val(),
                'description': $('#description').val(),
                'capable': JSON.stringify(todos)
            }
        }
        console.log(data)
        $.ajax({
            url: action,
            data,
            type: "post",
            dataType: "json",
            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (su) {
                ajax_load("close");

                if (su.message) {
                    var view = '<div class="message ' + su.message.type + '">' + su.message.message + '</div>';
                    $(".call_back").html(view);
                    $(".message").effect("bounce");
                    return;
                }

                if (su.redirect) {
                    window.location.href = su.redirect.url;
                }
            }
        });

        function ajax_load(action) {
            ajax_load_div = $(".ajax_load");

            if (action === "open") {
                ajax_load_div.fadeIn(200).css("display", "flex");
            }

            if (action === "close") {
                ajax_load_div.fadeOut(200);
            }
        }
    });

    function uploadFile(file) {
        const image = file[0].files[0]
    
        let fd = new FormData()
        fd.append('image', image)
    
        let req = new XMLHttpRequest()
        req.onreadystatechange =  () => {
            if (req.readyState === 4 && req.status === 200) {
                alert('ok')
            }
        }

        req.open('POST', 'https://localhost/Projects/easyWork/register-partner', true)
        req.send(fd)
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#img_preview').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      
      $("#profilepic").change(function() {
        readURL(this)
      });
      
      function cpf(cpf){
        cpf = cpf.replace(/\D/g, '');
        if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) $('#result-validate').html(`<div class="text-danger text-center">CPF inválido</div>`)   ;
        var result = true;
        [9,10].forEach(function(j){
            var soma = 0, r;
            cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
                soma += parseInt(e) * ((j+2)-(i+1));
            });
            r = soma % 11;
            r = (r <2)?0:11-r;
            if(r != cpf.substring(j, j+1)) result = false;
        });
        console.log(result)
        if (!result) {
            $('#result-validate').html(`<div class="text-danger text-center">CPF inválido</div>`)   
        } else {
            $('#result-validate').html(``)   
        }

    }


    $('#cpf').keyup(() => {
        cpf($('#cpf').val())
    })

});