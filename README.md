# Lab2_FORUM
------------------------------------------
Задание
------------------------------------------
Разработать и реализовать клиент-серверную информационную систему, реализующую мехнизм CRUD. Система представляет собой веб-страницу с лентой заметок и форму добавления новой заметки. Система должна обладать следующим функционалом:

- Добавление текстовых заметок в общую ленту
- Реагирование на чужие заметки (лайки)
------------------------------------------
Ход работы
------------------------------------------
#### 1. Интерфейс страницы
![Интерфейс](https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/интерфейс.png)
#### 2. Сцерании работы
Изначально пользователь попадает на главную страницу index.php.
На этой странице предлагается ввести логин на сервере, тест поста и при необходимости загрузить изображение. Если все данные введены корректко, пост появляется на общей стене в самом начале (обратный хронологический порядок). 
Пользователи имеют возможность реагировать на посты лайками.
Также пользователь, написавший пост, может отредактировать его, нажав кнопку "изменить". Кнопка ведет на страницу "update.php", где может изменть содержание записи и отправить.
Кновка "удалить" предназначена для удаления поста.
#### 3. Хореография
- Добавление поста

![Добавление поста](https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Добавление%20поста.png)

- Удаление поста

![Удаление поста](https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Удаление%20поста.png)

#### 4. Стрктура БД
- Таблица post
![Таблица post](https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Структура%20БД%20post.png)

- Таблица likes

![Таблица likes](https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Структура%20БД%20likes.png)

#### 5. Описание алгоритмов
- Добавление поста
<p align = "left"> <img src="https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Блок-схема%20создание%20поста.png"> </p>

- Изменение поста
<p align = "left"> <img src="https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Блок-схема%20изменение%20поста.png"> </p>

- Удаление поста
<p align = "left"> <img src="https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Блок-схема%20удаление%20поста.png"> </p>

- Реакция на пост
<p align = "left"> <img src="https://github.com/Daniil-Kazakov1/Lab2_FORUM/blob/main/Блок-схема%20реакция%20на%20пост.png"> </p>

#### 6. Значимые фрагменты кода
Обновление поста:
```php
    session_start();
    require_once 'connect.php';

    $id = $_POST['id'];
    $post = $_POST['post'];
    $login = $_POST['login'];
    $date = date(" H : i : s d - m - Y ");
    $path = 'uploads/'. time(). $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], $path);

    mysqli_query($connect, "UPDATE `post` SET
        `login` = '$login', `text` = '$post', `img` = '$path', `date` = '$date' WHERE `post`.`id` = '$id'");
    header('Location:../index.php'); 
 ```
 
Отправка данных поста:
```php
    session_start();
    require_once 'connect.php';

    $post = $_POST['post'];
    $login = $_POST['login'];
    $date = date(" H : i : s d - m - Y ");
    $path = 'uploads/'. time(). $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], $path);

    if(!move_uploaded_file($_FILES['img']['tmp_name'], $path)){
        echo "Ошибка загрузки файла!";
    }

    mysqli_query($connect, "INSERT INTO `post`(`id`, `login`, `text`, `date`, `img`)
                VALUES(NULL, '$login', '".addslashes($post)."', '$date', '$path')");
    header('Location:../index.php');
 ```
