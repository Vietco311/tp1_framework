Create table compte (
    mail_compte VARCHAR(255) PRIMARY KEY NOT NULL,
    mdp_compte VARCHAR(255) NOT NULL,
    nom_compte VARCHAR(255),
    prenom_compte VARCHAR(255)
    );

    Create table param_image_blog (
    param_image_blog_id INT PRIMARY KEY,
    param_image_blog_url VARCHAR(255) NOT NULL,
    param_image_blog_x INT NOT NULL,
    param_image_blog_y INT NOT NULL
);

    
Create table blog (
    id_blog INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    mail_compte VARCHAR(255) NOT NULL,
    nom_blog VARCHAR(255) NOT NULL,
    url_blog VARCHAR(255)  UNIQUE,
    couleur_blog VARCHAR(255) NOT NULL,
    couleur_separation_blog VARCHAR(255) NOT NULL,
    taille_separation_blog VARCHAR(255) NOT NULL,
    template_blog VARCHAR(255) NOT NULL,
    image_blog VARCHAR(255),
    param_image_blog_id INT,
    couleur_titre_blog VARCHAR(255),
    police_titre_blog VARCHAR(255) NOT NULL,
    sujet_blog VARCHAR(255),
    FOREIGN KEY (mail_compte) REFERENCES compte(mail_compte),
    FOREIGN KEY (param_image_blog_id) REFERENCES param_image_blog(param_image_blog_id)
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
    etat_commentaire BOOLEAN DEFAULT TRUE,
    date_commentaire TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_article) REFERENCES article(id_article)
    );

Create table commentaire_blog (
    id_commentaire_blog INT AUTO_INCREMENT PRIMARY KEY,
    id_blog INT NOT NULL,
    pseudo_commentaire_blog VARCHAR(255) NOT NULL,
    contenu_commentaire_blog TEXT NOT NULL,
    etat_commentaire_blog BOOLEAN DEFAULT TRUE,
    date_commentaire_blog TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_blog) REFERENCES blog(id_blog)
    );


    
INSERT INTO param_image_blog (param_image_blog_id, param_image_blog_url, param_image_blog_x, param_image_blog_y) VALUES (0, 'banniere.png', 540, 405);
INSERT INTO param_image_blog (param_image_blog_id, param_image_blog_url, param_image_blog_x, param_image_blog_y) VALUES (1, 'parchemin.png', 598, 640);
INSERT INTO param_image_blog (param_image_blog_id, param_image_blog_url, param_image_blog_x, param_image_blog_y) VALUES (2, 'bulle.png', 640, 320);