<?php
	$output = array(
		"draw" => intval($_GET['draw']),
		"recordsTotal" =>345,
		"recordsFiltered" =>40,
		"data" => array()
	);

    for($i=1;$i<10;$i++){
        $dataaaa= array(
        //"DT_RowId"=> "row_".$i,
        //"DT_RowClass"=>"gradeB",
        "0"=>"Gecko",
        "1"=> "Firefox".$i,
        "2"=> "Win / OSX".$i,
        "3"=>$i,
        "4"=> "A"
      );
      $output['data'][]=$dataaaa; 
    }

echo json_encode( $output );
?>