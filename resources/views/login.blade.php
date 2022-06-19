<html>
    <head>
        <title>Power Gym - Accedi!</title>
        <meta charset='utf-8'>
        <link rel='stylesheet' href='{{url("/css/login.css")}}'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <script src='{{ url("js/login.js")}}' defer></script>
    </head>
    <body>
        <article>
            <section id='logo'>
                <img src='images/logo2.png'>
                <h1>Benvenuto in Power Gym!</h1>
            </section>
            <p>Effettua l'accesso!</p>

            <span class='hidden' id='errore_login'>Inserisci username e password!</span>
            <span class='hidden' id='cred_sbagliate'>Username e/o password errati!</span>
            

            <section id='login-form'>
                <form name='login' method='post' id='form_login'>
                    <input type='hidden' name='_token' value='{{$csrf_token}}'>

                    <label>Username:<input type='text' name='username' id='nome_utente'></label>
                    <label>Password:<input type='password' name='password' id='password'></label>
                    <label>&nbsp<input type='submit' value='Accedi' id='button'></label>
                </form>
            </section>
            
            <p class='footer'>Non hai ancora un account? <a id='link' href="/laravel/public/registrazione">Registrati qui!</a>

        </article>
    </body>
</html>
