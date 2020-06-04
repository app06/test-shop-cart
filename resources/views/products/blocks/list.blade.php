<div class="row">
    @each('products.blocks.item', $products, 'product')
</div>

{{ $products->appends(request()->except('page'))->links() }}
