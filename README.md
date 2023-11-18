 # projet ECF 
 ## GarageV.parrot
 
 ### Description:
Il s'agit d'un projet pour un garage auto , il vous permet de savoir les services qu'il fournit.
Ceux-ci incluent les services de réparation,
Vendre des voitures d'occasion

## Lien de la version en ligne
https://servicesgaragevparrot.fr/

## Technologies utilisées :
1. HTML5
2. CSS3
3. Bootstrap
4. JavaScript 
 

## Exigences
  * vs.code
  * symfony6
  * wamp64:  PHP 8.2/ MySQL 5.7/ Apache 2.4/ Maria DB 10
  * Composer

  
## Installation
  * Composer create-project Symfony/skeleton :"6.2. *" GarageV.Parrot 
  * composer require symfony/orm-pack --dev
  * composer require doctrine/doctrine-bundle --dev
  * php bin/console make:migration
  * php bin/console doctrine:migrations:migrate
  * php bin/console doctrine:fixtures:load
  * composer require knplabs/knp-paginator-bundle
  * composer require vich/uploader-bundle

