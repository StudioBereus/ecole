function calcul(){
    let res1= Number(document.getElementById("prixunt1").value)* Number(document.getElementById("qte1").value);
    let res2= Number(document.getElementById("prixunt2").value)* Number(document.getElementById("qte2").value);
    let total= Number(res1)+ Number(res2);
    document.querySelector("#prixtot1").value=res1;
    document.querySelector("#prixtot2").value=res2;
    document.querySelector("#total").value=total;
}
document.querySelector("#qte1").addEventListener("blur",calcul);
document.querySelector("#qte2").addEventListener("blur",calcul);