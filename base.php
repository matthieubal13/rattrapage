<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=rattrap;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
      die('Erreur : ' . $e->getMessage());
}

$s_datas = $bdd->query("SELECT SNP, phenotype, reference FROM table_unique ORDER BY phenotype");
$all_datas = $s_datas->fetchAll();
$s_pheno = $bdd->query("SELECT DISTINCT phenotype FROM table_unique");
$pheno = $s_pheno->fetchAll();
$s_SNP = $bdd->query("SELECT DISTINCT SNP FROM table_unique");
$SNP = $s_SNP->fetchAll();
$s_reference = $bdd->query("SELECT DISTINCT reference FROM table_unique");
$reference = $s_reference->fetchAll();
// 'prepare' puis 'execute' permettent de sécuriser la bdd
$pheno2SNP = $bdd->prepare('SELECT DISTINCT SNP FROM table_unique WHERE phenotype = :pheno_name');
$SNP2pheno = $bdd->prepare('SELECT phenotype FROM table_unique WHERE SNP = :SNP_name');
?>
