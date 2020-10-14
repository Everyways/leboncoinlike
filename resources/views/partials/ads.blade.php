@foreach($ads as $ad)

<a href="{{ route('annonces.show', $ad->id) }}" class="blockAd">
        <div class="card d-flex flex-row">
            <div class="card-header">
                @if($ad->photos->isNotEmpty())
                    <img class="rounded" src="{{ asset('thumbs/' . $ad->photos->first()->filename) }}" alt="">
                @else
                    <img src="{{ asset('thumbs/question.jpg') }}" alt="">
                @endif
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $ad->title }}</h4>
                <p class="card-text">{{ $ad->category->name }}</p>
                <p class="card-text">
                    {{ $ad->commune_name . ' (' . $ad->commune_postal . ')'}}<br>
                    
                </p>
            </div>
        </div>
    </a>
    <br>
@endforeach

<div class="d-flex">
    <div class="mx-auto">
        {{ $ads->links() }}
    </div>
</div>