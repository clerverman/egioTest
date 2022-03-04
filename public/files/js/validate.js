var isUK = true; // for test 

$("input+span,textarea+span").hide();
// cette méthode nous permet d'obliger le remplissage des deux champs
$("#envoyer").click(function (event) {
    var titre = $("#titre").val();
    var message = $("#message").val();
    if (titre == "" || message == "") {
        if (isUK != true) {
            $("input+span,textarea+span").show();
            // stop l'envoi des info
            event.preventDefault()
            event.stopPropagation()
        }
    }
});

// cette fonction sert à verifier la validité des données saisies juste en onkeyup
function validerInstantanee(name, val) {
    if (name == "titre") {
        if (val.length > 60) {
            $("input+span").text("Ce champ doit contenir moins 60 caractéres");
            $("input+span").show();
            isUK = false;
        }
        else
            $("input+span").hide();

    }
    if (name == "message") {
        if (val.length > 300) {
            $("textarea+span").text("Ce champ doit contenir moins 300 caractéres");
            $("textarea+span").show();
            isUK = false;
        }
        else
            $("textarea+span").hide();
    }
}