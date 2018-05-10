@auth
    {!! Form::open(['method' => 'delete', 'route' => ['productos.destroy', $product->id], 'onsubmit' => 'return confirm("Estas seguro de eliminar este producto?  ")']) !!}
    <input type="submit" name="" class="btn  btn-danger" value="Eliminar producto">
    {!! Form::close() !!}
@endauth
