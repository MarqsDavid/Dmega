<?php
// Include the FPDF library
require('fpdf/fpdf.php');

// Include the database connection file
require('conexao.php');

// Check if form was submitted
if (isset($_POST['responsible'])) {
    // Get responsible from POST data
    $responsibleId = (int) $_POST['responsible'];

    // Create a new FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();

    // Add the logo
    $pdf->Image('../img/Dmega-logo.png', 10, 10, 30);

    // Add a header with additional information (e.g., current date)
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->SetY(20); // Adjust Y position as needed
    $pdf->Cell(0, 10, 'Generated on ' . date('d/m/Y'), 0, 1, 'R');

    // Fetch responsible description
    $sql_responsible = "SELECT responsible FROM responsible WHERE id = ?";
    $stmt_responsible = $conexao->prepare($sql_responsible);
    $stmt_responsible->bind_param('i', $responsibleId);
    $stmt_responsible->execute();
    $result_responsible = $stmt_responsible->get_result();

    if ($result_responsible->num_rows > 0) {
        $row_responsible = $result_responsible->fetch_assoc();
        $responsibleName = htmlspecialchars($row_responsible['responsible'], ENT_QUOTES, 'UTF-8');
    } else {
        $responsibleName = 'Unknown responsible';
    }

    // Set font for the title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Report by responsible: ' . $responsibleName, 0, 1, 'C');

    $pdf->Ln(10); // Line break

    // SQL query with prepared statement to fetch data
    $sql = "SELECT *
            FROM V_ASSETS
            WHERE id_responsible = ? and sstatus < 3";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $responsibleId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        // Table header
        $pdf->SetFont('Arial', 'B', 10); // Font size 10
        $pdf->Cell(35, 8, 'Description', 1, 0, 'C');
        $pdf->Cell(25, 8, 'Asset Number', 1, 0, 'C');
        $pdf->Cell(50, 8, 'Number Location', 1, 0, 'C');
        $pdf->Cell(35, 8, 'Responsible', 1, 0, 'C');
        $pdf->Cell(30, 8, 'Date Creation', 1, 1, 'C');

        // Data rows
        $pdf->SetFont('Arial', '', 10); // Font size 10
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(35, 8, htmlspecialchars($row['ddescription'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L');
            $pdf->Cell(25, 8, htmlspecialchars($row['assetNumber'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L');
            $pdf->Cell(50, 8, htmlspecialchars($row['location_description'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L');
            $pdf->Cell(35, 8, htmlspecialchars($row['responsible'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L');
            $pdf->Cell(30, 8, date('d/m/Y', strtotime($row['dateCreation'])), 1, 1, 'L');
        }
    } else {
        // No results message
        $pdf->SetFont('Arial', 'I', 10); // Italic font size 10
        $pdf->Cell(0, 8, 'No Registration found.', 1, 1, 'C');
    }

    // Close the statement and database connection
    $stmt->close();
    $stmt_responsible->close();
    $conexao->close();

    // Output the PDF (force download as 'Report by Responsible.pdf')
    $pdf->Output('D', 'Report_Responsible.pdf');
} else {
    // Handle the case where the form was not submitted correctly
    echo "No responsible specified.";
}
?>