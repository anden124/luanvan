<div class="col-lg-3 col-sm-6">
    <div class="single_product_item">
        <a href="{{ route('client.product.detail', $product->slug) }}">
            <img src="{{ asset('assets/clients/img/product/' . $product->images->first()->image) }}" alt="{{ $product->name }}">
        </a>
        <div class="single_product_text text-left">
            <h4 class="font-weight-bold">
                <a href="{{ route('client.product.detail', $product->slug) }}" style="color:#333;">{{ $product->name }}</a>
            </h4>
            <h3>{{ number_format($product->variants->min('price')) }}đ</h3>
        </div>
    </div>
</div>