# API de correction de texte

## Packages utilisés

- `symfony/maker-bundle` : uniquement en développement.
- `symfony/orm-pack`.
- `api`.

## Mise en route

Installer les dépendances :

```shell
composer install
```

Créer la base de données :

```shell
php bin/console doctrine:database:create
```

Mettre à jour la base de données :

```shell
php bin/console doctrine:schema:update --force
```

Démarrer le serveur :

```shell
symfony serve
```