/*
Dans le terminal :
- se connecter à mysql :
  mysql -h dbs-perso.luminy.univmed.fr -u b902965 -p
  mysql -h localhost -p -u root
  -> Enter password: "mdp ordi"

- créer la base de données:
CREATE DATABASE multi_table;

- exécuter le script :
  source load_datas.sql
*/

CREATE DATABASE multi_table;

USE multi_table;

CREATE TABLE table2drop (phenotype VARCHAR(100), SNP VARCHAR(100), reference VARCHAR(255));

LOAD DATA LOCAL INFILE '/Users/matthieubal/Desktop/rattrapage/fichiers_annexes/data.csv'
  INTO TABLE table2drop
FIELDS
  TERMINATED BY ','
  ESCAPED BY '\\' /* permet d’échapper les caractères interdits dans le fichier */

LINES
  STARTING BY ''
  TERMINATED BY '\n'

IGNORE 1 LINES
(phenotype, SNP, reference)


CREATE TABLE snp (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, rsid VARCHAR(50));
INSERT INTO snp (rsid) VALUES (SELECT DISTINCT SNP FROM table2drop);

CREATE TABLE pheno (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, phenotype VARCHAR(50));
INSERT INTO pheno (phenotype) VALUES (SELECTphenotype.table2drop FROM table2drop);

CREATE TABLE ref (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, reference VARCHAR(50));
INSERT INTO ref (reference) VALUES (SELECT reference.table2drop FROM table2drop);

CREATE TABLE snp2ref2pheno (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, snp_id INT(50), phenotype_id INT(50), reference_id INT(50));
INSERT INTO snp2ref2pheno (snp_id, phenotype_id, reference_id) VALUES (SELECT DISTINCT id.snp, id.pheno, id.ref FROM snp, pheno, ref);


/*
Modèle à potentiellement suivre pour faire une jointure:
SELECT id, prenom, nom, date_achat, num_facture, prix_total
FROM utilisateur
INNER JOIN commande ON utilisateur.id = commande.utilisateur_id
*/

/*
DROP TABLE table2drop;
*/

/*
SELECT ... INTO var_list selects column values and stores them into variables.
SELECT ... INTO OUTFILE 'file_name' writes the selected rows to a file. Column and line terminators can be specified to produce a specific output format. 'file_name' cannot be an existing file.
SELECT ... INTO DUMPFILE writes a single row to a file without any formatting.
Pour convertir le fichier de sortie en CSV :
  SELECT a,b,a+b INTO OUTFILE '/tmp/result.txt'
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
    LINES TERMINATED BY '\n'
    FROM test_table;
*/
