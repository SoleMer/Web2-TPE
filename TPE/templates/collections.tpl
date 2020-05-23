{include 'templates/header.tpl'}

<div class="container fluid">
<div class="col-md-6 offset-md-3 fondo-blanco inline">
            <h5>Colecciones</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th> 
                        <th scope="col">Coleccion</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$collections item=$collection}
                        <tr>
                            <td>{$collection->id_collection}</td>
                            <td>{$collection->name}</td>
                            {if isset($username)}
                                <td><a href="{$baseURL}deleteCollection/{$collection->id_collection}"><button type="submit" class="btn btn-primary" name= "id" value= "{$product->id_product}">Eliminar</button></a></td>
                                <td><a href="{$baseURL}collection/{$collection->name}"><button type="submit" class="btn btn-primary">Editar</button></a></td>
                            {/if}
                        </tr>
                    {/foreach}
                    {if isset($username)}
                        <tr>
                            <form action="newCollection" method="POST">
                                <td><input name='collectionName' type="text" class="form-control"  placeholder="Nueva Coleccion"></td>
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