<?php 
    include "connect.php";
    session_start();
    $team = $_SESSION['team'];
    if(isset($_GET['id'])){
    
        // if($team === "team a"){
            $stmt = $db->prepare("SELECT bh FROM cta
   WHERE id = ?     
   ");
//         }elseif($team === "team b"){
//             $stmt = $db->prepare("SELECT bh FROM ctb
//    WHERE id = ?     
//    ");
//         }elseif($team === "team c"){
//             $stmt = $db->prepare("SELECT bh FROM ctc
//    WHERE id = ?     
//    ");
//         }elseif($team === "team d"){
//             $stmt = $db->prepare("SELECT bh FROM ctd
//    WHERE id = ?     
//    ");
//         }elseif($team === "team e"){
//             $stmt = $db->prepare("SELECT bh FROM cte
//    WHERE id = ?     
//    ");
//         }elseif($team === "team f"){
//             $stmt = $db->prepare("SELECT bh FROM ctf
//    WHERE id = ?     
//    ");
//         }elseif($team === "team g"){
//             $stmt = $db->prepare("SELECT bh FROM ctg
//    WHERE id = ?     
//    ");
//         }elseif($team === "team h"){
//             $stmt = $db->prepare("SELECT bh FROM cth
//    WHERE id = ?     
//    ");
//         }elseif($team === "team i"){
//             $stmt = $db->prepare("SELECT bh FROM cti
//    WHERE id = ?     
//    ");
//         }
$stmt->execute([ $_GET['id'] ]);
$file = $stmt->fetch();

header('Content-type: application/pdf');
header('Content-disposition: attachment; filename="bh.pdf"');
echo $file['bh'];
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