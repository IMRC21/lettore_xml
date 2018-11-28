function aggiungi(){
    console.log("funzione aggiungi");
    
    incrementaNumeroEsportazioni = parseInt(document.getElementById("indice").value);
    incrementaNumeroEsportazioni++;
    //va rifatto perché usando il parseInt nella variabile abbiamo un numero e non un oggetto
    //document.getElementById("aggiungi-elementi").value = incrementaNumeroEsportazioni;
    //ho usato set attribute perché il .value non funzionava
    document.getElementById("indice").setAttribute("value",incrementaNumeroEsportazioni);
    //Comincio ad aggiungere gli elementi del form
    costruisciOutput =
        "<label class='testo'>Inserisci il tuo nome</label>" + 
        "<input type='text' name='nome" + incrementaNumeroEsportazioni + "'>" +
        "<label class='testo'>Inserisci il tuo cognome</label>" +
        "<input type='text' name='cognome" + incrementaNumeroEsportazioni + "'>" +
        "<label class='testo'>Inserisci il tuo codice fiscale</label>" +
        "<input type='text' name='cf"+ incrementaNumeroEsportazioni +"'>";
    stampa = document.getElementById("ilForm");
    stampa.innerHTML = stampa.innerHTML + costruisciOutput;
}
