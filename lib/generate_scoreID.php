<?php 


function ID_Generate_4_export(){
    
    require 'database_config.php';   
    function generate_id_4(){
        $uniqueId = "";

        for ($i = 0; $i < 8; $i++) {
            $randomNumber = rand(0, 9);
            $uniqueId .= $randomNumber;
        }
        
        return $uniqueId;
    }

    $pass_Val = true;

    while($pass_Val)
    {
        $idGen = generate_id_4();
        $SQL_Q = "SELECT ID FROM scoreboard WHERE ID = '$idGen'";
        
        $result = $conn->query($SQL_Q);
        if(!$result->num_rows > 0)
            
            return $idGen;
            //break;
        }


}
// $data = ID_Generate_4_export();
// echo $data;
?>