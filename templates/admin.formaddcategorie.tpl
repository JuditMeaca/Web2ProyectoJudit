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
            <p class="p-3 mb-2 bg-dark text-white"> Agrege una Categoria </p>
            <form action="addcategorie" method="post">
                <label>Categoria</label>
                <input name="x" type="text">
                <button type="submit" class="btn btn-primary">Agregar</button>  
                {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
        {/if}
            </form>
        </div>