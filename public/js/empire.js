$(function(){
  $("#message").alert('close')
})

//recuperation des infos lors de la connexion de l'utilisateur
$("#login").submit(function(e){
  e.preventDefault();
  
  //recperation du login et du password
  var inputLogin = $("#inputLogin").val();
  var inputPassword = $("#inputPassword").val();
  var token = $('input[name="_token"]').val();
  // alert(login+" "+password)
  $.post("/login",{
    login:inputLogin,
    password:inputPassword,
    _token:token
  }).then(function(response){
    if(response == "error" ){
      $("#messageError").html("Veillez verifier votre login ou mot de passe.<br><small>Si le probleme persiste consulter l'administrateur.</small>" );
      $("#exampleModal").modal("show");
    }else{
      redirectUser(response);
    }
  }).fail(function(a,b){
    console.log(a)
  })
})


$('#formAddUser').submit(function(e){
  e.preventDefault();
  
  let login = $("input[name='login']").val();
  let password = $("input[name='password']").val();
  let typeUser = $("select[name='typeUser']").val();
  let nom = $("input[name='nom']").val();
  let prenom = $("input[name='prenom']").val();
  let token = $('input[name="_token"]').val();
  
  $.post("/add-user",{
    login:login,
    password:password,
    typeUser:typeUser,
    nom:nom,
    prenom:prenom,
    _token:token
  }).then(function(response){
    switch (response) {
      case 'ok':
      alert("Compte Utilisateur créé avec success");
      break;
      case 'exist':
      alert("Ce compte d'utilisateur existe dejà");
      break;
      case "vide":
      alert("Champs requis");
      break;
    }mActivite;
    // var event = $('<div />')
  }).fail(function(a,b){
    alert("Ouuppps une erreur c'est produite lorss de la creation du compte");
  })
})
//
// //Redirect the user
function redirectUser(role){
  switch (role) {
    case 'admin':
    window.location.href="/administration";
    break;
    case 'infirmier':
    window.location.href = "/infirmier";
    break;
    case 'encadreur':
    window.location.href="/encadreur";
    break;
    case 'animateur':
    window.location.href="/animateur";
    break;
    default:
    console.log(role);
    
  }
}

//Voir les infos d'un utilisateur
function activeUser(idUser){
  // alert(idUser)
  $.get("/administrateur/"+idUser+"/changeStatusToOn").then(function(){
    window.location.href="/liste-des-utilisateurs";
  }).fail(function(r){
    console.log(r);
  })
}

function desactiveUser(idUser){
  // alert(idUser)
  $.get("/administrateur/"+idUser+"/changeStatusToOff").then(function(){
    window.location.href="/liste-des-utilisateurs";
  }).fail(function(r){
    console.log(r);
  })
}

function deleteUser(idUser){
  // alert(idUser);
  $('#exampleModal').modal('toggle');
  $(".modal-body").text("Voulez-vous vraiment supprimer cet utilisateur");
  $("#btnConfirmDeleteUser").click(function(){
    $.get("/administrateur/"+idUser+"/delete-user").then(function(response){
      $('#exampleModal').modal('toggle');
      window.location.href="/liste-des-utilisateurs";
    }).fail(function(r){
      console.log(r);
    })
  })
}

function generate(l){
  if (typeof l==='undefined'){
    l=8;
  }
  /* c : chaîne de caractères alphanumérique */
  var c='abcdefghijknopqrstuvwxyzACDEFGHJKLMNPQRSTUVWXYZ12345679',
  n=c.length,
  /* p : chaîne de caractères spéciaux */
  p='!@#$+-*&_?',
  o=p.length,
  r='',
  n=c.length,
  /* s : determine la position du caractère spécial dans le mdp */
  s=Math.floor(Math.random() * (p.length-1));
  
  for(var i=0; i<l; ++i){
    if(s == i){
      /* on insère à la position donnée un caractère spécial aléatoire */
      r += p.charAt(Math.floor(Math.random() * o));
    }else{
      /* on insère un caractère alphanumérique aléatoire */
      r += c.charAt(Math.floor(Math.random() * n));
    }
  }
  return r;
  
}
/* exemple de fonction génération de mdp dans un form  */
$(document).ready(function() {
  /* on détecte un des champ du formulaire contient une class "gen", on insérera un bouton dans sa div parent qui appelera la fonction generate() */
  if($('form input.gen').length){
    $('form input.gen').each(function(){
      $('<span class="generate"><i class="fa fa-fw fa-refresh"></i></span>').appendTo($(this).parent());
    });
  }
  /* évènement click sur un element de class "generate" > appelle la fonction generate() */
  $(document).on('click','.generate', function(e){
    e.preventDefault();
    /* ajout du mot de passe + changement du paramètre type de password vers text (pour lisibilité) */
    $(this).parent().children('input').val(generate()).attr('type','text');
  });
});


$('#generatePassword').click(function(){
  var password = generate(8);
  $("input[name='password']").val(password);
})


function resetPassword(idUser){
  $("#modalResetPassword").modal("toggle");

  $("#btnConfirmResetPassword").click(function(){
      var password  = $("input[name='newPassword']").val(); 
      var token     = $("input[name='_token']").val();

      console.log(password+" "+token)
      $.post("/user/reset-password",{
        idUser:idUser,
        newPassword:password,
        _token:token
      }).then(function(response){
        $("#modalResetPassword").modal("toggle");
        alert("Le mot de passe a ete reinitialisé");
      }).fail(function(r){
          console.log(r)
      })
  })
}