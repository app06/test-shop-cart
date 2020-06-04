<div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="product-thumb transition pt-3">
        <div class="image"><a href="#"><img src="{{ Storage::disk('public')->url($product->image) }}" alt="{{ $product->title }}" class="img-fluid"></a></div>
        <div class="caption">
            <h4><a href="#">{{ $product->title }}</a></h4>
            <p>{{ $product->description }}</p>
            <p class="price">{{ $product->price }} $</p>
            <p>Наличие:
                @if($product->in_stock)
                    <b class="text-success">Есть</b>
                @else
                    <b class="text-warning">Нету</b>
                @endif
            </p>
        </div>
        @if($product->in_stock)
            <div class="button-group pull-right w-100 border-top bg-light text-center">
                <button class="btn btn-light add-to-cart" type="button" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Добавить</span></button>
                <button class="btn btn-light remove-from-cart" type="button" data-id="{{ $product->id }}"><i class="fa fa-times"></i> <span class="hidden-xs hidden-sm hidden-md">Удалить</span></button>
            </div>
        @endif
    </div>
</div>
