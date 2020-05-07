//Scroll
window.$ = window.jQuery = require('jquery')

document.querySelector('.pod-wrapper').addEventListener('click', function () {
    document.querySelector('.marketing-instrument').scrollIntoView();

});

// prevent

document.querySelector('form').addEventListener('submit' , function (e) {
    e.preventDefault();
})


    $('.order-file-wrapper > input').change(function(){
        var value = $(".order-file-wrapper > input").val();
        $('.order-file-wrapper > span').text(value);

    });
