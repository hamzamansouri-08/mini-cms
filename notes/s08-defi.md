# Session 08 - Défi

La route posts.tag utilise {tag:slug} : oui

La page d'un tag n'affiche ni brouillon ni article d'un autre tag : oui

Les tags des cartes sont des liens : oui

L'accueil n'affiche que les tags qui ont au moins un article publié : oui

Les trois nouveaux tests passent et php artisan test est vert : oui

Pourquoi filtrer les tags vides après get() plutôt que d'afficher (0) ?

Les tags sans article publié n'apportent pas de contenu utile à la navigation.

Combien de requêtes ajoute la liste des tags populaires, et pourquoi pas une par tag ?

withCount ajoute une sous-requête au chargement des tags, donc les comptes sont calculés ensemble.
