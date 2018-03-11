$(document).ready(function(){
    //работа сендвича 
$('#menuShow').click(function(){
    if($('#mobileMenu').is(':visible'))
        $('#mobileMenu').hide();
    else
         $('#mobileMenu').show();
});

$(document).scroll(function(){
    if($(document).width() > 785){
    if($(document).scrollTop() > $('header').height() + 10)
    $('nav').addClass('fixed');
    else
    $('nav').removeClass('fixed');   
    }
});

window.onresize = function(event){
    $('#mobileMenu').hide();
};

//валидация email и сверка введенных паролей
$(function(){
    $('#reg_form').validate({
        rules:{
            login:{
                required:true,
                minlength:2
            },
            email:{
                required:true,
                email:true
            },
            password:{
                required:true,
                minlength:6
            },
            sec_pwd:{
                required:true,
                minlength:6,
                equalTo:'#compare'
            }
        },
        messages:{
            login:{
                required:"Поле обязательно для заполнения",
                minlength:'Логин не должен быть короче 2-х символов'
            },            
            email:{
                required:"Поле обязательно для заполнения",
                email:"Введите правильный email"
            },
            password:{
                required:"Поле обязательно для заполнения",
                minlength:"Минимальная длина пароля - 6 символов"
            },
            sec_pwd:{
                required:"Поле обязательно для заполнения",
                minlength:"Минимальная длина пароля - 6 символов",
                equalTo:'Введенные пароли должны совпадать'
            }         
        },
         focusCleanup:true
    });
});
//валидация для редактирования данных
//login validation
$(function(){
    $('#valid_login').validate({
        rules:{
            login:{
                required:true
            }
        },
        messages:{
           login:{
                required:'введите новый login'
            }       
        },
         focusCleanup:true
    });
});

//email validation
$(function(){
    $('#valid_email').validate({
        rules:{
            email:{
                required:true,
                email:true
            }
        },
        messages:{
            email:{
                required:'введите новый email',
                email:'неправильный email'
            }       
        },
         focusCleanup:true
    });
});



//password validation
$(function(){
    $('#f_ed').validate({
        rules:{
            password:{
                required:true,
                minlength:6
            },
            newpass:{
                required:true,
                minlength:6
            },
            sec_pwd:{
                required:true,
                minlength:6,
                equalTo:'#compare'
            }
        },
        messages:{
            password:{
                required:"Поле обязательно для заполнения",
                minlength:"Минимальная длина пароля - 6 символов"
            },
              newpass:{
                required:"Поле обязательно для заполнения",
                minlength:"Минимальная длина пароля - 6 символов"
            },
            sec_pwd:{
                required:"Поле обязательно для заполнения",
                minlength:"Минимальная длина пароля - 6 символов",
                equalTo:'Введенные пароли должны совпадать'
            }         
        },
         focusCleanup:true
    });
});

//pop-up окно для редактирования данных в личном кабинете
$('#editl').on('click',function(){
  var pop =  $('#editname').bPopup({
	    opacity: 0.6,
            positionStyle: 'fixed'
        });
        $('.savel').on('click',function(){
            pop.close();
        });
});

$('#edite').on('click',function(){
  var pop =  $('#editemail').bPopup({
	    opacity: 0.6,
            positionStyle: 'fixed'
        });
        $('.savee').on('click',function(){
            pop.close();
        });
});



var pop='';
$('#editp').on('click',function(){
   pop =  $('#editpass').bPopup({
	    opacity: 0.6,
            positionStyle: 'fixed'
        });
        
});

//методы для ajax отправки форм редактирования данных о пользователе
//login
$('.savel').on('click',function(){
         $.post('/edit',{login:$('#login').val()},function(data){
                var res = JSON.parse(data);
                 $('#ins_log').html(res[0]['login']);
                $('#login').val('');
                pop.close();
            
                }); 
      });

//email
$('.savee').on('click',function(){
         $.post('/edit',{email:$('#email').val()},function(data){
                var res = JSON.parse(data);
                 $('#ins_em').html(res[0]['email']);
                $('#email').val('');
                pop.close();
            
                }); 
      });

//password
$('.save').on('click',function(){
                $.post('/edit',{password:$('#oldpass').val(),newpass:$('#compare').val()},function(data){
                    var res = JSON.parse(data);
                   alert(res[0]);
                            
                $('#compare').val('');
                $('#oldpass').val('');
                $('#onesmore').val('');
                pop.close();
            
                }); 
      });

       



});


