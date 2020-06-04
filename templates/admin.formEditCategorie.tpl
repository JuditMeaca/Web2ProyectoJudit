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
            <p class="p-3 mb-2 bg-dark text-white">Edite una Categoria</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="editcategorie" method="post">
                <div>
                <label>Renombrar Categoria: </label>
                <input name="x" type="text" value="{$categorie->categories}">
                </div>
                <input type="hidden" name="id" value="{$categorie->id_categories}">
                <div>
                <button type="submit" class="btn btn-primary">Editar</button>  
                </div>
            </form>
        </div>
    </div>