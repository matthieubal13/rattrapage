<!doctype html>
<html>

  <?php
  include("base.php");
  ?>

  <head>
    <title><?php echo $_GET['SNP'];?></title>
    <link rel="stylesheet" type="text/css" href="static/style.css">
  </head>

  <body>

    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="phenotypes.php">Phenotypes</a></li>
      <li><a href="SNP.php">SNPs</a></li>
      <li><a href="reference.php">References</a></li>
      <li><form action="search.php" method="POST" enctype="multipart/form-data"><input type="text" name="phenotype"></form></li>
      <li style="float:right" class="button"><a href="https://www.ncbi.nlm.nih.gov/pubmed/">PubMed</a></li>
    </ul>

    <h1>Phenotypes related to the snp <?php echo $_GET['SNP'];?></h1>

    <table>

      <?php
        $SNP2pheno->execute(['SNP_name' => $_GET['SNP']]);

        foreach($SNP2pheno as $line)
          {
            echo '<tr><td class="list"><a href="http://localhost:8888/pheno2SNP.php?phenotype=' . $line['phenotype'] . '">' . $line['phenotype'] . '</a></td></tr>';
          }
      ?>

    </table>
  </body>
</html>
