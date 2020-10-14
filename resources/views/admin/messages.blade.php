@extends('layouts.admin')

@section('content')

@include('partials.message', ['url' => route('admin.message.refuse')])

@include('partials.alerts', ['title' => 'Messages à modérer'])

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Texte</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr id="{{ $message->id }}">
                <td>{{ $message->email }}</td>
                <td>{{ $message->texte }}</td>
                <td class="float-right">
                    <a class="btn btn-success btn-sm" href="{{ route('admin.message.approve', $message->id) }}" role="button" data-toggle="tooltip" title="Approuver le message"><i class="fas fa-thumbs-up"></i></a>
                    <i class="fas fa-spinner fa-pulse fa-lg" style="display: none"></i>
                    <a class="btn btn-danger btn-sm" href="#" role="button" data-id="{{ $message->id }}" data-toggle="tooltip" title="Refuser le message"><i class="fas fa-thumbs-down"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex">
    <div class="mx-auto">
        {{ $messages->links() }}
    </div>
</div>
@endsection

@section('script')

@include('partials.script')

@endsection