<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $name = "Имя: " . $_POST["name"] . "\n";
  $emaill = "Почта: " . $_POST["email"] . "\n";
  $password = "Пароль: " . $_POST["password"] . "\n";
  $confirmpassword = "Подтверждение пароля: " . $_POST["confirm_password"] . "\n";
  $consent = isset($_POST["consent"]) ? "Согласие на обработку данных: Да\n" : "Согласие на обработку данных: Нет\n";
  $region = "Регион: " . $_POST["region"] . "\n";
  $city = "Город: " . $_POST["city"] . "\n";
  $avatar = is_uploaded_file($_FILES["avatar"]["tmp_name"]) ? "Файл аватара: загружен\n" : "Файл аватара: не загружен\n";
  $gender = "Пол: " . (isset($_POST["gender"]) ? $_POST["gender"] : "Не указан") . "\n";
  $size = "Размер одежды: " . (isset($_POST["size"]) && is_array($_POST["size"]) && count($_POST["size"]) > 0 ? implode(", ", $_POST["size"]) : "Не указан") . "\n\n";

  // Попробуйте открыть файл для записи
  try {
    $namefile = "data/" . $email . ".txt";
    if (!is_dir(dirname($namefile))) {
        mkdir(dirname($namefile), 0777, true);
    }
    $fp = fopen($namefile, "w");
    if ($fp === false) {
      throw new Exception("Не удалось открыть файл для записи");
    }

    // Запись в файл
    fwrite($fp, "$name" . PHP_EOL);
    fwrite($fp, "$emaill" . PHP_EOL);
    fwrite($fp, "$password" . PHP_EOL);
    fwrite($fp, "$confirmpassword" . PHP_EOL);
    fwrite($fp, "$consent" . PHP_EOL);
    fwrite($fp, "$region" . PHP_EOL);
    fwrite($fp, "$city" . PHP_EOL);
    fwrite($fp, "$avatar" . PHP_EOL);
    fwrite($fp, "$gender" . PHP_EOL);
    fwrite($fp, "$size" . PHP_EOL);

    // Закрытие файла
    fclose($fp);
    echo "Файл успешно создан.";
  } catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
  }
}
?>
