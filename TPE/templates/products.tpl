{include 'templates/header.tpl'}

<div class="container fluid">
<div class="row">
    <div class="col-md-2">
        <a href="{$baseURL}productsByCollection"><button type="submit" class="btn btn-primary">Ver por colección</button></a></td>
    </div>
    <div class="col-md-8 fondo-blanco">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Colección</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$products item=$product}
                    <tr>
                        <td>{$product->id_product}</td>
                        <td><a href="product/{$product->name}">{$product->name}</a></td>
                        <td>${$product->cost}</td>
                        {foreach from=$collections item=collection}
	                        {if $collection->id_collection == $product->id_collection}
	                            <td>{$collection->name}</td>
	                        {/if}
                        {/foreach}
                        {if $permit==1}
                            <td><a href="{$baseURL}delete/{$product->id_product}"><button type="submit" class="btn btn-primary" name= "id" value= "{$product->id_product}">Eliminar</button></a></td>
                            <td><a href="product/{$product->name}"><button type="submit" class="btn btn-primary">Editar</button></a></td>
                        {/if}}
                    </tr>
                {/foreach}
                {if $permit==1}
                    <tr>
                        <form action="new" method="POST"  enctype="multipart/form-data">
                            <td></td>
                            <td><input name='name' type="text" class="form-control"  placeholder="Producto"></td>
                            <td><input name='cost' type="number" class="form-control" placeholder="$"></td>
                            <td><label for="id_collection">Colección</label>
                                <select name="id_collection">
	                                {foreach from=$collections item=collection}
	                                    <option value='{$collection->id_collection}'>{$collection->name}</option>
	                                {/foreach}
	                            </select></td>
                            <td><button type="submit" class="btn btn-primary">Agregar</button></td>
                        </form>
                    </tr>       
                {/if}}
            </tbody>
        </table>
    </div>
</div>
</div>

{include 'templates/footer.tpl'}