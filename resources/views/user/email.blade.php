@extends('layouts.user')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Vous pouvez modifier votre email ici</h5>
        <div class="card-body">
            @if(session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form method="POST" action="{{ route('user.email.update') }}">
                @method('PUT')
                @csrf
                @include('partials.form-group', [
                'title' => '',
                'type' => 'text',
                'name' => 'email',
                'value' => auth()->user()->email,
                'required' => true,
                ])
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>
@endsection