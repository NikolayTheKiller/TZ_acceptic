<?php

class CabinetController {
    public function actionIndex(){
        $userID = User::checkLogged();
        $user = User::getUserById($userID);
              
        include_once ROOT.'/view/cabinet.php';
        return TRUE;
    }
    
      //редактирование данных из кабинета
    public function actionEdit()
    {
        $userId = User::checkLogged();//ID пользователя
            if (isset($_POST['login'])) {
            $login = $_POST['login'];
            $errors = false;
            if (!User::checkLogin($login)) {
                $errors[] = 'Логин не должен быть короче 2-х символов';
            }
            if ($errors == false) {
                $result = User::editLogin($userId, $login);
                $return = User::getUserForEdit($userId);
                echo json_encode($return);
            }
        }elseif (isset($_POST['email'])) {
            $email = $_POST['email'];
            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                $result = User::editEmail($userId, $email);
                $return = User::getUserForEdit($userId);
                echo json_encode($return);
            }
        }elseif (isset($_POST['password']) && isset($_POST['newpass'])) {
                $password = trim(strip_tags(md5($_POST['password'])));
                $newpass = trim(strip_tags(md5($_POST['newpass'])));
                $errors = false;
                $return = User::getUserForEdit($userId);
            if($return[0]['password'] !== $password){
                $errors[] = 'Неправильный пароль';
                echo json_encode($errors);
            }    
            if (!User::checkPassword($newpass)) {
                $errors[] = 'Неправильный пароль';
                echo json_encode($errors);
            }
            if ($errors == false) {
                $result = User::editPwd($userId, $newpass);
                $return = User::getUserForEdit($userId);
                $answer[]='Пароль успешно изменен';
                echo json_encode($answer);
            }
            }
        
        
        
         return true;
    }
     
    
    
}
