<?php
include_once 'connectdb.php';

$id = $_POST['invid'];

// Delete T1, T2 from T1 inner join on T1.key = T2.key where condition T1.key=id;

$sql = "DELETE tbl_invoice,tbl_invoice_details FROM tbl_invoice INNER JOIN tbl_invoice_details ";
$sql.= "ON tbl_invoice.invoice_id = tbl_invoice_details.invoice_id WHERE "; 
$sql.= "tbl_invoice.invoice_id=$id";

$delete = $pdo->prepare($sql);

if ($delete->execute()) {
    
} else {
    echo 'Error in Deleting';
}

?>