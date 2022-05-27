<?php
$mysqli = new mysqli("localhost", "root", "", "dbtecweb");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
/*echo $mysqli->host_info . "\n";*/

$sql = "SELECT FOLIO, NOM, APE_PAT, APE_MAT FROM MORRO";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<center><table>";
  echo "<tr> <th> FOLIO </th> <th> NOMBRE </th> <th> APELLIDO PATERNO </th> <th> APELLIDO MATERNO </th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["FOLIO"]. " </td><td> " . $row["NOM"]. " </td><td> " . $row["APE_PAT"]. " </td><td>" .$row["APE_MAT"]. "</td></tr>";
  }
  echo "</table></center>";
} else {
  echo "0 results";
}
$mysqli->close();

?>