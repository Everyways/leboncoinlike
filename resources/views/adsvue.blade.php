@extends('layouts.app')

@section('content')

<div id="app">
    @if($region)
        <div id="start"
            data-id={{ $region->id }}
            data-code="{{ $region->code }}"
            data-slug="{{ $region->slug }}"
        @if($departementCode)
            data-departement="{{ $departementCode }}"
            @if($communeCode)
                data-commune="{{ $communeCode }}"
            @endif
        @endif
    @else
        <div id="start" data-id="0"
    @endif
    @if($page != 0)
        data-page="{{ $page }}"
    @endif
    ></div>
    <ad
        url="{{ route('annonces.search') }}"
        :categories="{{ $categories }}"
        :regions="{{ $regions }}"
        ref="adComp"
    ></ad>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/vue.js') }}"></script>
@endsection