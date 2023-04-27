let email = document.getElementById("email");
let nome = document.getElementById("nome");

let btnForm = document.getElementById("btn-form");
btnForm.addEventListener("click", function(){
    if(email.value.length <= 0){
        alert("E-mail não pode ser vazio")
    }
    if(nome.value.length <= 0){
        alert("Nome não pode ser vazio")
    }
})   