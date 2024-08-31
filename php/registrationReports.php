<?php
// Include the FPDF library
require('fpdf/fpdf.php');

// Include the database connection file
require('conexao.php');

// Create a new FPDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set font for the title
$pdf->SetFont('Arial', 'B', 16);

// Title of the report
$pdf->Cell(0, 10, 'Registration reports', 0, 1, 'C');
$pdf->Ln(10); // Line break

// SQL query with prepared statement to fetch data
$sql = "SELECT *
FROM V_ASSETS
WHERE sstatus = 1";

$stmt = $conexao->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


// Check if there are results
if ($result->num_rows > 0) {
    // Table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 8, 'Description', 1, 0, 'C');
    $pdf->Cell(25, 8, 'Asset Number', 1, 0, 'C');
    $pdf->Cell(45, 8, 'Number Location', 1, 0, 'C'); // Aumentado para 45
    $pdf->Cell(40, 8, 'Responsible', 1, 0, 'C');
    $pdf->Cell(30, 8, 'Date Creation', 1, 1, 'C');

    // Data rows
    $pdf->SetFont('Arial', '', 10);
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 8, $row['ddescription'], 1, 0, 'L');
        $pdf->Cell(25, 8, $row['assetNumber'], 1, 0, 'L');
        $pdf->Cell(45, 8, $row['location_description'], 1, 0, 'L'); // Aumentado para 45
        $pdf->Cell(40, 8, $row['responsible'], 1, 0, 'L');
        $pdf->Cell(30, 8, date('d/m/Y', strtotime($row['dateCreation'])), 1, 1, 'L');
    }
} else {
    // No results message
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(0, 8, 'No Registration found.', 1, 1, 'C');
}



// Close the statement and database connection
$stmt->close();
$conexao->close();

// Add a header with additional information (e.g., current date)
$pdf->SetFont('Arial', 'I', 10);
$pdf->SetY(20); // Adjust Y position as needed
$pdf->Cell(0, 10, 'Generated on ' . date('d/m/Y'), 0, 1, 'R');

// Add the logo (adjust position (10, 10) and size (30) as needed)
$pdf->Image('../img/Dmega-logo.png', 10, 10, 30);

// Output the PDF (force download as 'Registration_Reports.pdf')
$pdf->Output('Registration_Reports.pdf', 'D');
?>