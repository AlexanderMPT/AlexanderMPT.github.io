// Липкий хедер

window.addEventListener('scroll', function () {
    let header = document.querySelector('.header');
    if (window.scrollY > 0) {
        header.classList.add('shadow');
    } else {
        header.classList.remove('shadow');
    }
});


// Стрелка для прокрутки страницы вверх

// Обнаружение прокрутки и добавление класса
window.addEventListener('scroll', function () {
    let button = document.querySelector('.back-to-top-button');
    if (window.scrollY > 500) {
        button.classList.add('show');
    } else {
        button.classList.remove('show');
    }
});

// Плавный скролл страницы наверх
document.querySelector('.back-to-top-button').addEventListener('click', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Анимация для стрелки вверх
let button = document.querySelector('.back-to-top-button');
let arrow = document.querySelector('.back-to-top-arrow');

button.addEventListener('mouseenter', function () {
    arrow.style.animationPlayState = 'paused';
});

button.addEventListener('mouseleave', function () {
    arrow.style.animationPlayState = 'running';
});



// Скролл страницы

document.addEventListener('DOMContentLoaded', function () {
    let mainLink = document.querySelector('.header__nav-link.main');
    let priceLink = document.querySelector('.header__nav-link.price');
    let messagesLink = document.querySelector('.header__nav-link.messages')
    let footerLink = document.querySelector('.header__nav-link.contacts')
    let sectionOne = document.querySelector('.section__one');
    let sectionTwo = document.querySelector('.section__two');
    let sectionThree = document.querySelector('.section__three');
    let footer = document.querySelector('.footer');

    mainLink.addEventListener('click', function (event) {
        event.preventDefault();
        sectionOne.scrollIntoView({ behavior: 'smooth' });
    });

    priceLink.addEventListener('click', function (event) {
        event.preventDefault();
        sectionTwo.scrollIntoView({ behavior: 'smooth' });
    })

    messagesLink.addEventListener('click', function (event) {
        event.preventDefault();
        sectionThree.scrollIntoView({ behavior: 'smooth' });
    })

    footerLink.addEventListener('click', function (event) {
        event.preventDefault();
        footer.scrollIntoView({ behavior: 'smooth' });
    })
});


// Попап рег/авторизации

let button__open = document.querySelector("#button__open");
let reg__popup = document.querySelector("#reg__popup");
let auto__popup = document.querySelector("#auto__popup");

button__open.addEventListener("click", function() {
    reg__popup.classList.add("open");
});

let popup_overlays = document.querySelectorAll(".popup");
popup_overlays.forEach(function (overlay) {
    overlay.addEventListener("click", function(e) {
        e.stopPropagation();
    });
});

document.addEventListener("click", function (e) {
    if (!reg__popup.contains(e.target) && !button__open.contains(e.target)) {
        reg__popup.classList.remove("open");
    }

    if (!auto__popup.contains(e.target) ) {
        auto__popup.classList.remove("open");
    }
})

let close_buttons = document.querySelectorAll(".popup__close");

close_buttons.forEach(function (close) {
    close.addEventListener("click", function () {
        reg__popup.classList.remove("open");
        auto__popup.classList.remove("open");
    })
})

let reg = document.querySelector(".reg");
let auto = document.querySelector(".auto");

reg.addEventListener("click", function() {
    reg__popup.classList.remove("open"); 
    auto__popup.classList.add("open");
});

auto.addEventListener("click", function() {
    auto__popup.classList.remove("open");
    reg__popup.classList.add("open");
});

reg.addEventListener("click", function() {
    auto__popup.classList.remove("open");
    reg__popup.classList.add("open");
});

auto.addEventListener("click", function() {
    reg__popup.classList.remove("open");
    auto__popup.classList.add("open");
});



// Попап с корзиной услуг

let product__cart = document.querySelector("#product__cart");
let first__popup = document.querySelector("#first__popup");

product__cart.addEventListener("click", function() {
    first__popup.classList.add("open");
});

let popup_over = document.querySelectorAll(".popup__cart");
popup_over.forEach(function (overlay) {
    overlay.addEventListener("click", function(e) {
        e.stopPropagation();
    });
});

let close_button = document.querySelectorAll(".popup__cart-close");

close_button.forEach(function (close) {
    close.addEventListener("click", function () {
        first__popup.classList.remove("open");
    })
})

let popup_overlay = document.querySelectorAll(".popup__cart");
popup_overlay.forEach(function (overlay) {
    overlay.addEventListener("click", function(e) {
        e.stopPropagation();
    });
});

document.addEventListener("click", function (e) {
    if (!first__popup.contains(e.target) && !product__cart.contains(e.target)) {
        first__popup.classList.remove("open");
    }
})

// Обработчики событий для кнопок "В корзину"
document.querySelectorAll('.section__three-cart').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        
        const service = this.parentElement.parentElement.querySelector('.section__three-subtitle').textContent;
        const image = this.parentElement.parentElement.querySelector('.section__three-image').getAttribute('src');
        
        addToCart(service, image);
    });
});

// Функция добавления товара в корзину
// function addToCart(service, image) {
//     fetch('add_to_cart.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: new URLSearchParams({
//             'add_to_cart': '1',
//             'service': service,
//             'image': image
//         })
//     })
//     .then(response => response.json())
//     .then(cartItems => {
//         // Обновить содержимое корзины на основе полученных данных
//         // Например, обновить HTML элемент корзины или счетчик товаров
//     })
//     .catch(error => console.error('Ошибка:', error));
// }

document.getElementById('product__cart').addEventListener('click', function() {
    window.location.href = 'add_to_cart.php';
});
