//Fonction qui permet d'afficher le menu au format mobile
function burgerMenu() {
    let nav = document.getElementById("menu");
    nav.classList.toggle("toggle");
    document.getElementById("header-burger").classList.toggle("toggle");
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    document.body.classList.toggle("toggle");
}

//Script supprimant les notifications au bout de 10 secondes
setTimeout(function() {
    document.getElementsByClassName("error")[0].classList.add("hide");
}, 10000);

//Fonction pour mettre l'attribut 'selected' à l'item de la liste
function autoSelect(liste, find) {
    liste.forEach(i => {
        if (i.value === find) {
            i.selected = 'selected';
        }
    });
}