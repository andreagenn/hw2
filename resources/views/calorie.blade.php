@extends('layouts.app')

<html>
  <head>

    @section('title', 'Kcal Counter')
    <link rel="stylesheet" href='{{url("/css/calorie.css")}}'>
    <script src='{{ url("js/calorie.js")}}' defer></script>

  </head>
  <body>

    @section('content')
      <article>

        @section('titolo', 'CALORIE')
        <section>
          <div class="calorie">
            <em>Ricordati di contare le calorie che assumi giornalmente!</em>
            <form name='alimenti' action='calorie.php' method='get' id='get_kcal'>
              <span id='descrizione'>Inserisci un alimento (in inglese):</span>
              <input id='barra' type="text" name='alimento'>
              <input id='button' type="submit" value="Cerca">
            </form>
            <span class='searchResult'></span>
          </div>
        </section>

      </article>
    @endsection

  </body>

</html>