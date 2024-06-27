function calculate() {
    // Получаем значения из формы
    const a = parseFloat(document.getElementById('a').value);
    const b = parseFloat(document.getElementById('b').value);
    const c = parseFloat(document.getElementById('c').value);
    const x = parseFloat(document.getElementById('x').value);
    let result;

    try {
        // Выполняем расчет по формуле
        result = calculateF(a, b, c, x);
    } catch (error) {
        // Обрабатываем исключительные ситуации
        alert(error.message);
        return;
    }

    // Отображаем результат в HTML-документе
    document.getElementById('result').textContent = `Результат: ${result}`;
}

function calculateF(a, b, c, x) {
    if (a < 0 && c !== 0) {
        return a * Math.pow(x, 2) + b * x + c;
    } else if (a > 0 && c === 0) {
        if (x === c) {
            throw new Error('Делить на ноль нельзя!');
        }
        return -a / (x - c);
    } else {
        return a * (x + c);
    }
}


// Создание строковых переменных
var s1 = "Бородич";
var s2 = "Новооктябрьская, 14";

//Определение длины строки s1
var lengthS1 = s1.length;

//Сцепление строк s1 и s2
var concatenatedString = s1 + " " + s2;

// 3. Преобразование строки s2 в нижний регистр
var lowerCaseS2 = s2.toLowerCase();

// Вывод результатов на страницу
var outputDiv = document.getElementById("output");
outputDiv.innerHTML = "Длина строки s1: " + lengthS1 + "<br><br>" +
                      "Сцепленная строка: " + concatenatedString + "<br><br>" +
                      "Строка s2 в нижнем регистре: " + lowerCaseS2;
