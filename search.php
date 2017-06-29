<!DOCTYPE html>
<html>

  <?php
  include("base.php");
  ?>

  <head>
    <title>Search results</title>
    <link rel="stylesheet" type="text/css" href="static/style.css">
  </head>

  <body>

    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="phenotypes.php">Phenotypes</a></li>
      <li><a href="SNP.php">SNPs</a></li>
      <li><a href="reference.php">References</a></li>
      <li><form action="search.php" method="POST" autocomplete="on"><input type="search" name="phenotype"></form></li>
      <li style="float:right" class="button"><a href="https://www.ncbi.nlm.nih.gov/pubmed/">PubMed</a></li>
    </ul>

    <h1>SNPs found for the phenotype of <?php echo $_POST['phenotype'];?></h1>

    <table>

      <?php

        if(isset($_POST['phenotype']))
        {
        $pheno2SNP->execute([':pheno_name' => $_POST['phenotype']]);
    		foreach($pheno2SNP as $line)
    		echo '<tr><td class="list"><a href="http://localhost:8888/SNP2pheno.php?SNP=' . $line['SNP'] . '">' . $line['SNP'] . '</a></td></tr>';
        }
        
  		?>

    </table>

  </body>
</html>
