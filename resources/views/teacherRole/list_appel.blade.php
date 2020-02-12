    <table>
        <thead>
            <th></th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Presence</th>
        </thead>
        @foreach ($param as $value)
        @if ($cour->promoId==$value->promotionId)
            <tr>
                <td></td>
                <td>{{$value->nom}}</td>
                <td>{{$value->prenom}}</td>
                <td>
                    <input type="checkbox" aria-label="Checkbox for following text input" name="{{$value->etudiantId}}" value="1" active>
                <input type="hidden" name="cours" value="{{ $cour->coursId}}">
                <input type="hidden" name="promo" value="{{ $cour->promoId}}">

                </td>
            </tr>
        @endif
        @endforeach
    </table>

