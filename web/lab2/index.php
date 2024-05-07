<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		
	</div>
	<div class="main">
		<form action="smt.php" method="POST" enctype="multipart/form-data">
			<div class="main__info">
				<h1>Форма регистрации</h1>
			</div>
			<div class="main__required">
				<div class="required__name">
					<label for="name">Имя:</label>
					<input type="text" id="name" name="name" required>
				</div>
				<div class="required__email">
					<label for="email">Почта:</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="required__password">
					<label for="password">Пароль (минимум 5 символов):</label>
					<input type="password" id="password" name="password" minlength="5" required>
				</div>
				<div class="required__confirm_password">
					<label for="confirm_password">Подтверждение пароля:</label>
					<input type="password" id="confirm_password" name="confirm_password" required>
					<p id="password_error" style="color: red;"></p>
				</div>
				<div class="required__consent">
					<input type="checkbox" id="consent" name="consent" required>
					<a class="consent" href="#">Я согласен на обработку персональных данных</a>
				</div>
				<div class="required__region">
					<label for="region">Выберите регион:</label>
					<input type="text" id="region" list="regionList">
					<datalist id="regionList"></datalist>

				</div>
				<div class="required__city">
					<label for="city">Город (выбрать из списка):</label>
					<select id="city" name="city" required>
					</select>
				</div>
			</div>
			<div class="main__additional">
				<h3>Дополнительная информация</h3>
			</div>
			<div class="main__optional">
				<div class="optional__avatar">
					<label for="avatar">Загрузка файла аватара (разрешены только изображения):</label>
					<input type="file" id="avatar" name="avatar" accept="image/*">
				</div>
				<div class="optional__gender">
					<label for="gender">Пол:</label><br>
					<div class="gender__variant">
						<div class="variant__male">
							<input type="radio" id="male" name="gender" value="male">
							<label for="male">Мужской</label><br>
						</div>
						<div class="variant__female">
							<input type="radio" id="female" name="gender" value="female">
							<label for="female">Женский</label>
						</div>
						<div class="variant__unimportant">
							<input type="radio" id="unimportant" name="gender" value="unimportant">
							<label for="unimportant">Не важно</label>
						</div>
					</div>
				</div>
				<div class="optional__size">
					<label for="clothing_size">Ваш размер одежды, можно выбрать несколько:</label><br>
					<div class="size__variant">
						<div class="variant__xs">
							<input type="checkbox" id="size_xs" name="size[] multiple" value="XS">
							<label for="size_xs">XS</label><br>
						</div>
						<div class="variant__s">
							<input type="checkbox" id="size_s" name="size[] multiple" value="S">
							<label for="size_s">S</label><br>
						</div>
						<div class="variant__m">
							<input type="checkbox" id="size_m" name="size[] multiple" value="M">
							<label for="size_m">M</label><br>
						</div>
						<div class="variant__l">
							<input type="checkbox" id="size_l" name="size[] multiple" value="L">
							<label for="size_l">L</label><br>
						</div>
						<div class="variant__xl">
							<input type="checkbox" id="size_xl" name="size[] multiple" value="XL">
							<label for="size_xl">XL</label><br>
						</div>
						<div class="variant__xxl">
							<input type="checkbox" id="size_xxl" name="size[] multiple" value="XXL">
							<label for="size_xxl">XXL</label>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" id="register_button">Зарегистрироваться</button>
		</form>
	</div>
	<div class="footer">
	</div>
	<script src="script/script.js"></script>
</body>

</html>