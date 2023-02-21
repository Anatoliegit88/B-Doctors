@extends('layouts.admin')

@section('content')
    <h2>Statistics {{ auth()->user()->name }} {{ auth()->user()->surname }}</h2>

    {{-- numero di messaggi e recensioni ricevute per mese/anno
    grafico a barre fasce di voto ricevuti per mese/anno --}}

    <!-- <div style="width: 500px;"><canvas id="dimensions"></canvas></div><br/> -->
    <h2>Numero Messaggi ricevuti</h2>
    <h4>Anni</h4>
    <div style="width: 800px;">
        <canvas id="message_for_year"></canvas>
    </div>

    <h4>Mesi</h4>
    <div style="width: 800px;">
        <canvas id="message_for_month"></canvas>
    </div>


    <h2>Numero Feedback ricevuti</h2>
    <h4>Anni</h4>
    <div style="width: 800px;">
        <canvas id="feedback_for_year"></canvas>
    </div>

    <h4>Mesi</h4>
    <div style="width: 800px;">
        <canvas id="feedback_for_month"></canvas>
    </div>

    <h2>Media Voto</h2>
    <h4>Anni</h4>
    <div style="width: 800px;">
        <canvas id="vote_for_year"></canvas>
    </div>

    <h4>Mesi</h4>
    <div style="width: 800px;">
        <canvas id="vote_for_month"></canvas>
    </div>
@endsection
