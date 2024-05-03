<div class="table-responsive">
    <table class="table" id="produits-table">
        <thead>
        <tr>
            <th>Nom</th>
        <th>Prix</th>
        <th>Categorie Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produits as $produits)
            <tr>
                <td>{{ $produits->nom }}</td>
            <td>{{ $produits->prix }}</td>
            <td>{{ $produits->categorie_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['produits.destroy', $produits->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('produits.show', [$produits->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('produits.edit', [$produits->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
