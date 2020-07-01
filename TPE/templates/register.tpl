{include 'templates/header.tpl'}
<div class="container">
  <div class="col-md-6 offset-md-3 fondo-blanco">
    <form action="addUser" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input name='username' type="text" class="form-control" id="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name='password' type="password" class="form-control" id="exampleInputPassword1">
        <label for="exampleInputPassword1">Rewrite password</label>
        <input name='repassword' type="password" class="form-control" id="exampleInputPassword1">
      </div>
      {if $error}
        <div class="alert alert-danger" role="alert">
          {$error}
        </div>
      {/if}
      <button type="submit" class="btn btn-primary">Guardar mis datos</button>
    </form>
  </div>
</div>

{include 'templates/footer.tpl'}