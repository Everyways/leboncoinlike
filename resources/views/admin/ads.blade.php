@extends('layouts.admin')

@section('content')

@include('partials.message', ['url' => route('admin.refuse')])

@include('partials.alerts', ['title' => 'Annonces à modérer'])

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adModeration as $ad)
            <tr id="{{ $ad->id }}">
                <td>{{ $ad->title }}</td>
                <td class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('annonces.show', $ad->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir l'annonce"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-success btn-sm" href="{{ route('admin.approve', $ad->id) }}" role="button" data-toggle="tooltip" title="Approuver l'annonce"><i class="fas fa-thumbs-up"></i></a>
                    <i class="fas fa-spinner fa-pulse fa-lg" style="display: none"></i>
                    <a class="btn btn-danger btn-sm" href="#" role="button" data-id="{{ $ad->id }}" data-toggle="tooltip" title="Refuser l'annonce"><i class="fas fa-thumbs-down"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex">
    <div class="mx-auto">
        {{ $adModeration->links() }}
    </div>
</div>
@endsection

@section('script')

@include('partials.script')

@endsection