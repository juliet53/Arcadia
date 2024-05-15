
# Arcadia

Le projet consiste à développer une application web pour le zoo Arcadia, situé en Bretagne, France. L'objectif est de permettre aux visiteurs de visualiser les animaux, leur état de santé, ainsi que les services et horaires du zoo. L'application reflètera les valeurs écologiques du zoo, entièrement autonome en énergie.

## Deployment

 ###  Configuration de l'Environnement

PHP 8.2 

Symfony CLI

Symfony 

mySQL

MongoDB

###  Cloner le dépot git 
Un dépot git public est associé au projet Arcadia. Pour le cloner en local, exécuter la commande :

```bash
git clone https://github.com/juliet53/Arcadia.git

````

###  Configurer les variables d'environnement
Dans le fichier .env.local , ajouter les variables d'environnement:
DATABASE_URL="mysql://root:@127.0.0.1:3306/arcadia2024?serverVersion=8.0.32&charset=utf8mb4"

```bash
DATABASE_URL="mysql://root:@127.0.0.1:3306/arcadia2024?serverVersion=8.0.32&charset=utf8mb4"
MONGODB_URL=mongodb://localhost:27017
MAILER_DSN= voir copie 
````



###  Installer les dépendances du projet
Installer les dépendances:

```bash
composer install

````
###  Installer la base de donnée

Créer la base de donneés:

Le projet possede un fichier database.sql permettant de créer et remplir la base de données:

Connectez-vous a mysql:

```bash
mysql -u \votreUsername\ -p\votrePassword\
````


Utilisez le fichier database.sql:


```bash
source database.sql;

````


Une fois terminé, quittez MySQL :

```bash
exit;

````





