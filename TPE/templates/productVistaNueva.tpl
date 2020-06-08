{include 'templates/header.tpl'}

<div class="container">
<div col-md-8 offset-col-md-2>

  <div class="card mb-3" >
  <div class="row no-gutters">
    <div class="col-md-8">
    {if isset($product->image)}
        <img src="{$product->image}" class="card-img"/>
    {/if}
    </div>
    <div class="col-md-4">
      <div class="card-body">
      <h5 class="card-title">{$product->name}</h5>
      <p class="card-text">${$product->cost}</p>
      {foreach from=$collections item=collection}
        {if $collection->id_collection == $product->id_collection}
            <p class="card-text"><small class="text-muted">Colección: {$collection->name}</small></p>
        {/if}
    {/foreach}
      </div>
    </div>
  </div>
</div>
</div>
</div>
{include 'templates/footer.tpl'} 


