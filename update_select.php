
<?php
require_once('PDO.php');

if (isset($_POST["value"])) {
    $search=$_POST["value"];
    
 $query = "
  SELECT * FROM sites 
  WHERE vendor LIKE '%".$search."%'
  OR site_id LIKE '%".$search."%' 
  OR type LIKE '%".$search."%' 
  OR band LIKE '%".$search."%' 
  OR wp LIKE '%".$search."%'
  OR date LIKE '%".$search."%'
  OR site_name LIKE '%".$search."%' AND `on_air`!='OnAir'";
}
else
{
 $query = "SELECT * FROM `sites` WHERE `on_air`!='OnAir' ORDER BY `id` DESC LIMIT 10";
}

$statement = $connect->prepare($query);

if ($statement->execute()) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);
}

?>
