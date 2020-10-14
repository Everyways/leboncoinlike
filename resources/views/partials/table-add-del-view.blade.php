<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Limite</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
            <tr id="{{ $ad->id }}">
                <td>{{ $ad->title }}</td>
                <td class="date-id">{{ date_create($ad->limit)->format('d-m-Y') }}</td>
                <td class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('annonces.show', $ad->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir l'annonce"><i class="fas fa-eye"></i></a>
                    @isset($edit)
                    <a class="btn btn-warning btn-sm" href="{{ route('annonces.edit', $ad->id) }}" role="button" data-toggle="tooltip" title="Modifier l'annonce"><i class="fas fa-edit"></i></a>
                    @endisset
                    <i class="fas fa-spinner fa-pulse fa-lg" style="display: none"></i>
                    @empty($noAdd)
                    <a class="btn btn-success btn-sm" href="{{ route('admin.addweek', $ad->id) }}" role="button" data-id="{{ $ad->id }}" data-toggle="tooltip" title="Ajouter une semaine"><i class="fas fa-arrow-alt-circle-up"></i></a>
                    @endisset
                    <a class="btn btn-danger btn-sm" href="{{ route('admin.destroy', $ad->id) }}" role="button" data-id="{{ $ad->id }}" data-toggle="tooltip" title="Supprimer l'annonce"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex">
    <div class="mx-auto">
        {{ $ads->links() }}
    </div>
</div>