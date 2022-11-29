var click = 0;

function Display(){
    if (click == 0){
        document.getElementById("modal-pfp").style.display = "inline";
        click += 1;
    } else {
        document.getElementById("modal-pfp").style.display = "none";
        click -= 1;
    }
}


function Postar(){
    if(click == 1){
        document.getElementById("modal-pfp").style.display = "none";
        click -= 1;
    }
    document.getElementById("modal-pub").style.display = "inline";
    document.getElementById("publicar").style.display = "inline";
}
function AbrirPostagem(){
    window.location.href = "https://www.google.com";
}

function ClosePostMenu(){
    document.getElementById("modal-pub").style.display = "none";
    document.getElementById("publicar").style.display = "none";
}

function Receita(){
    
}