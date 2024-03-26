<?php
require_once '../bootstrap.php';
//authentication
LogInCheck();
//$dept_id = $_SESSION['dept_id'];
//$dept_name = $_SESSION['dept_name'];



function generateAdminRow()
{
    $contents = '';
    include_once('../db.php');
    //for admin only
    $sql = "SELECT * FROM item WHERE dept_id = '1'";
    //use for MySQLi OOP
    $query = $conn->query($sql);
    $i = 1;
    while ($row = $query->fetch_assoc()) {
        $contents .= "
			<tr><td>" . $i . "</td>
				<td>" . $row['item_id'] . "</td>
				<td>" . $row['item_name'] . "</td>
				<td>" . $row['item_detail'] . "</td>
								
			</tr>
			";
        $i++;
    }

    return $contents;
}


require_once('../lib/tcpdf/tcpdf.php');
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("item list");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 10);
$pdf->AddPage();
$content = '';
$content .= '
        <div>
        <h1 align="center"><u>STRETCHLINE</u></h1>
      	<h2 align="center">CURRENT AVAILABLE STOCK </h2>
      	<h4>GENERATED BY admin</h4>
      	<h4>' . date('d-m-y H:i:s') . '</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr> 
                <th width="10%"><i>SLNO</i></th> 
                <th width="30%"><i>ID</i></th>
				<th width="30%"><i>NAME</i></th>
				<th width="30%"><i>DETAIL</i></th>
				
			</tr>
           
            
      ';
$content .= generateAdminRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('available_stock_current_list.pdf', 'I');
$conn->close();





