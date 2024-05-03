<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix', 'Prix:') !!}
    {!! Form::text('prix', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorie_id', 'Categorie:') !!}
    {!! Form::select('categorie_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select categorie']) !!}
</div>