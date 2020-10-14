@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-3">
            <a class="btn btn-primary" href="{{ route('annonces.create') }}" role="button">Déposer une annonce</a>
        </div>
        <div class="col-12 col-md-9 col-lg-9">
            <svg xmlns:svg="http://www.w3.org/2000/svg" viewBox="0 0 900 900">
                <a href="{{ route('annonces.index', 'occitanie') }}">
                    <path class="base" data-toggle="tooltip" title="Occitanie" d="m 428.3,774.7 68.28824,1.41765 L 494.4,720.6 l 52.5,-38.8 14.8,7 25.1,-26 0.9,-38.1 -37.5,-8.3 -9.7,-29.4 -34.6,-24.3 -15.42353,24.04118 -15.61765,-21.68824 -21.22941,26.62353 -22.55294,-3.91765 -2.51176,-23.22941 -34.12942,-3.54706 L 351.5,638.6 293.45294,646.81765 302.82353,749.64706 356.4,744.2 Z" />
                </a>
                <a href="{{ route('annonces.index', 'pays_de_la_loire') }}">
                    <path class="base" data-toggle="tooltip" title="Pays de la Loire" d="M 268.2,432.3 229.2353,441.52941 182.9,401.6 162.2,343.4 231.37059,312.44118 247.29412,255.67647 356.5,281.5 l -20.8,46.1 -30.75882,38.22353 -56.11765,14.82353 z""/>
                </a>
                <a href=" {{ route('annonces.index', 'bretagne') }}">
                        <path class="base" data-toggle="tooltip" title="Bretagne" d="M 226.05882,309.17647 157.23529,338.29411 41.82353,307.05882 20.647059,288 48.176471,281.64706 16.941177,259.94117 25.8,247 123.35294,218.64706 143.47059,248.29411 207.5,243.2 242,252.5 Z""/>
                </a>
                <a href=" {{ route('annonces.index', 'centre') }}">
                            <path class="base" data-toggle="tooltip" title="Centre-Val de Loire" d="m 313.41177,364.7647 c 9,7.41177 71.31764,68.52942 71.31764,68.52942 L 441.04118,427.20588 490.2,398.1 487.95294,290.12941 388.1513,230.74351 362.62353,241.30588 362.1,283.3 342,329.82353 Z" />
                </a>
                <a href="{{ route('annonces.index', 'normandie') }}">
                    <path class="base" data-toggle="tooltip" title="Normandie" d="m 323.71176,174.21765 -88.65294,2.60588 -9.52941,-29.11765 -36,-1.58824 25.19191,92.05393 141.17868,35.3929 0.7,-36.86447 33.52419,-16.52616 22.53911,-31.1701 2.80632,-42.7111 L 392.6,117.1 312.35294,151.41176 Z" />
                </a>
                <a href="{{ route('annonces.index', 'ile_de_france') }}">
                    <path class="base" data-toggle="tooltip" title="Île-de-France" d="M 397.58824,227.11764 415,194 l 79,6.6 20.1,26 -1.1,37.7 -29.3,16.7 z" />
                </a>
                <a href="{{ route('annonces.index', 'hauts_de_france') }}">
                    <path class="base" data-toggle="tooltip" title="Hauts-de-France" d="m 459.5,28.1 -55.3,18.4 -3.4,39.5 -3.53336,26.02312 23.75689,29.84747 -3.0264,46.31423 76.47889,6.53412 20.30295,23.76216 46.87398,-86.33992 L 558.3,99 Z" />
                </a>
                <a href="{{ route('annonces.index', 'grand_est') }}">
                    <path class="base" data-toggle="tooltip" title="Grand Est" d="M 563.57853,103.93079 635.69174,156.40927 800,212.3 774.52942,246.70588 757.9,336.4 l -19.6,7.6 -12.21765,-32.78235 -64.04787,-12.25792 -36.27715,30.39069 -38.03513,-33.68543 -43.84789,1.1548 -25.04824,-32.27372 0.18819,-41.30026 48.92475,-91.74037 z/"">
                </a>
                <a href=" {{ route('annonces.index', 'bourgogne') }}">
                        <path class="base" data-toggle="tooltip" title="Bourgogne-Franche-Comté" d="m 665.06471,305.92941 56.52353,11.18823 10.88823,27.94118 -71.77058,99.11765 L 635.1,442.5 l -4.6043,-15.10589 -25.49168,-3.77814 -15.22208,26.95233 -46.4355,-3.2994 7.80392,-22.04274 -55.53596,-28.13453 -0.1772,-114.99224 20.02314,-11.68867 26.14333,32.71916 47.7414,0.78345 38.12551,35.23961 z" />
                </a>
                <a href="{{ route('annonces.index', 'auvergne') }}">
                    <path class="base" data-toggle="tooltip" title="Auvergne-Rhône-Alpes" d="M 535.45882,450.42353 593.6,455.2 608.82353,429.88235 625.7,431.6 l 5.35883,17.87059 36,1.05882 36,-21.17647 30.70588,101.11765 L 632.9,608.1 l 12.8,20.3 -13.5,2.3 -45.6,-16.1 -30.18823,-2.6 -11.11765,-29.64706 -39.13122,-29.42816 -16.90577,21.26103 -15.41509,-17.33867 -22.25617,29.48934 -17.33293,-4.9306 1.98236,-19.69999 30.04875,-93.6762 -19.98993,-33.38263 45.80543,-30.84615 49.88761,25.00432 z" />
                </a>
                <a href="{{ route('annonces.index', 'provence') }}">
                    <path class="base" data-toggle="tooltip" title="Provence-Alpes-Côte d'Azur" d="m 594,625.23529 c 9,4.76471 41.29412,12.70589 41.29412,12.70589 l 18,-3.17648 -12.08824,-25.51764 68.20589,-54.42353 24.35294,26.47059 L 726.4,621.1 769.76471,636.88235 696.8,716.5 676.3,726.7 567,690.35294 592.94118,664.41176 Z" />
                </a>
                <a href="{{ route('annonces.index', 'corse') }}">
                    <path class="base" data-toggle="tooltip" title="Corse" d="m 773.65294,695.94118 5.7,72.5 -18.2,63.7 -19.2,-6.7 -24.6,-65.20589 12.17648,-29.11764 L 765,715.23529 l 1.05883,-20.64706 z" />
                </a>
                <a href="{{ route('annonces.index', 'aquitaine') }}">
                    <path class="base" data-toggle="tooltip" title="Nouvelle-Aquitaine" d="m 224.35882,446.83529 c 9,4.76471 51.35295,-11.64705 51.35295,-11.64705 l -15.35294,-49.76472 48.79411,-13.87058 75.36142,69.83442 53.72682,-6.19912 20.62104,34.50899 -27.50339,87.78513 -40.71765,-4.66471 L 349.3,630.54117 285.86471,643.45294 293.62353,745.47059 205.3,694.6 214.82942,628.95294 235.1874,506.12438 Z" />
                </a>
            </svg>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection