{include 'templates/header.tpl'}
<div class="container">
    <div class="col-md-6 offset-md-3 fondo-blanco">
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