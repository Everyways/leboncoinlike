@extends('layouts.admin')

@section('content')

@include('partials.alerts', ['title' => 'Annonces obsolètes'])

@include('partials.table-add-del-view')

@endsection

@section('script')

@include('partials.script-add-del-view')

@endsection