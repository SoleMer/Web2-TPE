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
            <input type="hidden" id="id_product" value="{$product->id_product}" class="card-text">${$product->id_product}</p>
            {foreach from=$collections item=collection}
              {if $collection->id_collection == $product->id_collection}
                <p class="card-text"><small class="text-muted">Colección: {$collection->name}</small></p>
              {/if}
            {/foreach}

            {if isset($userLogged)}
              {if $permit == 1} 
                {include 'templates/productEdit.tpl'}
              {/if}
            {/if}
          </div>
        </div>
      </div>
    </div>
    {include 'templates/vue/comments.vue'}
    {if isset($userLogged)}
      <input type="hidden" id="username" value="{$user->username}">Escribe un comentario: </input> 
      <input type="hidden" id="permit" value="{$permit}"></input> 
      {include 'templates/vue/formComment.vue'}
    {else}
    <input type="hidden" id="username" value="">Registrate para dejar un comentario.</input> 
    <input type="hidden" id="permit" value="0"></input> 
    {/if}
  </div>
  <script src="js/comments.js"></script>
</div>



