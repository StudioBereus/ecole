function showYear(){
    let option=document.createElement("option");
    option.textContent="année";
    option.value="";
    document.getElementById("annee").appendChild(opt);
    for(let i=1919;i<=2003;i++){
        let cont = new Option();
        cont.textContent=i;
        cont.value=i;
        document.getElementById("annee").options[i-1918]=cont;
    }
}
showYear();

var astroSign=["Capricorne","Verseau", "Poisson","Belier","Taureau","Gémeaux","Cancer","Vierge","Balance","Scorpion","Sagittaire"];
var months=["Janvier", "Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];

function showMonth(){
    let opt=document.createElement("option");
    opt.textContent="mois";
    opt.value="";
    document.querySelector("#mois").appendChild(opt);
    for(let i=0;i<12;i++){
        let option=new Option();
        option.textContent=months[i];
        option.value=i+1;
        document.querySelector("#mois").appendChild(opt);
    }
}
showMonth();