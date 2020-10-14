@extends('layouts.app')

@section('content')

<div class="container">

    <div id="massageOk" class="alert alert-success" role="alert" style="display: none">
        Votre message a été pris en compte et sera envoyé rapidement
    </div>

    @include('partials.message', ['url' => route('message')])

    <div class="card bg-light">
        <h5 class="card-header">{{ $ad->title }}</h5>
        @if($photos->isNotEmpty())
            @if($photos->count() > 1)
                <div id="ctrl" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                         @foreach ($photos as $photo)
                            <li data-target="#ctrl" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($photos as $photo)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img class="d-block w-100" src="{{ asset('images/' . $photo->filename) }}" alt="First slide">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#ctrl" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#ctrl" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div>
            @else
                <img class="card-img-top" src="{{ asset('images/' . $ad->photos->first()->filename) }}" alt="Card image cap">
            @endif
        @endif
        <div class="card-body">
            <hr>
            <p><u>Description :</u></p>
            <p class="card-text">{{ $ad->texte }}</p>
            <hr>
            <p class="card-text"><u>Catégorie</u> : {{ $ad->category->name }}</p>
            <p class="card-text">
                <u>Ville</u> : {{ $ad->commune_name . ' (' . $ad->commune_postal . ')'}}<br>
                
            </p>
            <hr>
            <p class="card-text"><u>Pseudo</u> : {{ $ad->pseudo }}</p>
            <button id="openModal" type="button" class="btn btn-primary">Envoyer un message</button>
        </div>
    </div>

</div>

@endsection

@section('script')
    <script>

        $(() => {

            const toggleButtons = () => {
                $('#icon').toggle();
                $('#buttons').toggle();
            }

            $('#openModal').click(() => {
                $('#messageModal').modal();
            });

            $('#messageForm').submit((e) => {
                let that = e.currentTarget;
                e.preventDefault();
                $('#message').removeClass('is-invalid');
                $('.invalid-feedback').html('');
                toggleButtons();
                $.ajax({
                    method: $(that).attr('method'),
                    url: $(that).attr('action'),
                    data: $(that).serialize()
                })
                .done((data) => {
                    toggleButtons();
                    $('#messageModal').modal('hide');
                    $('#massageOk').text(data.info).show();
                })
                .fail((data) => {
                    toggleButtons();
                    $.each(data.responseJSON.errors, function (i, error) {
                        $(document)
                            .find('[name="' + i + '"]')
                            .addClass('is-invalid')
                            .next()
                            .append(error[0]);
                    });
                });
            });

        })

    </script>
@endsection
