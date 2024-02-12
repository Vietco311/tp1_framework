Create table compte (
    mail_compte VARCHAR(255) PRIMARY KEY NOT NULL,
    mdp_compte VARCHAR(255) NOT NULL,
    nom_compte VARCHAR(255),
    prenom_compte VARCHAR(255)
    );

    
    Create table blog (
    id_blog INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    mail_compte VARCHAR(255) NOT NULL,
    nom_blog VARCHAR(255) NOT NULL,
    url_blog VARCHAR(255) NOT NULL,
    couleur_blog VARCHAR(255) NOT NULL,
    couleur_separation_blog VARCHAR(255) NOT NULL,
    template_blog VARCHAR(255) NOT NULL,
    image_blog VARCHAR(255) NOT NULL,
    sujet_blog VARCHAR(255),
    FOREIGN KEY (mail_compte) REFERENCES compte(mail_compte)
    );
    

    Create table article (
    id_blog INT NOT NULL,
    id_article INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom_article VARCHAR(255) NOT NULL,
    date_article TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    auteur_article VARCHAR(255),
    contenu_article TEXT,
    image_article VARCHAR(255),
    FOREIGN KEY (id_blog) REFERENCES blog(id_blog)
    );
    
    Create table commentaire (
    id_commentaire INT AUTO_INCREMENT PRIMARY KEY,
    id_article INT NOT NULL,
    pseudo_commentaire VARCHAR(255) NOT NULL,
    contenu_commentaire TEXT NOT NULL,
    date_commentaire TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_article) REFERENCES article(id_article)
    );

    Create table commentaire_blog (
    id_commentaire_blog INT AUTO_INCREMENT PRIMARY KEY,
    id_blog INT NOT NULL,
    pseudo_commentaire_blog VARCHAR(255) NOT NULL,
    contenu_commentaire_blog TEXT NOT NULL,
    date_commentaire_blog TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_blog) REFERENCES blog(id_blog)
    );
    