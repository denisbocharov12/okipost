$(document).ready(function(){
    $("#phone_fiz").mask("37399999999");
    $("#orgmobile").mask("37399999999");
    $(function() {

        $('#date_fiz').datepicker({
            dateFormat: "yy-mm-dd",
            navigationAsDateFormat: true
        });

    });

});
$('.eye_fiz').on('click', function(e){
    var t, c;
    e.preventDefault();
    var t = $('#password_fiz').attr('type');
    var c = $(this).find('i').attr('class');
    if(c == 'fa fa-eye'){
        $(this).find('i').removeClass('fa-eye');
        $(this).find('i').addClass('fa-eye-slash');
    }else{
        $(this).find('i').addClass('fa-eye');
        $(this).find('i').removeClass('fa-eye-slash');
    }
    if(t == 'password'){
        $('#password_fiz').attr('type', 'text');
    }else{
        $('#password_fiz').attr('type', 'password');
    }
});
$('.eye_login').on('click', function(e){
    var t, c;
    e.preventDefault();
    var t = $('#password_login').attr('type');
    var c = $(this).find('i').attr('class');
    if(c == 'fa fa-eye'){
        $(this).find('i').removeClass('fa-eye');
        $(this).find('i').addClass('fa-eye-slash');
    }else{
        $(this).find('i').addClass('fa-eye');
        $(this).find('i').removeClass('fa-eye-slash');
    }
    if(t == 'password'){
        $('#password_login').attr('type', 'text');
    }else{
        $('#password_login').attr('type', 'password');
    }
});
$('.eye_iur').on('click', function(e){
    var t, c;
    e.preventDefault();
    var t = $('#password_iur').attr('type');
    var c = $(this).find('i').attr('class');
    if(c == 'fa fa-eye'){
        $(this).find('i').removeClass('fa-eye');
        $(this).find('i').addClass('fa-eye-slash');
    }else{
        $(this).find('i').addClass('fa-eye');
        $(this).find('i').removeClass('fa-eye-slash');
    }
    if(t == 'password'){
        $('#password_iur').attr('type', 'text');
    }else{
        $('#password_iur').attr('type', 'password');
    }
});
var tab; // заголовок вкладки
var tabContent; // блок содержащий контент вкладки


window.onload=function() {
    tabContent=document.getElementsByClassName('tabContent');
    tab=document.getElementsByClassName('tab');
    hideTabsContent(1);
}

document.getElementById('tabs').onclick = function (event) {
    var target=event.target;
    if (target.className=='tab') {
        for (var i=0; i<tab.length; i++) {
            if (target == tab[i]) {
                showTabsContent(i);
                break;
            }
        }
    }
}

function hideTabsContent(a) {
    for (var i=a; i<tabContent.length; i++) {
        tabContent[i].classList.remove('show');
        tabContent[i].classList.add("hide");
        tab[i].classList.remove('active');
    }
}

function showTabsContent(b){
    if (tabContent[b].classList.contains('hide')) {
        hideTabsContent(0);
        tab[b].classList.add('active');
        tabContent[b].classList.remove('hide');
        tabContent[b].classList.add('show');
    }
}
