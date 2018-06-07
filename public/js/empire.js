
$("#login").submit(function(e){
  e.preventDefault();

  //recperation du login et du password
  var inputLogin = $("#inputLogin").val();
  var inputPassword = $("#inputPassword").val();
  var token = $('input[name="_token"]').val();
  // alert(login+" "+password)
  $.post("login",{
    login:inputLogin,
    password:inputPassword,
    _token:token
  }).then(function(response){
    redirecUser(response);
  }).fail(function(a,b){
      console.log(a)
  })
})


function redirecUser(role){
  switch (role) {
    case "superadmin":
      window.location="admin";
      break;
    default:

  }
}
