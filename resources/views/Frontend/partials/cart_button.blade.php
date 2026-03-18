<form action="{{ route('carts.store') }}" class="form-inline" method="POST">

    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-warning"> <i class="fa fa-plus"> Add To Cart</i></button>
</form>