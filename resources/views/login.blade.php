<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
  </head>
  <body class="text-center">
    <div class="col-6 offset-md-3">

    <form id="login" class="form-signin" >
       <input type="hidden" id="token" name="_token" value="{!! csrf_token() !!}">
       <h1 class="h3 mb-3 font-weight-normal">Se Connecter</h1>
       <label for="inputLogin" class="sr-only">Login address</label>
       <input type="text" id="inputLogin" class="form-control" placeholder="Login address" required autofocus>
       <label for="inputPassword" class="sr-only">Password</label>
       <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
       <div class="checkbox mb-3">
         <label>
           <input type="checkbox" value="remember-me"> Remember me
         </label>
       </div>
       <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
       <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
     </form>
   </div>
   <script src="/js/jquery-3.3.1.min.js"></script>
   <script src="/js/empire.js" charset="utf-8"></script>
  </body>
</html>
