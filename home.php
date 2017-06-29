<!DOCTYPE html>
<html>

  <?php
  include("base.php");
  ?>

  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="static/style.css">
  </head>

  <body>

    <ul>
      <li><a class="active" href="home.php">Home</a></li>
      <li><a href="phenotypes.php">Phenotypes</a></li>
      <li><a href="SNP.php">SNPs</a></li>
      <li><a href="reference.php">References</a></li>
      <li><form action="search.php" method="POST" enctype="multipart/form-data"><input type="text" name="phenotype"></form></li>
      <li style="float:right" class="button"><a href="https://www.ncbi.nlm.nih.gov/pubmed/">PubMed</a></li>
    </ul>

    <h1>Home</h1>

    <table>
      <tr>
        <th class="title_line"><button onclick="desc1()">&#9757;</button><h2> Phenotypes</h2></th>
        <th class="title_line"><button onclick="desc2()">&#9757;</button><h2> SNPs</h2></th>
        <th  class="title_line" class="col_ref"><button onclick="desc3()">&#9757;</button><h2> References</h2></th>
      </tr>

      <?php
    		foreach($all_datas as $line)
    		{
    			echo '<tr><td><a href="http://localhost:8888/pheno2SNP.php?phenotype=' . $line['phenotype'] . '">' . $line['phenotype'] . '</a></td>
                    <td><a href="http://localhost:8888/SNP2pheno.php?SNP=' . $line['SNP'] . '">' . $line['SNP'] . '</a></td>
                    <td class="col_ref"><a href="' . $line['reference'] . '"><img src="static/image/PubMed-Logo.png" alt="' . $line['reference'] . '" style="width:60px;height:21px;"></a></td>
                </tr>';
    		}
  		?>

    </table>

    <script>
    function desc1() {
        alert("This is the column containing all the phenotypes of the database");
    }
    function desc2() {
        alert("This is the column containing all the SNPs of the database");
    }
    function desc3() {
        alert("This is the column containing all the references of the database");
    }
    </script>

  </body>
</html>
