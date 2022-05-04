function showLevel(){
    let opt=document.createElement("option");   
    opt.textContent="Min";
    opt.value="";
    document.getElementById("niveau_1").appendChild(opt);
    for(let i=0;i<8;i++){
        let option=new Option();
        option.value=i;
        option.textContent=i;
        document.getElementById("niveau_1").options[i+1]=option;
    }
}
showLevel();

function showLevel2(){
    let opt=document.createElement("option");   
    opt.textContent="Max";
    opt.value="";
    document.getElementById("niveau_2").appendChild(opt);
    for(let i=0;i<8;i++){
        let option=new Option();
        option.value=i;
        option.textContent=i;
        document.getElementById("niveau_2").options[i+1]=option;
    }
}
showLevel2();