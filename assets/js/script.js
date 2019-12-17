

var select_year = document.querySelector('.select_year');
var select_month = document.querySelector('.select_month');


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


select_month.addEventListener('change', function(){

    console.log(select_month.value);
    $.ajax({
        url         : ajax_url,
        method      : "post",
        data        : {
            change_month: select_month.value
        },
        success: function( result ) {
            window.location.reload(true)
        }
      });

})