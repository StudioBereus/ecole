objDate=new Date();
let jour= (objDate.getDate()<10)?"0"+objDate.getDate():objDate.getDate();
let mois=(objDate.getMonth()+1<10)?"0"+(objDate.getMonth()+1):(objDate.getMonth()+1) ;
let annee=objDate.getFullYear();
let chaineDate=jour+"/"+mois+"/"+annee;
let btn_date=document.getElementById("renvDate");
btn_date.addEventListener("click", function(){
    document.getElementById("zoneDate").value=chaineDate;
});

function renvHeure(){
    objHeure=new Date();
    let heure=objHeure.getHours();
    let minutes=objHeure.getMinutes();
    let secondes=objHeure.getSeconds();
    let chaineHeure=heure+" : "+minutes+" : "+secondes;
    document.getElementById("zoneHeure").value=chaineHeure;
    setInterval(renvHeure,1000);
};




btn_heure=document.getElementById("renvHeure");

btn_heure.addEventListener("click", function(){
    renvHeure();
});
    



