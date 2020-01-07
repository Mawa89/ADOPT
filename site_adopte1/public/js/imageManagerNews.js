var lastClickedImage;
var urlImageClicked;
var idImageClicked;

$("#multimedia").on("click",function(event){
    event.preventDefault();
    $("#imageManager").toggleClass("d-none");
    $("#imageActu").val("");
});

$("#imageActu").on("click",function(event){
    urlImageClicked="";
    idImageClicked="";
    $("#imageManager").addClass("d-none");
    $("#resultat").html("");

    if(lastClickedImage!==null){
        $(lastClickedImage).addClass("border");
        $(lastClickedImage).addClass("border-dark");
        $(lastClickedImage).removeClass("border-success");
        $(lastClickedImage).css("border","");
    }
    lastClickedImage="";
});

$("#imageManager img").on("click", function(event){
    var parentClicked = event.target.parentElement;

    if(lastClickedImage!==null){
        $(lastClickedImage).addClass("border");
        $(lastClickedImage).addClass("border-dark");
        $(lastClickedImage).removeClass("border-success");
        $(lastClickedImage).css("border","");
    }

    if($(parentClicked).hasClass("border-dark")){
        $(parentClicked).removeClass("border");
        $(parentClicked).removeClass("border-dark");
        $(parentClicked).addClass("border-success");
        $(parentClicked).css("border","5px solid");
    }
    lastClickedImage=parentClicked;
    urlImageClicked = $(event.target).attr("src");
    idImageClicked = event.target.parentElement.id;
});

$("#validationImage").on("click",function(event){
    event.preventDefault();
    $("#imageManager").toggleClass("d-none");
    var balise ="<img src='"+urlImageClicked+"' style='width:100px' />";
    balise += "<input type='hidden' name='imageMultimedia' value='"+idImageClicked+"' />";
    $("#resultat").html(balise);
});

