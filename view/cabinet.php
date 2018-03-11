<?php include_once ROOT.'/view/template/header.php'; ?>
<div class="cab">
    <p>Добро пожаловать в личный кабинет !</p>    
</div>
<div class="personal">
    <table>
        <tr>  <th class="title">Личные данные: </th><th> Редактировать:</th> </tr>        
        <tr>  <td class="p_log" id="ins_log">login: <?= $user['login'];?></td><td> <input type="button" class="edit" id="editl" value="изменить"></td> </tr>
        <tr>  <td class="p_log" id="ins_em">email: <?= $user['email'];?></td><td> <input type="button" class="edit" id="edite" value="изменить"></td> </tr>
        <tr>  <td class="p_log">редактировать пароль:</td><td> <input type="button" class="edit" id="editp" value="изменить"></td> </tr>
    </table>
</div>
<!-- popup форма для логина-->
<div id="editname" class='formedit' hidden>
    <form method="post" class="f_ed" id="valid_login" >
        <input type="text" name="login" id="login" placeholder="login" required>
        <input type="button" class="savel" value="Сохранить">
    </form>
</div>
<!-- popup форма для email-->
<div id="editemail" class="formedit" hidden>
    <form method="post" class="f_ed" id="valid_email" >
        <input type="email" name="email" id="email" placeholder="email">
        <input type="button" class="savee" value="Сохранить">
    </form>
</div>
<!-- popup форма для password-->
<div id="editpass" class="formeditpass" hidden>
    <form method="post" class="f_ed" id="f_ed">
        <input type="password" id="oldpass" name="password" placeholder="старый пароль">
        <input type="password" id="compare" name="newpass" placeholder="новый пароль">
        <input type="password" id="onesmore" name="sec_pwd" placeholder="повторите пароль">
        <input type="button" class="save" value="Сохранить">
    </form>
</div>
<?php include_once ROOT.'/view/template/footer.php'; ?>