@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card bg-light">
        <h5 class="card-header">Votre annonce</h5>
        <div class="card-body">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Vous ne pouvez modifier que le titre et le texte de votre annonce.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="POST" action="{{ route('annonces.update', $ad->id) }}">
                @method('PUT')
                @csrf
                @include('partials.form-group', [
                    'title' => 'Titre',
                    'type' => 'text',
                    'name' => 'title',
                    'value' => $ad->title,
                    'required' => true,
                ])
                <div class="form-group">
                    <label for="texte">Texte</label>
                    <textarea class="form-control{{ $errors->has('texte') ? ' is-invalid' : '' }}" id="texte" name="texte" rows="3" required>{{ old('texte', isset($value) ? $value : $ad->texte) }}</textarea>
                    @if ($errors->has('texte'))
                        <div class="invalid-feedback">
                            {{ $errors->first('texte') }}
                        </div>
                    @endif
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>
@endsection