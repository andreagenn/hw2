@extends('layouts.app')

<html>
  <head>

    @section('title', 'Ricerca Scheda')
    <link rel="stylesheet" href='{{url("/css/ricerca_scheda.css")}}'>
    <script src='{{ url("js/ricerca_scheda.js")}}' defer></script>

  </head>
  <body>

    @section('content')
      <article>

        @section('titolo', 'RICERCA')

        <em>Ricerca una scheda inserendo il nome utente: </em>
        <form name='ricerca_scheda' action='scheda.php' method='get' id='ricerca_scheda'>
          <span id='descrizione'>Inserisci username:</span>
          <input id='barra' type="text" name='ricerca'>
          <input id='button' type="submit" value="Cerca">
        </form>
        <section class="grid">   
        </section>
        <div class='errore'></div>
      </article>
    @endsection

  </body>

</html>