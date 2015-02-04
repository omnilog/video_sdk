Sdk Video
========================

Ce projet permet d'abstraire toute la complexité de l'API Lequipe dans les projet PHP où elle est utilisée.


1) Récupération des sources
----------------------------------

Vous devez tout d'abord récupérer les sources du sdk en clonant celui ci dans un repertoire de destination

git clone https://github.com/omnilog/video_sdk.git chemin/repertoire/destination


2) Installation via composer
----------------------------------

Vous deveez ensuite installez les dépendances via composer.

Pour une installation en **ENVIRONNEMENT DE DEVELOPPEMENT** uniquement :

php composer.phar install

Pour tout autre environnement :

php composer.phar install --no-dev


3) Utilisation du sdk
----------------------------------

Pour l'utiliser dans un projet PHP, il suffit d'ajouter le projet en tant que dépendance composer.

exemple :

```
 {
      "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/omnilog/video_sdk.git"
        }
    ],
     "require": {
        "php": ">=5.3.0",
        "omnilog/video-sdk": "0.*"
    }
 }
```

Vous pourrez ensuite instancier la factory et accéder ainsi à l'ensemble de ses méthodes.


Voici un exemple d'utilisation dans un projet tierce:

```
require_once __DIR__ . '/../vendor/autoload.php';

$videoSvc = new \Lequipe\LequipeFactory('url_ws', 'monlogin', 'monpassword', 'monformat');

try {
    $videosLast = $videoSvc->getVideoService()->getLastVideo();
} catch (\Lequipe\Exception\ApiException $e) {
    echo $e->getCode() . ' - ' .$e->getMessage();
}
```