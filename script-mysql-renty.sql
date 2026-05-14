create database rentymaroquinerie;
use rentymaroquinerie;

create table genre(
    id_genre int primary key auto_increment,
    nom_genre varchar(10) not null
);
insert into genre (nom_genre) values 
    ('Femme'),
    ('Homme');

create table pays(
    id_pays int primary key auto_increment,
    nom_pays varchar(50) not null
);
insert into pays (nom_pays) values 
    ('Madagascar'),
    ('La Reunion'),
    ('Maurice'),
    ('Comores'),
    ('Seychelles');

create table utilisateur(
    id_utilisateur int primary key auto_increment,
    nom varchar(155) not null,
    prenom varchar(155) not null,
    id_genre int not null,
    email varchar(40) not null,
    photo varchar(255) not null,
    date_crea datetime default current_timestamp,
    mot_de_passe varchar(40) not null,
    contact varchar(13) not null,
    id_pays int not null,
    adresse varchar(155),
    admin boolean default FALSE,
    foreign key (id_genre) references genre(id_genre),
    foreign key (id_pays) references pays(id_pays)
);
INSERT INTO utilisateur (nom, prenom, id_genre, email, photo, mot_de_passe, contact, id_pays, adresse, admin) VALUES
('Ranaivo', 'Marie', 1, 'marie.ranaivo@example.com', 'default-user.jpg', '1234', '0321234567', 1, 'Antananarivo', FALSE),
('Rakoto', 'Sophie', 1, 'sophie.rakoto@example.com', 'default-user.jpg', '1234', '0321234568', 1, 'Antananarivo', FALSE),
('Rabe', 'Annie', 1, 'annie.rabe@example.com', 'default-user.jpg', '1234', '0321234569', 1, 'Toamasina', FALSE),
('Randria', 'Lalao', 1, 'lalao.randria@example.com', 'default-user.jpg', '1234', '0321234570', 1, 'Fianarantsoa', FALSE),
('Razafindrakoto', 'Miora', 1, 'miora.razafindrakoto@example.com', 'default-user.jpg', '1234', '0321234571', 1, 'Mahajanga', FALSE);

CREATE VIEW utilisateur_genre_pays_view AS
SELECT
    u.id_utilisateur,
    u.nom,
    u.prenom,
    u.id_genre,
    u.nom_genre,
    u.email,
    u.photo,
    u.date_crea,
    u.mot_de_passe,
    u.contact,
    u.id_pays,
    p.nom_pays,
    u.adresse,
    u.admin
FROM
    utilisateur_genre_view u
JOIN
    pays p ON u.id_pays = p.id_pays;

INSERT INTO utilisateur (nom, prenom, id_genre, email, photo, mot_de_passe, contact, id_pays, adresse, admin) VALUES
    ('Renty', 'Administrateur', 2, 'admin@renty.mg', 'default-admin.jpg', '1234', '+0202225665', 1, 'Antananarivo Madagascar', TRUE);

create table collection(
    id_collection int primary key auto_increment,
    nom_collection varchar(55) not null,
    photo varchar(255) not null,
    date_crea date not null,
    description_collection varchar(2000) not null
);

create table article(
    id_article int primary key auto_increment,
    nom_article varchar(55) not null,
    description_article varchar(2000) not null,
    prix float not null,
    date_crea date not null,
    photo varchar(255) not null,
    dimensions json not null,
    matieres json not null,
    id_collection int not null,
    foreign key (id_collection) references collection(id_collection)
);

CREATE VIEW collection_article_view AS
SELECT 
    a.id_article,
    a.nom_article,
    a.description_article,
    a.prix,
    a.date_crea AS article_date_crea,
    a.photo AS article_photo,
    a.dimensions,
    a.matieres,
    c.id_collection,
    c.nom_collection,
    c.photo AS collection_photo,
    c.date_crea AS collection_date_crea,
    c.description_collection
FROM 
    article a
JOIN 
    collection c ON a.id_collection = c.id_collection;

create table gallerie(
    id_gallerie int primary key auto_increment,
    id_article int not null,
    photo varchar(255) not null,
    usage_recommande json not null,
    foreign key (id_article) references article(id_article)
);

CREATE VIEW gallerie_article_view AS
SELECT
    g.id_gallerie,
    g.id_article AS gallerie_id_article,
    g.photo AS gallerie_photo,
    g.usage_recommande,
    ca.id_collection,
    ca.nom_collection,
    ca.collection_photo,
    ca.collection_date_crea,
    ca.description_collection,
    ca.id_article AS article_id_article,
    ca.nom_article,
    ca.description_article,
    ca.prix,
    ca.article_date_crea,
    ca.article_photo,
    ca.dimensions,
    ca.matieres
FROM
    gallerie g
JOIN
    collection_article_view ca ON g.id_article = ca.id_article;

create table feedback(
    id_feedback int primary key auto_increment,
    id_utilisateur int not null,
    date_crea datetime default current_timestamp,
    commentaire varchar(2000) not null,
    foreign key (id_utilisateur) references utilisateur(id_utilisateur)
);
CREATE OR REPLACE VIEW utilisateur_feedback_view AS
SELECT
    u.id_utilisateur,
    u.nom,
    u.prenom,
    u.id_genre,
    u.email,
    u.photo,
    u.date_crea AS utilisateur_date_crea,
    u.mot_de_passe,
    u.contact,
    u.id_pays,
    u.adresse,
    u.admin,
    f.id_feedback,
    f.date_crea AS feedback_date_crea,
    f.commentaire
FROM
    utilisateur u
JOIN
    feedback f ON u.id_utilisateur = f.id_utilisateur;
INSERT INTO feedback (id_utilisateur, commentaire) VALUES
((SELECT id_utilisateur FROM utilisateur WHERE email = 'marie.ranaivo@example.com'), 'Très satisfait de la qualité des produits.'),
((SELECT id_utilisateur FROM utilisateur WHERE email = 'sophie.rakoto@example.com'), 'Service client excellent et produits conformes.'),
((SELECT id_utilisateur FROM utilisateur WHERE email = 'annie.rabe@example.com'), 'Livraison rapide et produits bien emballés.'),
((SELECT id_utilisateur FROM utilisateur WHERE email = 'lalao.randria@example.com'), 'Bonne expérience d achat, je recommande !'),
((SELECT id_utilisateur FROM utilisateur WHERE email = 'miora.razafindrakoto@example.com'), 'Les produits sont de très bonne qualité.');

create table enregistrement(
    id_enregistrement int primary key auto_increment,
    id_utilisateur int not null,
    id_gallerie int not null,
    foreign key (id_utilisateur) references utilisateur(id_utilisateur),
    foreign key (id_gallerie) references gallerie(id_gallerie)
);
CREATE VIEW vue_enregistrement_gallerie AS
SELECT
    e.id_enregistrement,
    e.id_utilisateur,
    e.id_gallerie,
    g.id_article,
    g.photo,
    g.usage_recommande
FROM
    enregistrement e
JOIN
    gallerie g ON e.id_gallerie = g.id_gallerie;
