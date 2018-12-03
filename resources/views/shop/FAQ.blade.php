@extends('layouts.master')

@section('title') The Shop - Home @endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col text-center">
            <h2>Häufig gestellte Fragen</h2>
        </div>
    </div>


    <!-- QUESTIONS - ANSWERTS -->
    <div class="row" id="faq">
        <ul class="list-group-flush">
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort1" aria-expanded="false" aria-controls="antwort1">
                <a href="#"><i class="fa"></i> <b>Was haben all diese Fachbegriffe zu bedeuten? (Quadcopter, DJI, TBX, FPV, RTF, ...)?</b></a>
                <ul class="collapse" id="antwort1">
                    <li class="list-group-item">

                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Begirff</th>
                                <th scope="col">Bedeutung</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">OSD</th>
                                <td>"On-screen-display"</td>
                            </tr>
                            <tr>
                                <th scope="row">PID Tuning</th>
                                <td>"Proportional-integral-derivative" controller</td>
                            </tr>
                            <tr>
                                <th scope="row">FPV</th>
                                <td>"First-Person-View"</td>
                            </tr>
                            <tr>
                                <th scope="row">RTF</th>
                                <td>"Ready-to-Fly"</td>
                            </tr>
                            <tr>
                                <th scope="row">RTF</th>
                                <td>...</td>
                            </tr>
                            </tbody>
                        </table>

                    </li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort2" aria-expanded="false" aria-controls="antwort2">
                <a href="#"><i class="fa"></i> <b>Ich habe meine Drohne im Griff. Darf ich damit nun im Quartier umherfliegen und mein Haus filmen?</b></a>
                <ul class="collapse" id="antwort2">
                    <li class="list-group-item">Grundsätzlich ja. Ferngesteuerte Drohnen benötigen keine Bewilligung, wenn sie unter 30 Kilogramm wiegen und der Pilot sein Modell jederzeit auf Sicht steuert. Diese Voraussetzungen treffen praktisch auf alle Drohnen zu, die zu Hobbyzwecken im Warenhaus oder über das Internet bestellt werden.
                        Gerade in Wohnquartieren gilt es aber, unbedingt den Schutz der Privatsphäre zu beachten. Es schätzt kein Nachbar, wenn über seinem Garten eine Drohne schwebt! Am besten fliegen Sie mit ihrem Multikopter dort, wo Sie niemanden belästigen. Zudem gilt es immer zu beachten, dass einzelne Kantone oder Gemeinden weitergehende Einschränkungen vornehmen können.</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort3" aria-expanded="false" aria-controls="antwort3">
                <a href="#"><i class="fa"></i> <b>Kann ich also mit meinem Multikopter überall und so hoch fliegen, wie ich will?</b></a>
                <ul class="collapse" id="antwort3">
                    <li class="list-group-item">Nein, ganz so einfach ist es nicht. Das Gesetz schreibt vor, dass im Umkreis von 5 Kilometern um zivile und militärische Flugplätze ohne Bewilligung durch den Flugplatzleiter oder die Flugsicherung Skyguide keine Modellflugzeuge oder Drohnen betrieben werden dürfen. Um jeden grösseren Flugplatz gibt es zudem eine sogenannte Kontrollzone (CTR), die einen grösseren Radius als 5 Kilometer aufweist. In dieser Kontrollzone dürfen Drohnen und Modellflugzeuge nur bis 150 Meter über Grund geflogen werden.
                        Ausserhalb dieser Zonen gilt es zu bedenken, dass ab einer Höhe von 150 Metern über Grund über unbewohntem und 300 Metern über bewohntem Gebiet auch manntragende Flugzeuge oder Helikopter anzutreffen sind. Diese haben kaum eine Chance, eine Drohne oder ein Modellflugzeug rechtzeitig zu erkennen und können daher kaum ausweichen.</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort4" aria-expanded="false" aria-controls="antwort4">
                <a href="#"><i class="fa"></i> <b>Und was passiert, wenn mein Multikopter trotz aller Vorsichtsmassnahmen abstürzt und einen Schaden verursacht?</b></a>
                <ul class="collapse" id="antwort4">
                    <li class="list-group-item">Bevor Sie Ihren Multikopter das erste Mal fliegen lassen, müssen sie sicher sein, dass Ihre Haftpflichtversicherung allfällige Schäden von mindestens einer Million Franken abdeckt. Dies gilt bereits für alle Flugmodelle mit einem Gewicht ab 500 Gramm. Gehen Sie verantwortungsvoll mit Ihrem Multikopter um, vermeiden sie das tiefe Fliegen über Menschen oder Tieren und denken Sie immer daran, dass sich andere Personen durch Ihr Hobby auch gestört fühlen können.</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort5" aria-expanded="false" aria-controls="antwort5">
                <a href="#"><i class="fa"></i> <b>Was ist ein Multicopter?</b></a>
                <ul class="collapse" id="antwort5">
                    <li class="list-group-item">Der Begriff Multicopter steht für eine Drohne mit mehreren Rotoren. Je nach Anzahl der Rotorblätter sind die Multicopter in verschiedene Klassen eingeteilt. Das „Multi“ (lat. viel, vielfach, mehrfach) steht dafür das der Copter im Gegensatz zu einem Hubschrauber über mehrere Rotorblätter-Paare verfügt.</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort6" aria-expanded="false" aria-controls="antwort6">
                <a href="#"><i class="fa"></i> <b>Quadcopter? Quadrocopter? Was ist der Unterschied?</b></a>
                <ul class="collapse" id="antwort6">
                    <li class="list-group-item">Ein Quadcopter (Kurzform von Quadrocopter) ist ein Multicopter mit 4 Rotoren. Die beiden Begriffe sind synomym.</li>
                </ul>
            </li>
            <li class="list-group-item collapsed" data-toggle="collapse" data-target="#antwort7" aria-expanded="false" aria-controls="antwort7">
                <a href="#"><i class="fa"></i> <b>Was ist der Unterschied zwischen einem Quadrocopter einem Hexacopter und einem Oktocopter?</b></a>
                <ul class="collapse" id="antwort7">
                    <li class="list-group-item">Ein Multicopter mit 4 Rotoren wird als Quadcopter bzw. Quadrocopter bezeichnet, besitzt er 6 Rotoren nennt man ihn Hexacopter. Die größten Multicopter die derzeit gebräuchlich sind besitzen 8 Rotorblätter und man nennt sie Oktokopter.</li>
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
