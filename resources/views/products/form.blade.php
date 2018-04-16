{!! Form::open(['route' => [$product->url(), $product->id], 'method' => $product->method(), 'class' => 'app-form']) !!}
    {{ csrf_field() }}
    <div class="">
        {!! Form::label('title', 'Titulo del producto') !!}
        {!! Form::text('title', $product->title, ['class' => 'form-control']) !!}
    </div>

    <div class="">
        {!! Form::label('description', 'Descripcion del producto', []) !!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
    </div>

    <div class="">
        {!! Form::label('price', 'Precio del producto') !!}
        {!! Form::number('price', $product->price, ['class' => 'form-control']) !!}
    </div>

    <div class="">
        <input type="submit" value="guardar" class="btn btn-primary">
    </div>
{!! Form::close() !!}
