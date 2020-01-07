var imgToDel = [];

$("#imageOfAnimal img").on("click",function(event){
    if($(this).hasClass("border-danger")){
        $(this).removeClass("border-danger");
        $(this).css("border","");
        var pos = imgToDel.indexOf(event.target.id);
        imgToDel.splice(pos,1);
    } else {
        $(this).addClass("border-danger");
        $(this).css("border","5px solid");
        imgToDel.push(event.target.id);
    }

    var listeImage ="";
    for(var i = 0; i < imgToDel.length;i++){
        listeImage += imgToDel[i];
        if(i < imgToDel.length-1) listeImage +="-";
    }

    $("#imgToDelete").val(listeImage);
});

$("#nbImage").on("keyup click", function(){
    var nbImage = $(this).val();
    var input="";
    for(var i=0; i < nbImage ; i++){
        input += "<input type='File' name='image"+i+"' id='image"+i+"' /> <br />";
    }
    $("#imageToAdd").html(input);
});
