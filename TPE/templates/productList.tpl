{include 'templates/header.tpl'}
<div class="container">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                {foreach ($products as $product) }
                    $id_product = $producto->id_producto;
                    $name_product = $producto->nombre;
                    $precio_product = $producto->precio;
                            
                    <td> $id_product </td>
                    <td> $name_product </td>
                    <td> $precio_product </td>
                {/foreach}}              
            </tbody>
        </table>
    </div>
</div>
{include 'templates/footer'}