
//recuperation des infos lors de la connexion de l'utilisateur
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


$('#formAddUser').submit(function(e){
  e.preventDefault();

  login = $("input[name='login']").val();
  password = $("input[name='password']").val();
  typeUser = $("select[name='typeUser']").val();
  token = $('input[name="_token"]').val();

    $.post("addUser",{
      login:login,
      password:password,
      typeUser:typeUser,
      _token:token
    }).then(function(response){
      switch (response) {
        case 'ok':
          alert("Compte Utilisateur créé avec success");
          break;
          case 'exist':
            alert("Ce compte d'utilisateur existe dejà");
            break;
        default:

      }

    }).fail(function(a,b){
      console.log(a);
      console.log(b);
    })

})

function redirecUser(role){
  switch (role) {
    case "superadmin":
    window.location="admin";
    break;
    case 'admin':
      window.location="administration/accueil";
      break;
    default:
      console.log(role);

  }
}

$("#logOut").submit(function(e){
  e.preventDefault();
  $.get("logOut")
  .then(function(response){
    window.location = "login";
  })
  .fail(function(a,b){
    console.log(a);
    console.log(b);
  })
})
