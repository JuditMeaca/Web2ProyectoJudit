
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-dark bg-primary">
                <a class="navbar-brand">Bienvenidx! {$username}</a>
                <a class="btn btn-light" href="formlogin">Logout</a>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="p-3 mb-2 bg-light text-white">
            <a class="btn btn-outline-primary" href="newcategorie" role="button">Nueva Categoria</a>
            </p>

            {foreach $arraycategories as $categorie}
                    <li class="list-group-item">
                        <p>{$categorie->categories}
                        <a class="btn btn-light text-danger float-right" href="deletecatergorie/{$categorie->id_categories}" role="button">
                        Eliminar</a>
                        <a class="btn btn-light text-dark float-right" href="editcategorie/{$categorie->id_categories}" role="button">
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
            {foreach $arrayitems as $items}
                    <li class="list-group-item">
                        <p>{$items->product}
                        <a class="btn btn-light text-danger float-right" href="deleteitem/{$item->id_items}">Eliminar</a>
                        <a class="btn btn-light text-dark float-right" href="edititem/{$item->id_items}">Editar</a>
                        </p>
                    </li>
            {/foreach}
        </div>

    </div>
</div>
</div>
</div>

