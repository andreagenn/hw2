
//fetch per ottenere le calorie

const form = document.forms['alimenti'];
form.addEventListener('submit', ricercaKcal);

function ricercaKcal(event){
    event.preventDefault();
    console.log(form.alimento.value);
    const $spanResult=document.querySelector(".searchResult");

    if(form.alimento.value.length===0){
        console.log('form vuoto');       
        $spanResult.textContent="Errore! Inserisci un alimento valido.";    
    } else{
        fetch('http://localhost/laravel/public/calorie/' + encodeURIComponent(form.alimento.value)).then(onResponse, onError).then(onAlimenti);
    }

    function onResponse(response) {
        if (!response.ok) { 
            console.log('Problema con la riposta'); 
            return null; 
        }
        return response.json();
    }
    
    function onError(error) { 
        console.log('Errore' + error); 
    }

    function onAlimenti(json){
        if (!json) {
            console.log('Nessun json ritornato');
            return;
        }
        console.log(json);

        if(json.length===0){
            $spanResult.textContent="Errore! Alimento non trovato.";
        } else {
            $spanResult.textContent="Kcal contenute in " + form.alimento.value + ": " + json[0]['energ_kcal'];    
        }
    }
}

