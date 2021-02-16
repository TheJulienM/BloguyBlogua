# BloguyBlogua
# CMS réalisé dans le cadre de ma première année à l'EPSI. Le design est fait maison et est vraiment incroyable. Le Back-end est fonctionnel mais obsolète. 
# En collaboration avec Corentin NIGON


Passer en root : su root

Pour les importations, pensez à désactiver la synchronisation automatique et donc à upload les fichiers manuellement (par exemple avec netbeans), sinon, les fichiers notamment les photos ne pourront pas être remplacées dans le blog.


importer le dossier Blog dans votre serveur (ex: /var/www/html)

Déplacer le fichier blog.sql dans le répertoire mysql (ex: /var/lib/mysql) : mv <répertoire du fichier> <répertoire destination>

ouvrir mysql : mysql
créer une base de données: CREATE DATABASE <nom_base_que_vous_souhaitez>; (dans le fichier config.php, son nom est blog).
utiliser la base créée : use <nom_base_que_vous_souhaitez>;
importer les données des tables blog.sql : source /var/lib/mysql/blog.sql

Modifier le fichier config.php et mettez-le au paramètre de votre serveur : 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '<username>');
define('DB_PASSWORD', '<password>');
define('DB_NAME', 'blog')




Changer les droits du dossier photo sinon les photos ne pourront pas être importé (chmod -R 757 photo)

puis ouvrez votre navigateur et rentrez : localhost(ou votre adresse serveur ex: 127.0.0.1:8080) /var/www/html/bloguy_blogua_final/login.php ( en fonction d'ou le dossier blog a été placé).

L'administrateur est le seul compte qui peut modifier le blog. Les autres ne peuvent que le consulter. 
Le nom de l'administrateur est "admin" et son mot de passe est "adminadmin" mais il est possible de modifier ce dernier dans la page du blog une fois connectée.



