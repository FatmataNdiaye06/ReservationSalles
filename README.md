### ETAPES 1
Questions
1.​ Quel est le rôle de Composer ?
    Composer nous permet d'instaler des dependances externe, il nous permet aussi de gerer le chargement automatique des classes grâce au PSR-4 afin d'eviter les required.

2.​ Quelle différence existe entre require et require-dev ?
    require: contient des dependance importante pour le bon fonctionnement de l'application.
    require-dev: Importanat pour le developpement de l'application, les testet le debug

3.​ Pourquoi faut-il versionner composer.lock ?
    Il nous permet de s'assurer que tout l'equipe utilise les meme version de dependance en faisant composer install.

4.​ Pourquoi ne versionne-t-on pas vendor/ ?

Ce dossier contient des dependance qu'on peut retelecharger via la commande composer install en ce basant sur les fichiers composer.json et composer.lock.


### ETAPES 2

Questions
1.​ Quel rôle joue Capsule\Manager ?
    Il nous permet de securiser la connexion a la base de donnée

2.​ Pourquoi Eloquent peut-il fonctionner sans Laravel ?

3.​ Où doit se trouver le démarrage de l’ORM ?
    Dans config/database.php

4.​ Quelle différence existe entre ORM et SQL écrit à la main ?
    ORM: Plus evolutive, pas de requette sql
    SQL: risque d'injection SQL



### ETAPE 3

1.​ Quel type de relation Eloquent avez-vous utilisé ?
    hasMany dans salle et BelongsTo dans reservation
2.​ Pourquoi déclarer $fillable ou $guarded ?
    Pour controller les attibuts pour voir s'ils peuvent etre remplis par le client
3.​ Pourquoi convertir active en booléen ?
    Pour s'assurer que la valeur est un type booleen true ou false car d'habitude il retourne un 0 ou 1
4.​ Pourquoi convertir les dates en objets ?
    Pour pouvoir manipuler les champs  sous forme d'instances d'objet


### ETAPE 4

Questions
1.​ Quelle différence existe entre migration et seeder ?
    Les migration nous permet de creer les tables de base de donnee et les seeders de faires des insertions 
2.​ Pourquoi les données initiales doivent-elles être reproductibles ?
    Pour garantir que tous les devs ont les memes base de donnee
3.​ Comment empêcher les doublons ?
    En utilisant la methodes d'insertion de l'ORM firstOrCreate

### ETAPE 5

Questions
1.​ Pourquoi séparer la validation syntaxique des règles métier ?
    La validation syntaxique:Elle gere la validation des donnees.
    Les règles métier: Elles gerent la logique metier.(interoger BD)
2.​ Pourquoi créer une interface de validation ?
    Pour garantir in contrat commun pour tout les validateurs sur la methode vaidate()
3.​ Pourquoi le validateur ne doit-il pas enregistrer les données ?
    Pour ne pas violer le principe de responsablité unique
4.​ Comment retourner plusieurs erreurs en une seule fois ?
    En collectant les echecs dans un tableau, le NestedValidationException


### ETAPES 6

Questions
1.​ Quelle différence existe entre DTO et modèle Eloquent ?
    DTO il transporte les donnees valide 
    modèle Eloquent il est liée avec la base de donnée,les requettes sql.

2.​ Pourquoi le DTO ne doit-il pas appeler save() ?
    Parce que on respecte le principe de single responsablitie, sont role se limite a transporter les donnees.
3.​ À quel moment transforme-t-on les chaînes en dates ?
    au moment de l'instanciation du DTO.
4.​ Le DTO doit-il contenir la règle de chevauchement ?
    NON


### ETAPE 7

Questions
1.​ Eloquent constitue-t-il déjà un accès aux données ?
    Oui car il fait le lien entre nos table de base de donnee et nos objet php
2.​ Pourquoi ajouter un Repository au-dessus d’Eloquent ?
    Pour ne pas exposer le technologie utuliser au cas ou on nous demande de basculer sur un autre
3.​ Cette abstraction est-elle toujours nécessaire ?
    Pour des petites application non
4.​ Quel avantage apporte-t-elle ?
    Maintenable, possiblité de changer d'ORM sans modifier les servcices


### ETAPE 8

Questions
1.​ Pourquoi ces règles ne sont-elles pas dans le contrôleur ?
    Pour respecter le principe de Single Responsablité, le controleur a comme but de recevoir des requettes et retourner des reponses.

2.​ Pourquoi le service dépend-il d’une interface de Repository ?
    En dependant d'une interface et non d'une class. En respectant le principe de l'inversion de dépendances
    

3.​ Quelle exception doit être levée en cas de conflit?
    SalleIndisponibleException

4.​ Comment tester le service sans MySQL ?
    En utilisant les interfaces.
