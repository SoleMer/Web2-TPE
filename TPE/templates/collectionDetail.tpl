{include 'templates/header.tpl'}

<div class="container">
  <div class="col-md-6 offset-md-2 fondo-blanco">
    <h1>{$collection->name}</h1>
  </div>
    <form action="{$baseURL}editCollection/{$collection->id_collection}" method= "POST" class="col-md-4 fondo-blanco">
      <div class="form-group">
        <label for="collectionName">Colección</label>
        <input name='collectionName' type="text" class="form-control" id="collectionName">
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

{include 'templates/footer.tpl'}