{include 'header.tpl'}
<div class= "container">
     <div class="row">
          <div class="col-12">                
               <ul class="list-group">
                    <li id="titulo" class="list-group-item  text-white">Productos</li>
               
               <ul class="list-group">  
                    {foreach $items as $product}
                                   <li class="list-group-item"> 
                                   {$product->product}
                                   <a class="btn btn-light text-dark float-right" href="details/{$categories->id_categories}" role="button"> Ver detalles </a>
                                   </li>
                    {/foreach}
               </ul>
          </div>
     </div>
</div>

{include 'footer.tpl'}