{include 'header.tpl'}
{$categories = $items[0]->categories}

<div class="container">
    <div id="subtitulo" class="card-header text-dark">{$categories}</div>
    <div class="row">

        {foreach $items as $data}

        <div id="curso" class="col-12">
            <div class="card border-light">

                <div class="card-body">
                    <h5 class="card-title">{$data->product}</h5>
                    <a class="btn btn-light" href="details/{$data->id_items}">Detalles</a>
                </div>
            </div>
        </div>

        {/foreach}
    </div>
</div>
{include 'footer.tpl'}