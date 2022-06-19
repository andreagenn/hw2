@extends('layouts.app')

<html>
  <head>    

    @section('title', 'Il tuo account')
    <link rel="stylesheet" href='{{url("/css/account.css")}}'>

  </head>
  <body>   

    @section('content')
      <article>

        @section('titolo', 'ACCOUNT')
        <section>
          <div class="account">
            <em>Il tuo account</em>
            <p>Username: {{$user['username']}}</p> 
            <p>Nome: {{$user['nome']}}</p>
            <p>Cognome: {{$user['cognome']}}</p>
            <p>Email: {{$user['email']}}</p>
            <p>Abbonamento: {{$user['abbonamento']}}</p>
          </div>
        </section>
        <a id='logout' href='/laravel/public/logout'>Effettua il logout!</a>

      </article>
    @endsection

  </body>  

</html>