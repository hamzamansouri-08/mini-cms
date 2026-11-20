# Session 11 - Défi

/mes-articles ne montre que mes articles, brouillons compris : oui
Un visiteur qui ouvre /mes-articles arrive sur /connexion : oui
Le cookie remember_web_ apparaît quand la case est cochée : oui
Les deux nouveaux tests passent et php artisan test est vert : oui

Pourquoi partir de $request->user()->posts() plutôt que de Post::where('user_id', $request->user()->id) ?

La relation porte déjà la bonne condition à partir de l'utilisateur authentifié. Elle rend impossible l'utilisation directe d'un autre identifiant fourni par la requête.

Pourquoi la case remember ne doit-elle pas être dans le tableau passé à Auth::attempt() ?

Auth::attempt() cherche dans la table users toutes les clés autres que le mot de passe. La case remember n'a pas de colonne correspondante ; elle doit donc rester un argument booléen séparé.
