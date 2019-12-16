

var select_year = document.querySelector('.select_year');



select_year.addEventListener('change', function(){

    console.log(select_year.value);
    $.ajax({
        url         : ajax_url,
        method      : "post",
        data        : {
            change_year: select_year.value
        },
        success: function( result ) {
            window.location.reload(true)
        }
      });

})


