@extends('layouts.master')

@section('title') The Shop - Home @endsection

@section('content')

    <div class="row justify-content-center pt-5">
        <div class="col text-center">
            <h1>Häufig gestellte Fragen</h1>
        </div>
    </div>


    <!-- QUESTIONS - ANSWERTS -->
    <div class="row" id="faq">
        <ul class="list-group-flush">
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort1" aria-expanded="false" aria-controls="antwort1">
                <a href="#"><i class="fa"></i> <b>Was haben all diese Fachbegriffe zu bedeuten? (Quadcopter, DJI, TBX, FPV, RTF, ...)?</b></a>
                <ul class="collapse" id="antwort1">
                    <li class="list-group-item">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Begirff</th>
                                <th scope="col">Bedeutung</th>
                                <th scope="col">Bild</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">...</th>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">...</th>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">...</th>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            </tbody>
                        </table>

                    </li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort2" aria-expanded="false" aria-controls="antwort2">
                <a href="#"><i class="fa"></i> <b>Frage 2</b></a>
                <ul class="collapse" id="antwort2">
                    <li class="list-group-item">Antwort 2</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort3" aria-expanded="false" aria-controls="antwort3">
                <a href="#"><i class="fa"></i> <b>Frage 3</b></a>
                <ul class="collapse" id="antwort3">
                    <li class="list-group-item">Antwort 3</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort4" aria-expanded="false" aria-controls="antwort4">
                <a href="#"><i class="fa"></i> <b>Frage 4</b></a>
                <ul class="collapse" id="antwort4">
                    <li class="list-group-item">Antwort 4</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort5" aria-expanded="false" aria-controls="antwort5">
                <a href="#"><i class="fa"></i> <b>Frage 5</b></a>
                <ul class="collapse" id="antwort5">
                    <li class="list-group-item">Antwort 5</li>
                </ul>
            </li>
        </ul>
    </div> <!-- end of row -->

@endsection

@push('scripts')
    <script>
        /* Function for Besteller Carousel */
        $("#myCarousel").on("slide.bs.carousel", function(e) {
            var e = $(e.relatedTarget); // get the secondary target for the event
            var index = e.index(); // get next index
            var itemsPerSlide = 3;
            var totalItems = $(".carousel-item").length;

            // make the carousel turn around
            if (index >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - index);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $(".carousel-item")
                            .eq(i) // Reduce the set of matched elements to the one at the specified index.
                            .appendTo(".carousel-inner");
                    } else {
                        $(".carousel-item")
                            .eq(0)
                            .appendTo($(this).find(".carousel-inner"));
                    }
                }
            }
        });
    </script>
@endpush
