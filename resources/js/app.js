require('./bootstrap');

// main pod scroll
document.querySelector('.pod-wrapper').addEventListener('click', function () {
    document.querySelector('.marketing-instrument').scrollIntoView();
});

// Login popup

// document.querySelector('header ul > li:nth-child(2)').addEventListener('click', function () {
//     let element = `<div class="login-form">
//        <h1>Войти</h1>
//         <form>
//             <input type="text" placeholder="Email">
//             <input type="text" placeholder="password">
//             <input type="submit">
//         </form>
//     </div>
// `;
//     document.body.append(element);
// })


// preventDefault for forms

document.querySelector('form').addEventListener('submit' , function (e) {
    e.preventDefault();
})
