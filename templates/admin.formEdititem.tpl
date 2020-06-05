{include 'admin.header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="p-3 mb-2 bg-light text-primary"> Editar Producto </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="edititem" method="post">
                <input type="hidden" name="id" value="{$item->id_items}">
                <div>
                <label>Nombre del producto: </label>
                <input name="product" value="{$item->product}" type="text">
                </div>
                <div>
                <label>Descripcion</label>
                <input name="description" value="{$item->description}" type="text">
                </div>
                <div>
               Categoria <select name="idcategories">
                    {foreach $allcategories as $categorie}
                    <option value="{$categorie->id_categories}">{$categorie->categories}</option>
                    {/foreach}
                </select> 
                <p>

                </p>
                <div>
                <button type="submit" class="btn btn-primary">Agregar</button>  
                </div>
            </form>
        </div>
</div>
</body>