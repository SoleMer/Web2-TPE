<form action="{$baseURL}edit/{$product->id_product}" method= "POST" class="col-md-4 fondo-blanco" enctype="multipart/form-data">
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
          <input type="file" name="input_name" id="imageToUpload">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
</form> 
<a href='{$baseURL}deleteImage/{$product->id_product}'><button type="submit" class="btn btn-primary">Eliminar imagen</button></a>