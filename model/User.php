<?php
class User {
    public static function register($login, $email, $password,$activation)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO user (login, email, password,activation,status) '
                . 'VALUES (:login, :email, :password, :activation,0)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':activation', $activation, PDO::PARAM_STR);
        return $result->execute();
    }
    
     public static function checkLogin($login)
    {
        if (strlen($login) >= 2) {
            return true;
        }
        return false;
    }
    
     public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    public static function checkEmailExists($email)
    {           
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
    
       
    //генерирует код активации пользователя
    public static function getActivateLink($login){
         return md5(time().$login);
    }
    
    public static function compare($secret){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE activation = :activation';
        $result = $db->prepare($sql);        
        $result->bindParam(':activation', $secret, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if (isset($user)) {
            self::changeStatus($user['id']);
            return TRUE;
        }
        return false;
    }
    //если кодовое слово совпадает с записью в БД, статус меняется с 0 на 1 и аккаунт становится активен
    public static function changeStatus($id){
        $db = Db::getConnection();
        $sql = "UPDATE user SET status = 1 WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    //проверка пользователя для входа
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password AND status = 1';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }
    
    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }
    //проверяет, выполнен ли вход
     public static function checkLogged()
    {
        // Если сессия есть, вернет идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location:/login");
    }
    
    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
    public static function getUserForEdit($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $user = array();
        while ($row=$result->fetch()){
            $user[] = $row;
        }
        return $user;
    }
    
     public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
     public static function editLogin($id, $login)
    {
        $db = Db::getConnection();
        $sql = "UPDATE user SET login = :login WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function editEmail($id, $email)
    {
        $db = Db::getConnection();
        $sql = "UPDATE user SET email = :email WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
    }
    
     public static function editPwd($id, $newpass)
    {
        $db = Db::getConnection();
        $sql = "UPDATE user SET password = :password WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $newpass, PDO::PARAM_STR);
        return $result->execute();
    }
}
