{include 'header.tpl'}
<div class= "container">
     <div class="row">
          <div class="col-12">                
               <ul class="list-group">
                    <li id="titulo" class="list-group-item  text-white">Categorias</li>
               
               <ul class="list-group">  
                    {foreach $categories as $categorie}
                                   <li class="list-group-item"> 
                                   {$categorie->categories}
                                   <a class="btn btn-light text-dark float-right" href="categories/{$categorie->id_categories}" role="button"> Ver productos </a>
                                   </li>
                    {/foreach}
               </ul>
          </div>
     </div>
</div>

{include 'footer.tpl'}