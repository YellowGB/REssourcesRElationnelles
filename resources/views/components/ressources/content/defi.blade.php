<div class="flex justify-center">
    <div class="flip-card w-10/12 lg:w-1/2 h-96 lg:text-lg">
        <div class="flip-card-inner">
            <div class="flip-card-front flex flex-col justify-center items-center p-4 bg-blue-500 text-gris-normal rounded">
                <h3 class="mb-2">{{ __('titles.content.description') }}</h3>
                <p>{{ $content->description }}</p>
            </div>
            <div class="flip-card-back flex flex-col justify-center items-center p-4 bg-green-600 text-gris-normal rounded text-xl lg:text-2xl">
                @if (! is_null($content->bonus))
                    <h4 class="mb-2">{{ __('titles.content.bonus') }}</h4>
                    <p>{{ $content->bonus }}</p>
                @endif
            </div>
        </div>
    </div>

    <style>
        .flip-card {
            background-color: transparent;
            perspective: 1000px; /* Retirer si on ne souhaite pas l'effet 3D */
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden; /* Safari */
            backface-visibility: hidden;
        }

        /* Arrière */
        .flip-card-back {
            transform: rotateY(180deg);
        }
    </style>

</div>