function showYear(){
    let opt=document.createElement("option"); 
    opt.textContent="Année";
    opt.value="";
    document.getElementById("annee").appendChild(opt);
    for(let i=1919;i<2004;i++){
        let option=new Option();
        option.textContent=i;
        document.getElementById("annee").options[i-1918]=option;
    }
}
showYear();

function showDay(){
    let opt1=document.createElement("option"); 
    opt1.textContent="Jour";
    opt1.value="";
    document.getElementById("jour").appendChild(opt1);
    for(let i=1;i<32;i++){
        let option=new Option();
        option.textContent=i;
        document.getElementById("jour").options[i]=option;
    }
}
showDay();

function showLevel(){
    let opt=document.createElement("option");   
    opt.textContent="Niveau";
    opt.value="";
    document.getElementById("niveau").appendChild(opt);
    for(let i=0;i<8;i++){
        let option=new Option();
        option.textContent=i;
        document.getElementById("niveau").options[i+1]=option;
    }
}
showLevel();

var tabMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
function showMonth(){
    let opt2 = document.createElement("option");
    opt2.textContent = "Mois";
    opt2.value = "";
    document.querySelector("#mois").appendChild(opt2);
    for (let i = 0; i < 12; i++) {
        let monOpt = new Option();
        monOpt.textContent = tabMois[i];
        monOpt.value = i + 1;
        document.querySelector("#mois").appendChild(monOpt);
    }
}
showMonth();


