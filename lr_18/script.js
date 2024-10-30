// Проверка правильности email с использованием test()
function validateEmail() {
	const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
	const email = document.getElementById('email3').value;
  
	// Проверяем соответствие введённого email регулярному выражению
	const isValid = emailRegex.test(email);
	document.getElementById('emailResult3').innerText = 
	  isValid ? "Адрес электронной почты действителен." : "Адрес электронной почты недействителен.";
  }
  
  // Извлечение номера телефона с новой маской +375(33)333-33-33 с использованием exec()
  function extractPhoneNumber() {
	// Новое регулярное выражение для формата +375(33)333-33-33
	const phoneRegex = /^\+375\((\d{2})\)(\d{3})-(\d{2})-(\d{2})$/;
	const phone = document.getElementById('phone3').value;
  
	// Применяем регулярное выражение для извлечения частей номера телефона
	const result = phoneRegex.exec(phone);
	if (result) {
	  document.getElementById('phoneResult3').innerText = 
		`Код страны: +375, Код оператора: ${result[1]}, Номер: ${result[2]}-${result[3]}-${result[4]}`;
	} else {
	  document.getElementById('phoneResult3').innerText = "Номер телефона недействителен.";
	}
  }
  
  // Разделение строки на фрукты с помощью split()
  function splitFruits() {
	const fruitsText = document.getElementById('fruits3').value;
  
	// Разделяем строку по знакам ",", ";" или "|" с использованием регулярного выражения
	const fruits = fruitsText.split(/[,;|]\s*/);
	document.getElementById('fruitResult3').innerText = `Фрукты: ${fruits.join(', ')}`;
  }
  
  // Поиск дат в тексте с использованием match()
  function findDates() {
	const text = document.getElementById('text3').value;
	const dateRegex = /\d{2}\/\d{2}\/\d{4}/g;
  
	// Находим все даты в формате дд/мм/гггг в тексте
	const dates = text.match(dateRegex);
	document.getElementById('dateResult3').innerText = dates ? `Найденные даты: ${dates.join(', ')}` : "Даты не найдены";
  }
  