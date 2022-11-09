$(document).ready(function(){
    $('#btnLogin').click(function(){
    $(location).prop('href','../src/welcome.html');
  });
});

$(document).ready(function(){
  $("#btnLogin").click(function(){
      $.post("./php/login.php",
      {
        email: $("#email").val(),
        passw: $("#passw").val()
      },
      function(data, status){
        if(data==="Successful"){
          $(location).prop('href','./src/welcome.html');
        }else{
          $("#error").text(data);
        }
      });
  });    
});
