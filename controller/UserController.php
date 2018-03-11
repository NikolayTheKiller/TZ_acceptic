<?php

class UserController {

    public function actionRegistration(){
        // Переменные для формы
        $login = false;
        $email = false;
        $password = false;
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            if(isset($_POST['login'])&& isset($_POST['email']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password=trim(strip_tags(md5($_POST['password'])));
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkLogin($login)) {
                $errors[] = 'login не должен быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            if ($errors == false) {
                
                 $link = User::getActivateLink($login);//создание кода активации
                 $result = User::register($login, $email, $password,$link);//добавление нового пользователя в БД(не активирован)
                 $subject= 'завершение регистрации на сайте';
                 $message='для завершения регистрации пройдите по ссылке http://acceptic/regfinish/'.$link;
                 $send= mail($email, $subject, $message);//отправка ссылки активации на почту пользователя (в ссылке вызывается метод actionFinish)
                if($result==TRUE && $send==TRUE){
                    header('location:/almost');
                }
            }}
        }        
        include_once ROOT.'/view/registration.php';
        return TRUE;
    }  
    
    
    public function actionFinish($secret){
       //сравнивает запись в БД и кодовое слово на почте
        $result = User::compare($secret);
        if($result==TRUE){
            header('location:/login');
        }
       
       return TRUE;
    } 
    
    public function actionAlmost(){
        include_once ROOT.'/view/almost.php';
        return TRUE;
    }
    
    
    //метод для входа на сайт
    public function actionLogin(){
        $email = false;
        $password = false;        
        // Обработка формы
        if (isset($_POST['submit'])&&isset($_POST['email'])&&isset($_POST['password'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password=trim(strip_tags(md5($_POST['password'])));
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
                
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet");
            }
        }
        include_once ROOT.'/view/login.php';
        return TRUE;
    }
    
    public function actionLogout()
    {
       unset($_SESSION["user"]);
       header("Location: /");
    }
    
    //редактирование данных из кабинета
    public function actionEdit()
    {
        $userId = User::checkLogged();//ID пользователя
            if (isset($_POST['submit'])&&isset($_POST['login'])) {
            $login = $_POST['login'];
            $errors = false;
            if (!User::checkLogin($login)) {
                $errors[] = 'Логин не должен быть короче 2-х символов';
            }
            if ($errors == false) {
                $result = User::edit($login);
            }
        }
         return true;
    }
     
        
    
}
