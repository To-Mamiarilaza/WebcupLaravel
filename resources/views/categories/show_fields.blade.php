<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $categories->nom }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $categories->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $categories->updated_at }}</p>
</div>

