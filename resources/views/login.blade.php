
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="{{url('css/style.css')}}">

  
</head>

<body>

    <div class="wrapper">
    <form class="form-signin" method="post" action="/usuarios">   
      {{ csrf_field() }}    
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="clave" placeholder="Clave" required=""/>      
     
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>
  
  

</body>

</html>
