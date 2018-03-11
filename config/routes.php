<?php

return array( 
    //reg+auth
    'almost'=>'user/almost',
    'login'=>'user/login',
    'registration'=>'user/registration',
    'regfinish/([A-Za-z0-9]+)'=>'user/finish/$1',
    'logout'=>'user/logout',
    //cabinet
    'cabinet'=>'cabinet/index',
    'edit'=>'cabinet/edit',
    
    //main
    ''=>'site/index'
   
);

