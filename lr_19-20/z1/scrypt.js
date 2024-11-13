

//КНОПКА "ВВЕРХ"
$(document).ready(function() {
    // Показать кнопку при прокрутке вниз на 20px от верхней части документа
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            $('#scrollToTopBtn').fadeIn();
        } else {
            $('#scrollToTopBtn').fadeOut();
        }
    });

    // При клике на кнопку прокрутить страницу вверх
    $('#scrollToTopBtn').click(function() {
        $('html, body').animate({scrollTop: 0},200); // Плавная прокрутка
        return false;
    });
});

//ИНТЕРАКТИВ ДЛЯ ВЫПАДАЮЩЕГО СПИСКА
$(document).ready(function(){
    $('.dropdown-item').click(function(event){
        event.preventDefault();
        var message = $(this).data('message');
        alert('Вы выбрали: ' + message);
    });
});

// //ОКНО КОНСУЛЬТАЦИИ
// document.addEventListener('DOMContentLoaded', () => {
//     const openModalBtn = document.getElementById('openModalBtn1');
//     const modal = document.getElementById('modal1');
//     const closeBtn = document.querySelector('.close');

//     openModalBtn.addEventListener('click', () => {
//         modal.style.display = 'block';
//     });

//     closeBtn.addEventListener('click', () => {
//         modal.style.display = 'none';
//     });

//     window.addEventListener('click', (event) => {
//         if (event.target === modal) {
//             modal.style.display = 'none';
//         }
//     });
// });

// Задание 3

document.addEventListener('DOMContentLoaded', () => {
    const openModalBtn = document.getElementById('openModalBtn1');
    const modal = document.getElementById('modal1');
    const closeBtn = document.querySelector('.close');
    const form = document.getElementById('userDataForm');
    const clearLocalStorageBtn = document.getElementById('clearLocalStorageBtn');

    // Убедимся, что элементы найдены перед добавлением обработчиков
    if (!form) {
        console.error('Форма не найдена!');
        return; // Прерываем выполнение, если форма не найдена
    }

    // Показать модальное окно и загрузить данные из Local Storage
    openModalBtn.addEventListener('click', () => {
        modal.style.display = 'block';
        loadFormDataFromLocalStorage();
    });

    // Закрыть модальное окно
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Сохранение данных в Local Storage при отправке формы
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Предотвращаем перезагрузку страницы
        saveFormDataToLocalStorage();
        alert('Данные сохранены в Local Storage');
    });

    // Очистка данных из Local Storage
    clearLocalStorageBtn.addEventListener('click', () => {
        clearLocalStorage();
        alert('Local Storage очищен');
    });

    // Функция для сохранения данных в Local Storage
    function saveFormDataToLocalStorage() {
        const userData = {
            name: document.getElementById('name').value,
            surname: document.getElementById('surname').value,
            phone: document.getElementById('phone').value,
            mail: document.getElementById('mail').value
        };

        // Получаем текущие данные из Local Storage, если они есть
        let existingData = localStorage.getItem('userData');

        console.log('existingData перед проверкой:', existingData);  // Логируем

        // Проверяем, если данные существуют в Local Storage
        if (existingData) {
            try {
                existingData = JSON.parse(existingData);
                console.log('Данные после парсинга:', existingData);  // Логируем результат парсинга

                // Если после парсинга не массив, создаем пустой массив
                if (!Array.isArray(existingData)) {
                    console.warn('Данные в localStorage не являются массивом, создаем новый массив.');
                    existingData = [];
                }
            } catch (e) {
                console.error('Ошибка при парсинге данных из localStorage:', e);
                existingData = [];
            }
        } else {
            existingData = [];
        }

        // Добавляем новые данные в массив
        existingData.push(userData);

        // Сохраняем обновленный массив в Local Storage
        localStorage.setItem('userData', JSON.stringify(existingData));

        console.log('Обновленные данные в localStorage:', existingData); // Логируем обновленные данные
    }

    // Функция для загрузки данных из Local Storage в форму
    function loadFormDataFromLocalStorage() {
        const userDataStr = localStorage.getItem('userData');
        if (userDataStr) {
            try {
                const userDataArray = JSON.parse(userDataStr);
                console.log('Данные из localStorage:', userDataArray); // Логируем загруженные данные
                if (userDataArray.length > 0) {
                    // Загружаем последние введенные данные в форму
                    const latestData = userDataArray[userDataArray.length - 1];
                    document.getElementById('name').value = latestData.name || '';
                    document.getElementById('surname').value = latestData.surname || '';
                    document.getElementById('phone').value = latestData.phone || '';
                    document.getElementById('mail').value = latestData.mail || '';
                }
            } catch (e) {
                console.error('Ошибка при парсинге данных из localStorage:', e);
            }
        }
    }

    // Функция для очистки данных из Local Storage и формы
    function clearLocalStorage() {
        localStorage.removeItem('userData');
        form.reset(); // Сбрасываем все поля формы
    }
});





// КРАСНЫЙ ЛАЙК
function like(id) {
    let src = document.getElementById(id).src;
    console.log(src);
    if (src === "file:///D:/College/3%20%D0%BA%D1%83%D1%80%D1%81/1%20%D0%BF%D1%80%D0%B0%D0%BA%D1%82%D0%B8%D0%BA%D0%B8/%D0%B2%D0%B5%D0%B1_%D0%BF%D1%80%D0%B0%D0%BA%D1%82%D0%B8%D0%BA%D0%B0/source/img/null_heart.svg") {
        document.getElementById(id).src = "source/img/full_heart.svg"
    } else {
        document.getElementById(id).src = "source/img/null_heart.svg"
    }
}

// ПОДСКАЗКА К КНОПКЕ
$(function(){
    $("#openModalBtn1").tooltip();
    $("#openButton").tooltip();
});


// // СЛАЙДЕР
// /* Устанавливаем стартовый индекс слайда по умолчанию: */
// let slideIndex = 1;
// /* Вызываем функцию, которая реализована ниже: */
// showSlides(slideIndex);

// /* Увеличиваем индекс на 1 — показываем следующий слайд: */
// function nextSlide() {
//     showSlides(slideIndex += 1);
// }

// /* Уменьшаем индекс на 1 — показываем предыдущий слайд: */
// function previousSlide() {
//     showSlides(slideIndex -= 1);  
// }

// /* Устанавливаем текущий слайд: */
// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// /* Функция перелистывания: */
// function showSlides(n) {
//     /* Обращаемся к элементам с названием класса "item_slider", то есть к картинкам: */
//     let slides = document.getElementsByClassName("item_slider");
    
//     /* Проверяем количество слайдов: */
//     if (n > slides.length) {
//         slideIndex = 1;
//     }
//     if (n < 1) {
//         slideIndex = slides.length;
//     }
  
//     /* Проходим по каждому слайду в цикле for: */
//     for (let slide of slides) {
//         slide.style.display = "none";
//     }
//     /* Делаем элемент блочным: */
//     slides[slideIndex - 1].style.display = "block";
// }

// // Добавляем анимацию перехода
// function showSlides(n) {
//     let slides = document.getElementsByClassName("item_slider");

//     if (n > slides.length) {
//         slideIndex = 1;
//     }
//     if (n < 1) {
//         slideIndex = slides.length;
//     }

//     for (let slide of slides) {
//         slide.style.display = "none";
//         slide.style.opacity = 0; // Для анимации плавного исчезновения
//         slide.style.transition = "opacity 0.5s"; // Плавный переход
//     }

//     slides[slideIndex - 1].style.display = "block";
//     setTimeout(() => {
//         slides[slideIndex - 1].style.opacity = 1; // Для анимации плавного появления
//     }, 10); // Небольшая задержка для запуска анимации
// }


document.addEventListener('DOMContentLoaded', () => {
    // Получаем кнопки и элементы модального окна
    const cartButton = document.querySelector('.icon_shop');
    const cartModal = document.getElementById('cartModal');
    const closeButton = document.querySelector('.close');
    const cartItemsList = document.getElementById('cartItems');
    const checkoutButton = document.getElementById('checkoutButton');
    const catalog = document.getElementById('catalog');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Функция для отображения товаров в каталоге
    function displayCatalog(products) {
        catalog.innerHTML = ''; // Очистить каталог
        products.forEach(product => {
            const productElement = document.createElement('div');
            productElement.classList.add('product');
            productElement.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <p>Цена: ${product.price} ₽</p>
                <button class="add-to-cart" data-id="${product.id}">Добавить в корзину</button>
            `;
            catalog.appendChild(productElement);
        });
        // Добавляем обработчики на кнопки "Добавить в корзину"
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', addToCart);
        });
    }

    // Функция для добавления товара в корзину
    function addToCart(event) {
        const productId = event.target.getAttribute('data-id');
        fetch('products.json')
            .then(response => response.json())
            .then(products => {
                const product = products.find(item => item.id == productId);
                cart.push(product);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
                // *** ДОБАВЛЕННЫЙ alert ***
                alert(`Товар "${product.name}" добавлен в корзину!`); // <-- это строка
            })
            .catch(error => console.error('Ошибка загрузки товаров:', error));
    }

    // Функция для обновления корзины
    function updateCart() {
        cartItemsList.innerHTML = ''; // Очистить список товаров в корзине
        cart.forEach(product => {
            const itemElement = document.createElement('li');
            itemElement.textContent = `${product.name} - ${product.price} ₽`;
            cartItemsList.appendChild(itemElement);
        });
    }

    // Открытие корзины
    cartButton.addEventListener('click', () => {
        cartModal.style.display = 'flex';
        updateCart();
    });

    // Закрытие корзины
    closeButton.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });

    // Закрытие корзины при клике за пределами модального окна
    window.addEventListener('click', (event) => {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
    });

    // Оформить заказ (очистить корзину)
    checkoutButton.addEventListener('click', () => {
        localStorage.removeItem('cart');
        cart = [];
        updateCart();
        alert('Заказ оформлен!');
        cartModal.style.display = 'none';
    });

    // Загрузить товары и отобразить каталог
    fetch('products.json')
        .then(response => response.json())
        .then(displayCatalog)
        .catch(error => console.error('Ошибка загрузки товаров:', error));
});

