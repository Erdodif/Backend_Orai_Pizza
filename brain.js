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
            tartalom +=`<option value="${adatok["pizzak"][i]}"></option>`
        }
        pizzak.innerHTML = tartalom;
    } catch (e) {
        console.log(`Valami nincs rendben (${e})`)
    }
}