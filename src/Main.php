<?php

use Egor\Database\User;

$user = new User();

while (true) {
    print("1. Вывод данных.\n");
    print("2. Добавление пользователя.\n");
    print("3. Удаление пользователя по id.\n");
    print("4. Поиск пользователя.\n");
    print("5. Обновление пользователя.\n");
    $choice = (int)readline("Выберите действие: \n");

    switch ($choice) {
        case 1:
            $users = $user->showData();
            foreach ($users as $row) {
                print($row['id'] .  " | " . $row['name'] . " | " . $row["email"] . "\n");
            }
            break;

        case 2:
            $userName = readline("username: ");
            $userEmail = readline("Email: ");
            $user->addUser($userName, $userEmail);
            break;

        case 3:
            $user->showData();
            $id = readline("Введите id пользователя: ");
            $user->deleteUser($id);
            break;

        case 4:
            $str = readline("Введите userName или email: ");
            $users = $user->searchUser($str);
            foreach ($users as $row) {
                print($row['id'] .  " | " . $row['name'] . " | " . $row["email"] . "\n");
            }
            break;

        case 5:
            $user->showData();
            $id = readline("Введите id пользователя: ");
            $name = readline("Введите имя: ");
            $email = readline("Введите email: ");
            $user->updateUser($id, $name, $email);
        default:
            print("Выбран не тот пункт меню!\n");
            break;
    }
}
