@extends('layouts.master')

@section('title') The Shop - Home @endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col text-center">
            <h2>Ich bin Anfänger - helft mir bitte!</h2>
        </div>
    </div>


    <!-- GUIDE -->
    <div class="row" id="guide">
        <div class="col">
            <p>Es gibt grundsätzlich zwei Möglichkeiten sich eine Drohne zu beschaffen. Entweder man kauft ein fertiges Bundle, mit allen nötigen Komponenten ausgestattet um gleich loszulegen
            (sogenannt RTF - Ready to fly), oder man kauft die einzelnen Teile selber ein und setzt das Modell anschliessend zusammen. Die Vor- und Nachteile der jeweiligen Möglichkeit sind <a href="{{ route('index') }}">hier</a> zu finden.</p>
        </div>
    </div> <!-- end of row -->

    <div class="row">
        <div class="col-4">
            <div class="card" id="card_guide_doItYourself">
                <div class="card-header">
                    <h5>Variante Racing Drohne Eigenbau - Do it yourself</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Beim Zusammenstellen des persönlichen Racer Setups existieren zahlreiche Kombinationsmöglichkeiten.
                        Grundsätzlich setzt sich ein Quadcopter aus folgenden Teilen zusammen:</p>
                    <h6 class="card-title">Flugkomponenten</h6>
                    <ul class="list-group-flush" id="ul_flyComponents">
                        <li class="list-group-item">Frame</li>
                        <li class="list-group-item">Flight Controller</li>
                        <li class="list-group-item">Motoren (4x)</li>
                        <li class="list-group-item">ESC's (4x)</li>
                        <li class="list-group-item">Propeller</li>
                        <li class="list-group-item">LiPo-Batterien</li>
                        <li class="list-group-item">Receiver für Fernbedienung</li>
                    </ul>
                    <h6 class="card-title">FPV Komponenten</h6>
                    <ul class="list-group-flush" id="ul_fpvComponents">
                        <li class="list-group-item">FPV Kamera</li>
                        <li class="list-group-item">Videotransmitter</li>
                        <li class="list-group-item">FPV Antenne</li>
                    </ul>
                    <h6 class="card-title">Optionales Zubehör</h6>
                    <ul class="list-group-flush" id="ul_optAssesoires">
                        <li class="list-group-item">OSD (On-Screen-Display), in vielen Flight Controllern jedoch bereits integriert.</li>
                    </ul>
                </div>
            </div>
        </div> <!-- END OF COL - Variante Eigenbau -->

        <div class="col-8">
            <div class="card" id="card_guide_doItYourself">
                <div class="card-header">
                    <h5>Variante RTF - Flugfertige Copter</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Mit steigender Bekanntheit der Sportart FPV Racing steigt auch die Anzahl erhältlicher Modelle von unterschiedlichen Herstellern in diversen Qualitäts- und Preisklassen. Wir stellen Ihnen einige der beliebtesten Modelle vor, welche von namhaften, angesehenen Herstellern im Racing Bereich stammen und über hochwertige Komponenten verfügen.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Drohne 1</h6>
                                </div>
                                <div class="card-body">
                                    asdfasdf
                                </div>
                                <div class="card-footer">
                                    adfasdf
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Drohne 2</h6>
                                </div>
                                <div class="card-body">
                                    asdfasdf
                                </div>
                                <div class="card-footer">
                                    adfasdf
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div> <!-- END OF COL - Variante RTF -->
    </div> <!-- END OF ROW -->


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
