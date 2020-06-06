{include 'admin.header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="p-3 mb-2 bg-light text-primary"> Agrege un producto </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="additem" method="post">
                <div>
                    <label>Nombre del producto: </label>
                    <input name="product" type="text">
                </div>
                <div>
                    <label>Descripcion</label>
                    <input name="description" type="text">
                </div>
                <div>
                    <label>Categoria:</label>
                    <select name="id_categories">
                        {foreach $categories as $categorie}
                        <option value="{$categorie->id_categories}">{$categorie->categories}</option>
                        {/foreach}
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
    </body>