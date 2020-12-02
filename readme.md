# LibraryAPI

Cette API est créée en **PHP** en relation avec **une base MySQL**. Son contenu pourra être accessible par le biais de **n'importe quel client REST**.

L'objectif sera de répertorier des livres et leur information, puis d'accéder, de modifier ou de supprimer des informations les concernant.

### Accès aux fichiers et à l'API 
Afin d'y accéder, il faudra se rendre sur le git et télécharger les fichiers du projet. Une fois effectué, vous obtiendrez le dossier **library-master**. Pour accéder au contenu de l'API, j'utiliserai **wampserver**.
Il faudra placer le dossier contenant le projet au sein du dossier de configuration wamp, et plus précisément dans le dossier **www**.

Une fois placé, il faudra effectuer un clic gauche sur l'icone de wampserver depuis votre barre de tâche et sélectionnez **PhpMyAdmin** pour gérer la base de donnée.
Vous pourrez vous connecter à cette base local grâce à l'identifiant **"root"** et en **laissant le champ de mot de passe vide**. Si jamais les identifiés ont été modifiés, n'hésitez pas à rentrer ces identifiants.

Par la suite, il vous faudra créer une nouvelle base de donnée qui se nommera **libraryAPI**. Vous vous rendrez ensuite sur **l'onglet SQL**, et **collerez puis executerez cette commande** afin de créer la table les lignes nécessaires à l'execution de l'API :
        
        CREATE TABLE IF NOT EXISTS `books` (
        `isbn` text NOT NULL,
        `name` text NOT NULL,
        `author` text NOT NULL,
        `release_date` int(10) NOT NULL
        );

Cela vous permettra de créer des objets livres qui contiennent les éléments suivants : 

> - Un Numéro international normalisé du livre (isbn)  
> - Le nom du livre  
> - Son auteur  
> - Sa date de sortie

Assurez-vous aussi que le module **rewrite_module** soit activé dans les options d'apache accessibles depuis un clic gauche sur l'icone de wamp dans la barre de tâche.

### Execution de l'API

Pour pouvoir utiliser l'API, il vous faudra utiliser le lien suivant (si vous avez suivi la méthode d'installation que j'ai pu fournir) afin d'accéder aux différents services : http://127.0.0.1/library-master/books. Ne manquez pas de remplacer "library-master" par le nom du dossier contenant le projet pour que cela fonctionne.

Vous aurez accès aux services suivant : 

        GET /books -> Liste de livres  
        GET /books/:isbn -> Un livre en particulier  
        POST /books -> Création d'un livre  
        POST /books/:isbn -> Mise à jour d'un livre  
        DELETE /books/:isbn -> Suppression d'un livre

