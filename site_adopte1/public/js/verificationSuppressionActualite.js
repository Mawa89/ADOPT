var btnSup = document.querySelector("#btnSup");

btnSup.addEventListener("click",function(){
    event.preventDefault();
    var idActualite = document.querySelector("#actualites").value;
    var libelleActualite = document.querySelector("#titreActu").value;
    if(confirm("Voulez-vous supprimer l'actualité "+idActualite+" - "+ libelleActualite+ " ?")){
        document.location.href = "genererNewsAdminSup&sup="+idActualite;
    }
});