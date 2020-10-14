@extends('layouts.user')
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vos données personnelles</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">A propos</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Rapport généré pour</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Pour le site</td>
                        <td>Annonces</td>
                    </tr>
                    <tr>
                        <td>A l'url</td>
                        <td>annonces.oo</td>
                    </tr>
                    <tr>
                        <td>Le</td>
                        <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                    </tr>
                </tbody>
            </table>
            <em>Vous pouvez enregistrer cette page pour conserver vos données en utilisant le menu de votre navigateur.</em>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Utilisateur</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Nom de connexion</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Date d'inscription</td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection