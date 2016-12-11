pokemon-go
==========

Faire un composer update

Créer une base de donnée config dans App/config/parameter.yml
faire les commandes dans une console : 

php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force

A changer obligé : ressources/fictures/user.yml
		   metter en un ou deux, changer tous si on a les meme on se fait cramass obligé


php bin/console doctrine:fixtures:load



d'ici : Modifier bien les noms de fonctions, de variable, la structure du code au possible
ce serai con de ce faire cramer si on a tous les meme bails :)

### pour lancer lappli
php bin/console server:run

### vérifier que tous marche :

tu vas sur ton localhost a l'adresse : find/1, renvoie un tableau en json avec un user associcier
tu fais capture/1 : renvoie que le pokemon est capturer
tu fais pokedex/1 : renvoie que les pokemons du user 1

