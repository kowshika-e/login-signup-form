$(document).ready(function(){
    $("#register").click(function(){
        $.post("./php/register.php",
        {
          name: $("#fname").val(), 
          lname: $("#lname").val(),
          email: $("#email").val(),
          passw: $("#passw").val(),
          mobile: $("#mobile").val()
        },
        function(data, status){
          if(data==="Successful"){
            $(location).prop('href','./src/login_page.html');
          }else{
            $("#error").text(data);
          }
        });
    });    
});
