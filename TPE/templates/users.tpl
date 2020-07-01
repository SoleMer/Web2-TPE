{include 'templates/header.tpl'}

<div class="container fluid">
<div class="row">
    <div class="col-md-8 offset-md-2 fondo-blanco">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Administrador</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=$user}
                    <tr>
                        <td>{$user->username}</td>
                        <td>
                            {if $user->admin == 1}
                                <a href="{$baseURL}permit/{$user->username}"><button type="submit" class="btn btn-primary">SI</button>
                            {else}
                                <a href="{$baseURL}permit/{$user->username}"><button type="submit" class="btn btn-primary">NO</button></a>
                            {/if}
                        </td>
                        <td>
                            <a href="{$baseURL}deleteUser/{$user->id_user}"><button type="submit" class="btn btn-primary">Eliminar</button></a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>

{include 'templates/footer.tpl'}