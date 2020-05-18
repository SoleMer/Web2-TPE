{include 'templates/header.tpl'}
<div class="container">
    <div class="col-md-12">
        {foreach from=$collections item=$collection}
            <h1>{$collection->name}</h1>
            <ul>
            {foreach from=$products item=$product}
               {if $product->id_collection eq $collection->id_collection}
                    <li>{$product->name}</li>
                    <li>{$product->cost}</li>
                {/if}
            {/foreach}
            </ul>
        {/foreach}
    </div>
</div>
{include 'templates/footer.tpl'}