{include 'admin.header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="p-3 mb-2 bg-light text-primary"> Agrege una categoria </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
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
        </body>