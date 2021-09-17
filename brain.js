let data;
function read(mit)
{
    fetch('./'+mit).then(response => {
        return response.json();
      }).then(data => {
        folytat(data);
        return adatok;
      }).catch(err => {
        return err;
      });
}
function init(){
    read('pizzak.JSON');
}
function folytat(adatok){
    tartalom = "";
    pizzak = document.getElementById("pizzak");
    try {
        console.log(adatok);
        if (typeof adatok ==='undefined')
        {
            throw Error("Az objektum típusa 'undefined'");
        }
        for (i = 0; i < adatok["pizzak"].length; i++){
            tartalom +=`<option value="${adatok["pizzak"][i]}">${adatok["pizzak"][i]}</option>`
        }
        pizzak.innerHTML = tartalom;
    } catch (e) {
        console.log(`Valami nincs rendben (${e})`)
    }
}
function urlap(){
    let ertek;
    checkers = document.querySelectorAll('input[name="p_meret"]');
    for (elem of checkers)
    {
        if (elem.checked)
        {
            ertek = elem.value;
        }
    }

    document.getElementById("body").innerHTML = `
    <h2>Összesítő</h2>
    <div class="urlap">
        <p>Név:</p>
        <p>${document.getElementById("nev").value}</p>
        <p>Cím:</p>
        <p>${document.getElementById("hely").value}</p>
        <p>E-mail</p>
        <p>${document.getElementById("email").value}</p>
        <p>Telefonszám</p>
        <p>${document.getElementById("tel").value}</p>
        <p>Pizza fajtája:</p>
        <p>${document.getElementById("pizza_fajta").value}</p>
        <p>Méret:</p>
        <p>${ertek} cm</p>
        <p>Laktózmentes feltét?</p>
        <p>${document.getElementById("lmentes").checked?"igen":"nem"}</p>
    </div>
    `;
}