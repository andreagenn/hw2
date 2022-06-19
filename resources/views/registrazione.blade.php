<html>
    <head>
        <title>Power Gym - Iscriviti!</title>
        <meta charset='utf-8'>
        <link rel='stylesheet' href='{{url("css/registrazione.css")}}'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src='{{ url("js/registrazione.js")}}' defer></script>
    </head>
    <body>
        <article>
            <section id='logo'>
                <img src='images/logo2.png'>
                <h1>Benvenuto in Power Gym!</h1>
            </section>
            <p>Completa il modulo qui sotto per iscriverti!</p>

            <span class='hidden' id='errore1'>La password deve contenere tra i 5 e i 15 caratteri!</span>
            <span class='hidden' id='errore2'>Bisogna compilare tutti i campi!</span>
            <span class='hidden' id='errore3'>Username già in uso!</span>
            <span class='hidden' id='errore4'>Email già in uso!</span>
            <span class='hidden' id='errore6'>Username non valido!</span>
            <span class='hidden' id='errore7'>Formato email non valido!</span>
            <span class='hidden' id='errore8'>Inserisci un nome valido!</span>
            <span class='hidden' id='errore9'>Inserisci un cognome valido!</span>

            <section id='subscribe-form'>
                <form name='signup' method='post' id='form_subscribe'>

                    <input type='hidden' name='_token' value='{{$csrf_token}}'>
                    <label>Username:<input type='text' name='username' id='nome_u' value='{{$old_username}}'></label>
                    <label>Password:<input type='password' name='password' id='pw'></label>
                    <label>Email:<input type='text' name='email' id='email' value='{{$old_email}}'></label>
                    <label>Nome:<input type='text' name='nome' id='nome' value='{{$old_nome}}'></label>
                    <label>Cognome:<input type='text' name='cognome' id='cognome' value='{{$old_cognome}}'></label>

                    <label>&nbsp<input type='submit' value='Registrati'></label>

                </form>
            </section>

            <p class='footer'>Sei già iscritto? <a id='link' href="/laravel/public/login">Accedi qui!</a></p>

        </article>
    </body>
</html>
