{include 'templates/header.tpl'}

<div class="container fluid">
<div class="row">
    <div class="col-md-3">
        <a href="{$baseURL}productsByCollection"><button type="submit" class="btn btn-primary">Ver por coleccion</button></a></td>
    </div>
    <div class="col-md-6 fondo-blanco">
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
                        <td><a href="product/{$product->name}">{$product->name}</a></td>
                        <td>${$product->cost}</td>
                        {if isset($username)}
                            <td><a href="{$baseURL}delete/{$product->id_product}"><button type="submit" class="btn btn-primary" name= "id" value= "{$product->id_product}">Eliminar</button></a></td>
                            <td><a href="product/{$product->name}"><button type="submit" class="btn btn-primary">Editar</button></a></td>
                        {/if}
                    </tr>
                {/foreach}
                {if isset($username)}
                    <tr>
                        <form action="new" method="POST">
                            <td><input name='name' type="text" class="form-control"  placeholder="Producto"></td>
                            <td><input name='cost' type="number" class="form-control" placeholder="Precio"></td>
                            <td><input name='id_collection' type="number" class="form-control" placeholder="Id coleccion"></td>
                            <td><button type="submit" class="btn btn-primary">Agregar</button></td>
                        </form>
                    </tr>
                {/if}         
            </tbody>
        </table>
    </div>
</div>
</div>

{include 'templates/footer.tpl'}