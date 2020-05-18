{include 'templates/header.tpl'}
<div class="container">
    <div class="col-md-12">
        <h1>Colecciones</h1>
        <ul>
            {foreach from=$collections item=$collection}
                <li>{$collection->name}</li>
            {/foreach}
        </ul>  
    </div>
</div>
{include 'templates/footer.tpl'}
