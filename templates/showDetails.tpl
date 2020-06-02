{include 'header.tpl'}
<div class= "container">
    <div class="row">
        <div class="col-12"> 

        <ul class="list-group">
        <li id="titulo" class="list-group-item text-white">
         {$detail->items}</li>
        <li class="list-group-item list-group-item-light text-dark">
        {$detail->categories}</li>
        <li class="list-group-item list-group-item-light text-dark">
        {$detail->description}</li>
        </div>
    </div>
</div>

{include 'footer.tpl'}