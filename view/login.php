<?php include_once 'view/template/header.php'; ?>

<div class="container">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNNyUJ8ud9fkql7S2jgSw9P_QuUduiMw08vzwh5mUNwo3pscn2">
    <form action="" method="post">
        <div class="t_input">
            <input type="email" name="email" placeholder="введите email" required>
            <input type="password" name="password" placeholder="введите пароль" required><br>
            <input class="t_submit" type="submit" name="submit" value="Войти">
            <input class="t_submit" type="submit" name="submit" value="Забыли пароль?">
            <br>
        </div>
    </form>
</div>


<?php include_once 'view/template/footer.php'; ?>