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
                    </tr>
                {/foreach}       
            </tbody>
        </table>
    </div>
</div>
</div>

{include 'templates/footer.tpl'}