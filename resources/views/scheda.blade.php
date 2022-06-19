@extends('layouts.app')

<html>
  <head>

    @section('title', 'La tua scheda')
    <link rel="stylesheet" href='{{url("/css/scheda.css")}}'>
    <script src='{{ url("js/scheda.js")}}' defer></script>

  </head>

  <body>

    @section('content')
      <article>
        @section('titolo', 'SCHEDA')
        <em>Componi la tua scheda:</em>
        <section class="choice-grid">          
        </section>
      </article>
    @endsection

  </body>

</html>