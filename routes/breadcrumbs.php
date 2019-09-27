<?php



Breadcrumbs::for('home', function ($trail) {
    $trail->push('Administration', route('home'));
});

Breadcrumbs::for('region.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Régions', route('region.list'));
});
Breadcrumbs::for('region.edit', function ($trail, $id) {
    $trail->parent('region.list');
    $trail->push('Modifier une région', route('region.edit', $id));
});


Breadcrumbs::for('indication.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Indications', route('indication.list'));
});
Breadcrumbs::for('indication.edit', function ($trail) {
    $trail->parent('indication.list');
    $trail->push('Modification d\'une indication', route('indication.edit'));
});

Breadcrumbs::for('composant.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Composants', route('composant.list'));
});
Breadcrumbs::for('composant.edit', function ($trail) {
    $trail->parent('composant.list');
    $trail->push('Modification d\'un composant', route('composant.edit'));
});

Breadcrumbs::for('produit.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Produits', route('produit.list'));
});
Breadcrumbs::for('produit.create', function ($trail) {
    $trail->parent('produit.list');
    $trail->push('Ajout de produit', route('produit.create'));
});
Breadcrumbs::for('produit.edit', function ($trail, $id) {
    $trail->parent('produit.list');
    $trail->push('Modification de produit', route('produit.edit', $id));
});


Breadcrumbs::for('delegue.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Délégués', route('delegue.list'));
});
Breadcrumbs::for('delegue.create', function ($trail) {
    $trail->parent('delegue.list');
    $trail->push('Ajout d\'un délégué', route('delegue.create'));
});
Breadcrumbs::for('delegue.edit', function ($trail, $id) {
    $trail->parent('delegue.list');
    $trail->push('Modification d\'un délégué', route('delegue.edit', $id));
});


Breadcrumbs::for('praticien.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Praticiens', route('praticien.list'));
});
Breadcrumbs::for('praticien.create', function ($trail) {
    $trail->parent('praticien.list');
    $trail->push('Ajout d\'un praticien', route('praticien.create'));
});
Breadcrumbs::for('praticien.edit', function ($trail, $id) {
    $trail->parent('praticien.list');
    $trail->push('Modification d\'un praticien', route('praticien.edit', $id));
});


Breadcrumbs::for('visiteur.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Visiteur médicaux', route('visiteur.list'));
});
Breadcrumbs::for('visiteur.create', function ($trail) {
    $trail->parent('visiteur.list');
    $trail->push('Ajout d\'un visiteur médical', route('visiteur.create'));
});
Breadcrumbs::for('visiteur.edit', function ($trail, $id) {
    $trail->parent('visiteur.list');
    $trail->push('Modification d\'un visiteur médical', route('visiteur.edit', $id));
});


Breadcrumbs::for('activite.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Activités', route('activite.list'));
});
Breadcrumbs::for('activite.create', function ($trail) {
    $trail->parent('activite.list');
    $trail->push('Ajout d\'une activité', route('activite.create'));
});
Breadcrumbs::for('activite.edit', function ($trail, $id) {
    $trail->parent('activite.list');
    $trail->push('Modification d\'une activité', route('activite.edit', $id));
});
Breadcrumbs::for('activite.item', function ($trail, $id) {
    $trail->parent('activite.list');
    $trail->push('Visualisation d\'une activité', route('activite.item', $id));
});


Breadcrumbs::for('visite.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Visites', route('visite.list'));
});
Breadcrumbs::for('visite.create', function ($trail) {
    $trail->parent('visite.list');
    $trail->push('Ajout d\'une visite', route('visite.create'));
});
Breadcrumbs::for('visite.edit', function ($trail, $id) {
    $trail->parent('visite.list');
    $trail->push('Modification d\'une visite', route('visite.edit', $id));
});
Breadcrumbs::for('visite.item', function ($trail, $id) {
    $trail->parent('visite.list');
    $trail->push('Visualisation d\'une visite', route('visite.item', $id));
});
