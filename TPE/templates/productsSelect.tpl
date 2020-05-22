{include 'templates/header.tpl'}

<div class="container">
    <div class="col-md-8 offset-md-2 fondo-blanco">
        <label for="view">Ver:</label>
        <select name="view" id="view">
          <option selected>Todos los productos</option>
          {foreach from=$collections item=$collection}
                <option value="{$collection->id_collection}" action="collection/{$collection->id_collection}">{$collection->name}</option></a>
          {/foreach}   
        </select>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$products item=$product}
                <tr>
                    <td>{$product->id_product}</td>
                    <td>{$product->name}</td>
                    <td>{$product->cost}</td>
                </tr>
                {/foreach}             
            </tbody>
        </table>
    </div>
</div>

{include 'templates/footer.tpl'}