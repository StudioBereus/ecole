function Departement(){
    let opt=document.createElement("option");   
    opt.textContent="Departement";
    opt.value="";
    document.getElementById("dep").appendChild(opt);
    for(let i=1;i<96;i++){
        let option=new Option();
        option.textContent=i;
        document.getElementById("dep").options[i+1]=option;
    }
}
Departement();