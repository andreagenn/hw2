const form=document.forms['login'];

const errore_login = document.querySelector('#errore_login');
const errore_credenziali = document.querySelector("#cred_sbagliate");

form.addEventListener('submit', validazione_login);

function validazione_login(event) {
    event.preventDefault();


    if (form.username.value.length == 0 || form.password.value.length == 0) {
        event.preventDefault();
        errore_login.classList.remove('hidden');
        errore_credenziali.classList.add("hidden");
    } else {
        fetch('http://localhost/laravel/public/login/checkCredenziali/'+encodeURIComponent(form.username.value)+'/'+encodeURIComponent(form.password.value)).then(handler).then(controllo);
    }

    function handler(response) {
        const ritorno = response.text();
        return ritorno;
    }
    
    function controllo(ritorno) {
        if (ritorno == 'ok') { 
                console.log('credenziali giuste');
                form.submit();
        }
        if (ritorno == 'credenziali_sbagliate') {
            event.preventDefault();
            console.log('credenziali sbagliate');
            errore_login.classList.add('hidden');
            errore_credenziali.classList.remove("hidden");
        }
       
    
    }
}


  