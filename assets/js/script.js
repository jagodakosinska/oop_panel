

var select_year = document.querySelector('.select_year');
var select_month = document.querySelector('.select_month');

select_year.addEventListener('change', function(){

    console.log(select_year.value);
    $.ajax({
        url         : ajax_url + "api/change_year",
        method      : "post",
        data        : {
            year: select_year.value
        },
        success: function( result ) {
            window.location.reload(true)
        }
      });

})


select_month.addEventListener('change', function(){

    console.log(select_month.value);
    $.ajax({
        url         : ajax_url + "api/change_month",
        method      : "post",
        data        : {
            month: select_month.value
        },
        success: function( html ) {
            $("#dupa").html(html);
            }
      });

})









// var select_year = document.querySelector('.select_year');
// var option = document.querySelector('option');
// document.forms[0].reset();
// option.selected = false;

// select_year.addEventListener('click', function(){
//     console.log(select_year.value);
        // option.selected.innerHTML = option.textContent;
    //    option.forEach(opt => {
    //     console.log(opt.value);
    // })
    //    }); 
    //    option.defaultSelected = true; 
    //  option.selected.value = 'selected';
    //          console.log(option.value);



// var month = document.querySelector('.select_month');
// console.log('hello world')
// var url = '/new_contracts/contract/'

// month.addEventListener('click', function(){
//     console.log(month.textContent)
// })
