<?php 
    include "connect.php";
    session_start();
    $team = $_SESSION['team'];
    if(isset($_GET['id'])){
    
        // if($team === "team a"){
            $stmt = $db->prepare("SELECT trans FROM cta
   WHERE id = ?     
   ");
//         }elseif($team === "team b"){
//             $stmt = $db->prepare("SELECT trans FROM ctb
//    WHERE id = ?     
//    ");
//         }elseif($team === "team c"){
//             $stmt = $db->prepare("SELECT trans FROM ctc
//    WHERE id = ?     
//    ");
//         }elseif($team === "team d"){
//             $stmt = $db->prepare("SELECT trans FROM ctd
//    WHERE id = ?     
//    ");
//         }elseif($team === "team e"){
//             $stmt = $db->prepare("SELECT trans FROM cte
//    WHERE id = ?     
//    ");
//         }elseif($team === "team f"){
//             $stmt = $db->prepare("SELECT trans FROM ctf
//    WHERE id = ?     
//    ");
//         }elseif($team === "team g"){
//             $stmt = $db->prepare("SELECT trans FROM ctg
//    WHERE id = ?     
//    ");
//         }elseif($team === "team h"){
//             $stmt = $db->prepare("SELECT trans FROM cth
//    WHERE id = ?     
//    ");
//         }elseif($team === "team i"){
//             $stmt = $db->prepare("SELECT trans FROM cti
//    WHERE id = ?     
//    ");
//         }
$stmt->execute([ $_GET['id'] ]);
$file = $stmt->fetch();

header('Content-type: application/pdf');
header('Content-disposition: attachment; filename="trans.pdf"');
echo $file['trans'];
// echo $file['ps'];
// echo $file['ssce'];
// echo $file['dp'];
// echo $file['mc'];
// echo $file['orl'];
// echo $file['arl'];
// echo $file['bh'];
// echo $file['trans'];
            
        
          
    }
?>