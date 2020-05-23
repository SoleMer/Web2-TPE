{include 'templates/header.tpl'}

<div class="container">
  <div class="col-md-6 offset-md-2 fondo-blanco">
    <h1>{$product->name}</h1>
    <p>${$product->cost}</p>
  </div>
  {if isset($username)}
    <form action="{$baseURL}edit/{$product->id_product}" method= "POST" class="col-md-4 fondo-blanco">
      <div class="form-group">
        <label for="productname">Producto</label>
        <input name='productname' type="text" class="form-control" id="productname">
      </div>
      <div class="form-group">
        <label for="cost">Precio</label>
        <input name='cost' type="number" class="form-control" id="cost">
      </div>
      <div class="form-group">
        <label for="collection">Coleccion</label>
        <input name='collection' type="number" class="form-control" id="collection">
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  {/if}
</div>

{include 'templates/footer.tpl'} 