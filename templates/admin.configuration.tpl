{include 'admin.header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="p-3 mb-2 bg-light text-white">
            <a class="btn btn-outline-primary" href="newcategorie" role="button">Nueva Categoria</a>
            </p>

            {foreach $allcategories as $categorie}
                    <li class="list-group-item">
                        <p>{$categorie->categories}
                        <a class="btn btn-light text-danger float-right" href="deletecategorie/{$categorie->id_categories}" role="button">
                        Eliminar</a>
                        <a class="btn btn-light text-dark float-right" href="formeditcategorie/{$categorie->id_categories}" role="button">
                        Editar</a>
                        </p>
                    </li>
            {/foreach}
        
        </div>

        <div class="col-12">

            <p class="p-3 mb-2 bg-light text-white">
            <a class="btn btn-outline-primary" href="newitem" role="button">Nuevo Producto</a>
            </p>
            
            </p>
            {foreach $allitems as $items}
                    <li class="list-group-item">
                        <p>{$items->product}
                        <a class="btn btn-light text-danger float-right" href="deleteitem/{$items->id_items}">Eliminar</a>
                        <a class="btn btn-light text-dark float-right" href="formedititem/{$items->id_items}">Editar</a>
                        </p>
                    </li>
            {/foreach}
        </div>

    </div>
</div>
</div>
</div>
</body>
