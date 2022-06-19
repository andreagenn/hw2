fetch("http://localhost/laravel/public/ricerca_scheda/inizializza").then(onResponse, onError).then(displayEsercizi);

function onResponse(response) {
    if(!response.ok) {
        console.log('Problema con la risposta');
        return null;
    }
    return response.json();
}

function onError(error) {
    console.log('Errore: '+ error);
}

function displayEsercizi(json_lista_esercizi){
    if(!json_lista_esercizi) {
        console.log('Nessun json ritornato');
        return;
    }
    console.log(json_lista_esercizi);

    const form=document.forms['ricerca_scheda'];
    form.addEventListener('submit', ricerca_scheda);


    function ricerca_scheda(event){
        

        event.preventDefault();
        const username=form.ricerca.value;
        console.log(username);

        const divErrore=document.querySelector('.errore');
        const grid=document.querySelector(".grid");
        

        if(form.ricerca.value.length==0){

            //reset grid e errore
            grid.innerHTML='';
            divErrore.innerHTML='';         

            const formVuoto = document.createElement('span');
            formVuoto.classList.add('rispostaVuota');
            formVuoto.textContent='Inserisci un nome utente valido';
            divErrore.appendChild(formVuoto);
        } else {
            fetch('http://localhost/laravel/public/ricerca_scheda/utente/' + encodeURIComponent(username)).then(handler, onError).then(onSearch_scheda);
        }
        function handler(response) {
            if (!response) { 
                console.log('Nessuna risposta') 
            }
            return response.json();; 
        }
    
        function onSearch_scheda(json_esercizi_utente) {
            if (!json_esercizi_utente) {
                console.log('Nessun json ritornato');
                return;
            }

            console.log(json_esercizi_utente);

            const length1=Object.keys(json_lista_esercizi).length;
            const length2=Object.keys(json_esercizi_utente).length;
            

            //reset del grid
            if(grid.hasChildNodes){
                grid.innerHTML='';         
            }

            //reset dell'eventuale errore
            if(divErrore.hasChildNodes){
                divErrore.innerHTML='';         
            }

            if(json_esercizi_utente.length===0){

                const rispostaInesistente = document.createElement('span');
                rispostaInesistente.classList.add('rispostaInesistente');
                rispostaInesistente.textContent='Utente non trovato o scheda utente vuota';
                divErrore.appendChild(rispostaInesistente);

            }else{

                for(let j=0;j<length1;j++){
                    for(let i=0; i<length2; i++){
                        if(json_lista_esercizi[j].titolo==json_esercizi_utente[i].esercizio){

                            const div=document.createElement('div');
                            div.classList.add('risposta');
                            const img=document.createElement('img');
                            img.src=json_lista_esercizi[j].immagine;
                            const titolo= document.createElement('p');
                            titolo.textContent=json_lista_esercizi[j].titolo;
                            div.appendChild(img);
                            div.appendChild(titolo);
                            grid.appendChild(div);

                        
                        }            
                    }   
                }
            }
        }
    }
}