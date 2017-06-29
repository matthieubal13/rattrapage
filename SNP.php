<!doctype html>
<html>

  <?php
  include("base.php");
  ?>

	<head>
		<title>SNPs</title>
		<link rel="stylesheet" type="text/css" href="static/style.css">
	</head>

	<body>

    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="phenotypes.php">Phenotypes</a></li>
      <li><a class="active" href="SNP.php">SNPs</a></li>
      <li><a href="reference.php">References</a></li>
      <li><form action="search.php" method="POST" enctype="multipart/form-data"><input type="text" name="phenotype"></form></li>
      <li style="float:right" class="button"><a href="https://www.ncbi.nlm.nih.gov/pubmed/">PubMed</a></li>
    </ul>

		<h1>SNPs</h1>

    <table>

      <?php
    		foreach($SNP as $line)
    		{
    			echo '<tr><td class="list"><a href="http://localhost:8888/SNP2pheno.php?SNP=' . $line['SNP'] . '">' . $line['SNP'] . '</a></td></tr>';
    		}
  		?>

    </table>

  </body>
</html>
