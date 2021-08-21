document.addEventListener('contextmenu', function(event){
    event.preventDefault();
    alert("right click is disabled");
});
function showpass(){
    var x = document.forms["form"]["Cpassword"];
    var y = document.getElementById("check");
    var z = document.getElementById("check1");
    if (x.type === "password") {
        x.type = "text";
        z.style.display="inline";
        y.style.display="none";
    } else {
        x.type = "password";
        y.style.display="inline";
        z.style.display="none";
        
    }
};