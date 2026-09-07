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