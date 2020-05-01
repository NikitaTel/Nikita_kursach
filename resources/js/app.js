//Scroll

document.querySelector('.pod-wrapper').addEventListener('click', function () {
    document.querySelector('.marketing-instrument').scrollIntoView();
});

// prevent

document.querySelector('form').addEventListener('submit' , function (e) {
    e.preventDefault();
})
