const form = document.forms['signup'];
form.addEventListener('submit', validazione_signup);

let i=0;

const errore1 = document.querySelector('#errore1'); //requisito password    
const errore2 = document.querySelector('#errore2'); //requisito campi pieni
const errore6 = document.querySelector('#errore6'); //requisito username
const errore7 = document.querySelector('#errore7'); //requisito email
const errore8 = document.querySelector('#errore8'); //requisito nome
const errore9 = document.querySelector('#errore9'); //requisito cognome

function validazione_signup(event){
    event.preventDefault();
    i=0;
    
    if(form.username.value.length == 0 || 
        form.password.value.length == 0 ||
        form.email.value.length == 0 ||
        form.nome.value.length == 0 ||
        form.cognome.value.length == 0 ||
        form.password.value.length<5 ||
        form.password.value.length>15 ||
        !/^[a-zA-Z0-9_]{1,15}$/.test(form.username.value) ||
        !/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(form.email.value).toLowerCase()) ||
        !/^[a-zA-Z]+$/.test(form.nome.value) ||
        !/^[a-zA-Z]+$/.test(form.cognome.value)) {
            

        errore1.classList.add('hidden'); 
        errore2.classList.add('hidden'); 
        errore6.classList.add('hidden'); 
        errore7.classList.add('hidden'); 
        errore8.classList.add('hidden');
        errore9.classList.add('hidden');


        if(form.username.value.length == 0 || 
            form.password.value.length == 0 ||
            form.email.value.length == 0 ||
            form.nome.value.length == 0 ||
            form.cognome.value.length == 0) {
            errore2.classList.remove('hidden');
            document.querySelector('#errore3').classList.add('hidden');
            document.querySelector('#errore4').classList.add('hidden');
        }else if(form.password.value.length<5 ||
            form.password.value.length>15) {
            errore1.classList.remove('hidden');
            document.querySelector('#errore3').classList.add('hidden');
            document.querySelector('#errore4').classList.add('hidden');
        } else if(!/^[a-zA-Z0-9_]{1,15}$/.test(form.username.value)){
            errore6.classList.remove('hidden');
            document.querySelector('#errore3').classList.add('hidden');
            document.querySelector('#errore4').classList.add('hidden');
        } else if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(form.email.value).toLowerCase())) {
            errore7.classList.remove('hidden');
            document.querySelector('#errore3').classList.add('hidden');
            document.querySelector('#errore4').classList.add('hidden');
        } else if(!/^[a-zA-Z]+$/.test(form.nome.value)){
            errore8.classList.remove('hidden');
            document.querySelector('#errore3').classList.add('hidden');
            document.querySelector('#errore4').classList.add('hidden');
        } else if(!/^[a-zA-Z]+$/.test(form.cognome.value)){
            errore9.classList.remove('hidden');
            document.querySelector('#errore3').classList.add('hidden');
            document.querySelector('#errore4').classList.add('hidden');
        }

    } else {

        event.preventDefault();

        errore1.classList.add('hidden');
        errore2.classList.add('hidden');
        errore6.classList.add('hidden'); 
        errore7.classList.add('hidden'); 
        errore8.classList.add('hidden');
        errore9.classList.add('hidden');

        console.log(form.username.value);

        fetch('http://localhost/laravel/public/registrazione/username/'+encodeURIComponent(form.username.value)).then(handler).then(controllo);
        fetch('http://localhost/laravel/public/registrazione/email/'+encodeURIComponent(form.email.value)).then(handler).then(controllo);
    }


    function handler(response) {
        const ritorno = response.text();
        return ritorno;
    }
    
    function controllo(ritorno) {
        if (ritorno == 'ok') { 
            i++;
            if(i==2){
                console.log('registrazione effettuata con successo');
                form.submit();
            } 
        }
        if (ritorno == 'username_utilizzato') {
            event.preventDefault();
            console.log('username in uso');
            document.querySelector('#errore3').classList.remove('hidden'); 
            document.querySelector('#errore4').classList.add('hidden'); 
        }
        if (ritorno == 'email_utilizzata') { 
            console.log('email in uso');
            event.preventDefault();
            document.querySelector('#errore4').classList.remove('hidden'); 
            document.querySelector('#errore3').classList.add('hidden');
        }
    
    }


}


