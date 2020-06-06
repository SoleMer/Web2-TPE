{include 'templates/header.tpl'}

<div class="container">
  <div class="col-md-6 offset-md-2 fondo-blanco">
    <h1>{$product->name}</h1>
    <p>${$product->cost}</p>
    {foreach from=$collections item=collection}
	    {if $collection->id_collection == $product->id_collection}
	      <p>Colección: {$collection->name}</p>
	    {/if}
    {/foreach}
    <img src={product->image}></img>
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
        <select name="collection">
	        {foreach from=$collections item=collection}
	            <option value='{$collection->id_collection}'>{$collection->name}</option>
	        {/foreach}
	      </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  {/if}
</div>

{include 'templates/footer.tpl'} 