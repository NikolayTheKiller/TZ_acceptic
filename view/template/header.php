<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>тестовое задание</title>
        <link rel="stylesheet" href="/view/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="/view/css/main_page.css" type="text/css" media="all" />
        <link rel="stylesheet" href="/view/css/form_reg.css" type="text/css" media="all" />
        <script src="/view/js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="/view/js/popup.js" type="text/javascript"></script>
        <script src="/view/js/dist/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/view/js/functions.js" type="text/javascript"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <header>
                    <div id="logo">
                        <a href="/" title="На главную">
                            <img src="/view/pictures/idea.png"><span>IT-test</span>
                        </a>                
                    </div>
                    <div id="about">
                        <a href="#" title="узнать о рекламе">реклама</a>
                        <a href="#" title="узнать о нас">о нас</a>
                    </div>
                    <div id="reg_auth">
                        <?php if(User::isGuest()): ?><!--показывает разные кнопки для 'гость' и авторизированный пользователь -->
                        <a href="registration" title="регистрация">
                             <div class="btn">регистрация</div>
                        </a>             
                        <a href="login" title="вход">
                            <div class="btn">вход</div>
                        </a>                
                        <?php else: ?>
                        
                        <a href="cabinet" title="кабинет">
                            <div class="btn">кабинет</div>
                        </a> 
                        <a href="logout" title="выход">
                            <div class="btn">выход</div>
                        </a> 
                        <?php endif; ?>
                    </div>            
                </header>
                <nav>
                    <div id="menuShow"><i class="fas fa-bars"></i></div>
                    <div id="hideMenu">
                        <a href="">Новости</a>
                        <a href="">Погода</a>
                        <a href="">Спорт</a>
                        <a href="">Наука</a>
                        <a href="">Форум</a>
                    </div>
                    <div id="search">
                        <span>Поиск</span>
                        <i class="fas fa-search"></i>
                    </div> 
                    <div id="mobileMenu">
                        <a href="">Новости</a><br>
                        <a href="">Погода</a><br>
                        <a href="">Спорт</a><br>
                        <a href="">Наука</a><br>
                        <a href="">Форум</a>
                        <hr>
                        <a href="">регистрация</a>
                        <a href="">войти</a>
                    </div>
                </nav>
         
