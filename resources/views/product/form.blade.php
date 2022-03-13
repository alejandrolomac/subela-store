<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group mb-2">
            {{ Form::label('Nombre de Producto') }}
            {{ Form::text('title', $product->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('Imagen') }}
            {{ Form::file('image', $product->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '')]) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('Descripción de Producto') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('Precio') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('Precio en Oferta') }}
            {{ Form::text('offer', $product->offer, ['class' => 'form-control' . ($errors->has('offer') ? ' is-invalid' : ''), 'placeholder' => 'Offer']) }}
            {!! $errors->first('offer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('Productos en Inventario') }}
            {{ Form::text('inventory', $product->inventory, ['class' => 'form-control' . ($errors->has('inventory') ? ' is-invalid' : ''), 'placeholder' => 'Inventory']) }}
            {!! $errors->first('inventory', '<div class="invalid-feedback">:message</div>') !!}

            {{ Form::hidden('user_id', $product->user_id, Auth::id()) }}
            <input id="asd" name="asd" type="text" value='{{Auth::id()}}'>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn-shop d-block mx-auto">Agregar</button>
    </div>
</div>