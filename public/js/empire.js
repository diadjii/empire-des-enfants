
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
  var login = null, password = null, typeUser  = null;
  login = $("input[name='login']").val();
  password = $("input[name='password']").val();
  typeUser = $("select[name='typeUser']").val();
  token = $('input[name="_token"]').val();

  if(login !=null && password !=null && typeUser != null){
    $.post("addUser",{
      login:login,
      password:password,
      typeUser:typeUser,
      _token:token
    }).then(function(response){
      alert("L'utilisateur a ete créé avec succes");
    }).fail(function(a,b){
      console.log(a);
      console.log(b);
    })
  }

})

function redirecUser(role){
  switch (role) {
    case "superadmin":
    window.location="admin";
    break;
    default:

  }
}

/**controle du formulaire pour l'ajout d'un
*nouveau utilisateur
*/
$('.ui.form')
.form({
  fields: {
    login: {
      identifier:'login',
      rules: [
        {
          type   : 'empty',
          prompt : 'Veillez Saisir votre login SVP'
        },
        {
          type   : 'minLength[6]',
          prompt : 'Le login doit contenir au moins 6 caracteres'
        }
      ]
    },
    password: {
      identifier: 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Veillez Saisir votre mot de passe SVP'
        },
        {
          type   : 'minLength[6]',
          prompt : 'Le mot de passe doit contenir au moins 6 caracteres'
        }
      ]
    },
    typeUser: {
      identifier: 'typeUser',
      rules: [
        {
          type   : 'empty',
          prompt : "Veillez choisir le type d'utilisateur que vous voulez ajouter"
        }
      ]
    }

  }
});
