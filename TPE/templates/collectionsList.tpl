{include 'templates/header.tpl'}
<div class="container">
    <div class="col-md-12">
        <h1>Colecciones</h1>
        <ul>
            {foreach ($collections as $collection) }
                <li>$collection</li>     //agregar URL
            {/foreach}}
        </ul>  
    </div>
</div>
{include 'templates/footer'}