document.getElementById("confirm_password").addEventListener("input", function() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    var errorText = document.getElementById("password_error");
    var registerButton = document.getElementById("register_button");

    if (password !== confirmPassword && confirmPassword !== "") {
      errorText.textContent = "Пароли не совпадают";
      registerButton.disabled = true;
    } else {
      errorText.textContent = "";
      registerButton.disabled = false;
    }
  })

  const regionInput = document.getElementById('region');
const regionList = document.getElementById('regionList');

let regionSelected = false;

regionInput.addEventListener('input', function() {
  if (regionSelected) {
    regionInput.value = ""; // Очищаем поле ввода региона
    regionList.innerHTML = ""; // Скрываем список вариантов
    regionSelected = false; // Сбрасываем флаг выбора региона
  } else {
    const userInput = this.value.trim();
    if (userInput.length > 0) {
      fetchRegions(userInput);
    } else {
      regionList.innerHTML = "";
    }
  }
});

regionInput.addEventListener('change', function() {
  regionSelected = true;
  regionInput.blur(); // Убираем фокус с поля ввода
});

regionInput.addEventListener('blur', function() {
  if (!regionSelected) {
    regionList.innerHTML = ""; // Скрываем список вариантов при потере фокуса, если регион не выбран
  }
});

regionInput.addEventListener('click', function() {
  if (regionSelected) {
    regionInput.value = ""; // Очищаем поле ввода региона при повторном нажатии
    regionList.innerHTML = ""; // Скрываем список вариантов
    regionSelected = false; // Сбрасываем флаг выбора региона
  }
});

async function fetchRegions(query) {
  try {
    const response = await fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': 'Token d4fdaa019ad8be70b96ca04eb1bba474653b63c1'
      },
      body: JSON.stringify({ query: query })
    });
    const data = await response.json();
    updateRegionList(data.suggestions);
  } catch (error) {
    console.error('Ошибка:', error);
  }
}

function updateRegionList(suggestions) {
  regionList.innerHTML = "";
  suggestions.forEach(suggestion => {
    const region = suggestion.data.region_with_type.split(',')[0].trim(); // Получаем только регион из полного адреса
    const option = document.createElement('option');
    option.value = region;
    regionList.appendChild(option);
  });
  console.log(region);
}




async function fetchCities(query, region) {
  try {
    const response = await fetch('https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': 'Token d4fdaa019ad8be70b96ca04eb1bba474653b63c1'
      },
      body: JSON.stringify({ query: query, region: region })
    });
    const data = await response.json();
    console.log(data)
    updateCityDropdown(data.suggestions);
  } catch (error) {
    console.error('Ошибка:', error);
  }
}

const cityDropdown = document.getElementById('city');

regionInput.addEventListener('change', function() {
  const selectedRegion = this.value.trim();
  if (selectedRegion.length > 0) {
    fetchCities('', selectedRegion); // Fetch cities for the selected region
  } else {
    cityDropdown.innerHTML = ""; // Clear the city dropdown if no region is selected
  }
});

function updateCityDropdown(cities) {
  cityDropdown.innerHTML = ""; // Clear the city dropdown before updating
  cities.forEach(city => {
    const option = document.createElement('option');
    option.value = city.data.city_with_type; // Assuming city_with_type contains the city name
    option.textContent = city.data.city_with_type; // Set the text content of the option
    cityDropdown.appendChild(option); // Add the city to the dropdown
  });
}
