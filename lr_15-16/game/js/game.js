const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");

// Создаем новый объект изображения для фона
const ground = new Image();
ground.src = "img/ground.png";

// Создаем новый объект изображения для еды
const foodImg = new Image();
foodImg.src = "img/food.png";

// Устанавливаем размер одной клетки
let box = 32;

// Инициализируем счет
let score = 0;

// Создаем объект еды с случайными координатами
let food = {
  x: Math.floor((Math.random() * 17 + 1)) * box,
  y: Math.floor((Math.random() * 15 + 3)) * box,
};

// Создаем массив для змеи и добавляем первый сегмент
let snake = [];
snake[0] = {
  x: 9 * box,
  y: 10 * box
};

// Добавляем обработчик события нажатия клавиш
document.addEventListener("keydown", direction);

// Переменная для направления движения змеи
let dir;

// Функция для определения направления движения
function direction(event) {
  // Проверяем нажатие клавиши влево
  if(event.keyCode == 37 && dir != "right")
    dir = "left";
  // Проверяем нажатие клавиши вверх
  else if(event.keyCode == 38 && dir != "down")
    dir = "up";
  // Проверяем нажатие клавиши вправо
  else if(event.keyCode == 39 && dir != "left")
    dir = "right";
  // Проверяем нажатие клавиши вниз
  else if(event.keyCode == 40 && dir != "up")
    dir = "down";
}

// Функция для проверки, съела ли змея свой хвост
function eatTail(head, arr) {
  for(let i = 0; i < arr.length; i++) {
    // Если голова совпадает с любым сегментом хвоста, останавливаем игру
    if(head.x == arr[i].x && head.y == arr[i].y)
      clearInterval(game);
  }
}

// Функция для рисования игры
function drawGame() {
  // Рисуем фон
  ctx.drawImage(ground, 0, 0);

  // Рисуем еду
  ctx.drawImage(foodImg, food.x, food.y);

  // Рисуем змею
  for(let i = 0; i < snake.length; i++) {
    ctx.fillStyle = i == 0 ? "green" : "red";
    ctx.fillRect(snake[i].x, snake[i].y, box, box);
  }

  // Рисуем счет
  ctx.fillStyle = "white";
  ctx.font = "50px Arial";
  ctx.fillText(score, box * 2.5, box * 1.7);

  // Получаем координаты головы змеи
  let snakeX = snake[0].x;
  let snakeY = snake[0].y;

  // Проверяем, съела ли змея еду
  if(snakeX == food.x && snakeY == food.y) {
    score++;
    // Генерируем новые координаты еды
    food = {
      x: Math.floor((Math.random() * 17 + 1)) * box,
      y: Math.floor((Math.random() * 15 + 3)) * box,
    };
  } else {
    // Удаляем последний сегмент змеи
    snake.pop();
  }
  // Проверяем, не вышла ли змея за границы
  if(snakeX < box || snakeX > box * 17
    || snakeY < 3 * box || snakeY > box * 17)
    clearInterval(game);

  // Обновляем координаты головы в зависимости от направления
  if(dir == "left") snakeX -= box;
  if(dir == "right") snakeX += box;
  if(dir == "up") snakeY -= box;
  if(dir == "down") snakeY += box;

  // Создаем новый сегмент головы
  let newHead = {
    x: snakeX,
    y: snakeY
  };

  // Проверяем, не съела ли змея свой хвост
  eatTail(newHead, snake);

  // Добавляем новый сегмент головы в начало массива
  snake.unshift(newHead);
}

let game = setInterval(drawGame, 150);

