
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profilepic')
                    .attr('src', e.target.result)
                    .attr('style', 'border-radius:100%;width:100px;height:100px')
            };

            reader.readAsDataURL(input.files[0]);
        }
    }










