const catTitle = document.querySelector(".heading-secondary").classList;
const filme = document.querySelector(".menufilme").classList;
const serie = document.querySelector(".menuserie").classList;
const documentario = document.querySelector(".menudocumentario").classList;
const ifilme = document.querySelector(".iconfilme").classList;
const iserie = document.querySelector(".iconserie").classList;
const idocumentario = document.querySelector(".icondocumentario").classList;
const activeCat = document.querySelector(".activeMenu");

if(catTitle){

if (catTitle.contains("filme")){
    filme.add("activeMenu");
    ifilme.add("activeIcon");
    console.log(filme);
} 

if (catTitle.contains("serie")){
    serie.add("activeMenu");
    iserie.add("activeIcon");
    console.log(serie);
    }

if (catTitle.contains("documentario")){
    documentario.add("activeMenu");
    idocumentario.add("activeIcon");
    console.log(documentario);
    }
if(activeCat)    {
activeMenu = document.querySelector(".activeMenu").style.color='red';
activeIcon = document.querySelector(".activeIcon").style.color='red';
}

}
    








 