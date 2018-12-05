function creerCookie(nom,valeur,jour){
    //Si les jours ont bien été définis
    if (jour){
        //On crée un objet date stockant la date actuelle
        var date = new Date();
        /*On définit la date d'expiration du cookie -
         *Pour cela, on calcule dans combien de millisecondes
         *le cookie va expirer et on utilise setTime()*/
        date.setTime(date.getTime()+(jour*24*60*60*1000));
        //On met la date au "bon" format pour un cookie
        var exp = '; expires='+date.toGMTString();
    }
    //Si les jours n'ont pas été définis, pas besoin de calcul
    else var exp = '';
    document.cookie = nom+'='+valeur+exp+'; path=/';
}

function lireCookie(nom){
    //On récupère le nom du cookie et le signe "="
    var nomEtEgal = nom + '=';
    //Récupère tous les cookies dans un tableau
    var cTableau = document.cookie.split(';');
    //Parcourt le tableau créé
    for(var i=0;i<cTableau.length;i++){
        //On récupère tous les noms et valeurs des cookies
        var c = cTableau[i];
        /*On supprime les espaces potentiels contenus dans c jusqu'à
         *tomber sur le nom d'un cookie*/
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        /*Maintenant, on cherche le nom correspondant au cookie voulu.
         *Dès qu'on l'a trouvé, on n'a plus qu'à récupérer la valeur
         *correspondante qui se situe juste après le nom*/
        if (c.indexOf(nomEtEgal) == 0) return c.substring(nomEtEgal.length,c.length);
    }
    //Si nous n'avons pas trouvé le nom du cookie, c'est qu'il n'existe pas
    return null;
}

function supprimerCookie(nom){
    /*On donne le nom du cookie à supprimer, puis on utilise creerCookie()
     *pour indiquer une date d'expiration passée pour notre cookie*/
    return creerCookie(nom,'',-1);
}

function pop_up(id)
{
    if (lireCookie("Cookie"+id) === null){
        var value = alert("Confidentialité et cookies : ce site utilise des cookies. En continuant à naviguer sur ce site, vous acceptez que nous en utilisions.");

        if (!value)
        {

            return creerCookie('Cookie'+id,'Je suis le cookie numero '+id, 90);
        }
    }

    else {
        return null;
    }

}


