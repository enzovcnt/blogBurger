<h1>Documentation en cours de rédaction</h1>

<div>
    <p>
        Tout d'abord tester si la route marche correctement et que l'on  tombe sur un template
        ensuite on peut créer l'entity et le repository > l
    </p>
    <p>
        Les attributs > permet de passer des données et de lier des fichiers
    </p>
    <p>
        Le App/controller > s'occupe de View > permet d'utiliser les données reçu par l'utilisateur pour ensuite
        les transmettre à la View > permet de naviguer entre les templates grâce aux routes.<br>
        Il reçoit en attribut une entité par défaut > il sait sur qu'elle entité agir
    </p>
    <p>
        l'App/Entity > reçoit en attribut le nom d'une table et un repository sur lequel l'entité
        va se lier > ce fichier permet de définir une entité pour utiliser les valeurs d'une base
        de donnée > ses propriétés doivent correspondre aux noms des colonnes de la table visée
    </p>
    <p>
        L'App/Repository > fichier qui permet de faire les requêtes SQL et notamment les
        requêtes non générale qui ne se repose pas uniquement sur l'id mais sur les autres
        colonnes. Les requêtes générales se trouve dans le Core/Repository qui lui est utilisé
        par l'App/Controller principalement
    </p>
</div>