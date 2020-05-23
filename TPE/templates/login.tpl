{include 'templates/header.tpl'}
<div class="container">
  <div class="col-md-6 offset-md-3 fondo-blanco">
    <form action="verify" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input name='username' type="text" class="form-control" id="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name='password' type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      {if $error}
        <div class="alert alert-danger" role="alert">
          {$error}
        </div>
      {/if}
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>

{include 'templates/footer.tpl'}