function menu(id) {
    var x = document.getElementById("menu");
    var y = document.getElementById("back");
    var z = document.getElementById("sidebar");
    if (id === x){
        x.style.display="none";
        y.style.display="block";
        z.style.display="block";
    }
    else{
        x.style.display="block";
        y.style.display="none";
        z.style.display="none";
    }
}
var t="welcome";
function sidebarclose() {
    if(document.getElementById("sidebar").style.display==="block"){
        menu(document.getElementById("back"));
    }
}
function welcome(id) {
    var z = document.getElementById("sidebar");
    document.getElementById(id).style.display="none";
    document.getElementById("welcome").style.display="flex";
    t="welcome";
    if(z.style.display==="block"){
        menu(document.getElementById("back"));
    }
}
function Change(id) {
    var x=document.getElementById(id);
    document.getElementById(t).style.display="none";
    if(x.style.display==="block"){
        alert("You're Already in "+id)
    }
    else{
        x.style.display="block";
        t=id;
    }
    menu(document.getElementById("back"));
}
function TChange(t) {
    var x=document.getElementById("CTeam");
    var y=document.getElementById("MTeam");
    var z=document.getElementById("ITeam");
    if(t==0){
        y.style.display="none";
        x.style.display="block";
    }
    if(t==1){
        x.style.display="none";
        y.style.display="block";
    }
}
function PChange(t) {
    var x=document.getElementById("CPoll");
    var y=document.getElementById("MPoll");
    if(t==0){
        y.style.display="none";
        x.style.display="block";
    }
    if(t==1){
        x.style.display="none";
        y.style.display="block";
    }
}
