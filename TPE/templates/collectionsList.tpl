{include 'templates/header.tpl'}
<div class="container">
    <div class="col-md-6 offset-md-3 fondo-blanco">
        <h1>Colecciones</h1>
        <ul>
            {foreach from=$collections item=$collection}
              <a href="collection"><li>{$collection->name}</li></a>
            {/foreach}
        </ul>  
    </div>
</div>
{include 'templates/footer.tpl'}
