function aggiungi(){
    var contenitore = document.getElementById("nuovo-el");
    contenitore.append("<h2> Inserisci il tuo nome </h2>");
    var inp = document.createElement("INPUT");
    var label_1 = document.createElement("p");
    var testoLabel_1 =document.createTextNode("Inserisci il nome del nuovo tag");
    label_1.appendChild(testoLabel_1);

    inp.setAttribute("type","text");
    inp.setAttribute("class", "nuovo-elemento");
    contenitore.appendChild(inp);

}