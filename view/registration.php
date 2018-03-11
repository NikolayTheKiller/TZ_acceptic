<?php include_once 'view/template/header.php'; ?>

<div class="container">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNNyUJ8ud9fkql7S2jgSw9P_QuUduiMw08vzwh5mUNwo3pscn2">
  <form action="" method="post" id="reg_form">
        <div class="t_input">
            <input type="text" name="login" placeholder="введите логин" required>
            <input type="email" name="email" placeholder="введите email" required>
            <input type="password" id="compare" name="password" placeholder="введите пароль" required>
            <input type="password" name="sec_pwd" placeholder="повторите пароль" required><br>
            <button class="t_submit" type="submit" name="submit" >Зарегистрироваться</button>
            <br>
        </div>
    </form>
</div>


<?php include_once 'view/template/footer.php'; ?>