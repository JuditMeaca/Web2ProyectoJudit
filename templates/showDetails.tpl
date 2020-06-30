{include 'header.tpl'}
<div class= "container">
    <div class="row">
        <div class="col-12"> 
        
        <ul class="list-group">
        <li id="titulo" class="list-group-item text-dark"> Categoria: 
         {$detail->categories}</li>
        <li class="list-group-item list-group-item-light text-dark"> Producto: 
        {$detail->product}</li>
        <li class="list-group-item list-group-item-light text-dark"> Detalles: 
        {$detail->description}</li>

        {if ($detail->image)}
            <li class="list-group-item text-white"> <img src="./{$detail->image}"/>
        {/if}  
       
        </ul>
        </div>
    </div>
</div>

{include 'footer.tpl'}