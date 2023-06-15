<?php
$prod = $products->where('id', $transactions->product_id)->first();
$seller = $users->where('id', $prod->seller_id)->first();
$buyer = $users->where('id', $tranc->buyer_id)->first();
$total = $transactions->quantity * $prod->price;

//images
$path = $prod->file_path;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
$html = "
<h1><b>Transaction Detail</b></h1>
<h3>Date : ".$tranc->transaction_date."</h3>
<h3>Seller: ".$seller->username."</h3>
<h3>Buyer: ".$buyer->username."</h3>
<div style='display:block;'>
    <img src='".$base64."' style='height: 150px;'>
</div>
<div style='display:inline;'>
<p>Product name: ".$prod->product_name."</p>
<p>Description: ".$prod->description."</p>
<p>Price: ".$prod->price."</p>
<p>Quantity: ".$transactions->quantity."</p>
<h3>-----------------------------------------------------------</h3>
<h3>Total: Rp".$total."</h3>
</div>
</div>";
$filename = "newpdffile";

// include autoloader

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);
?>
