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
