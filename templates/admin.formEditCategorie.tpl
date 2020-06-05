{include 'admin.header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="p-3 mb-2 bg-light text-primary">Edite una Categoria</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="editcategorie" method="POST" >
                <div>
                <label>Renombrar Categoria: </label>
                <input name="newname" type="text" value="{$categorie->categories}">
                </div>
                <input name="id" type="hidden" value="{$categorie->id_categories}">
                <div>
                <button type="submit" class="btn btn-primary">Editar</button>  
                </div>
            </form>
        </div>
    </div>
    </body>