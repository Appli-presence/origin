<table>
    <thead>
        <th></th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Presence</th>
    </thead>
    @foreach ($param as $value)
        <tr>
            <td>{{$value->etudiantId}}</td>
            <td>{{$value->nom}}</td>
            <td>{{$value->prenom}}</td>
            <td>
                <input type="checkbox" aria-label="Checkbox for following text input" active>
            </td>
        </tr>
    @endforeach
</table>
