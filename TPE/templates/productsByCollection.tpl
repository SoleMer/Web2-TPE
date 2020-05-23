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
                        </tr>
                        <tr><ul>
                            {foreach from=$products item=$product}
                                {if $product->id_collection eq $collection->id_collection}
                                    <td><li>{$product->name}</li>
                                    <li>{$product->cost}</li>
                                    <li>{$collection->name}</li></td>
                                {/if}
                            {/foreach}
                        </ul></tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        </div>
        </div>

        {include 'templates/footer.tpl'}