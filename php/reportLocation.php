<?php
// Include the FPDF library
require('fpdf/fpdf.php');

// Include the database connection file
require('conexao.php');

// Check if form was submitted
if (isset($_POST['location'])) {
    // Get location from POST data
    $location = $_POST['location'];

    // Create a new FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();

    // Add the logo
    $pdf->Image('../img/Dmega-logo.png', 10, 10, 30);

    // Add a header with additional information (e.g., current date)
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->SetY(20); // Adjust Y position as needed
    $pdf->Cell(0, 10, 'Generated on ' . date('d/m/Y'), 0, 1, 'R');

    // Fetch location description
    $sql_location = "SELECT location_description FROM locations WHERE id = ?";
    $stmt_location = $conexao->prepare($sql_location);
    $stmt_location->bind_param('i', $location);
    $stmt_location->execute();
    $result_location = $stmt_location->get_result();

    if ($result_location->num_rows > 0) {
        $row_location = $result_location->fetch_assoc();
        $location_description = htmlspecialchars($row_location['location_description'], ENT_QUOTES, 'UTF-8');
    } else {
        $location_description = 'Unknown Location';
    }

    // Set font for the title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Report by Location: ' . $location_description, 0, 1, 'C');

    $pdf->Ln(10); // Line break

    // SQL query with prepared statement to fetch data
    $sql = "SELECT  * 
            FROM V_ASSETS 
            WHERE id_location = ? and sstatus < 3";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $location);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        // Table header
        $pdf->SetFont('Arial', 'B', 10); // Fonte reduzida para 10
        $pdf->Cell(35, 8, 'Description', 1, 0, 'C'); // Ajustado para 35
        $pdf->Cell(25, 8, 'Asset Number', 1, 0, 'C'); // Ajustado para 25
        $pdf->Cell(50, 8, 'Number Location', 1, 0, 'C'); // Ampliado para 50
        $pdf->Cell(35, 8, 'Responsible', 1, 0, 'C'); // Ajustado para 35
        $pdf->Cell(30, 8, 'Date Creation', 1, 1, 'C'); // Mantido

        // Data rows
        $pdf->SetFont('Arial', '', 10); // Fonte reduzida para 10
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(35, 8, htmlspecialchars($row['ddescription'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L'); // Ajustado para 35
            $pdf->Cell(25, 8, htmlspecialchars($row['assetNumber'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L'); // Ajustado para 25
            $pdf->Cell(50, 8, htmlspecialchars($row['location_description'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L'); // Ampliado para 50
            $pdf->Cell(35, 8, htmlspecialchars($row['responsible'], ENT_QUOTES, 'UTF-8'), 1, 0, 'L'); // Ajustado para 35
            $pdf->Cell(30, 8, date('d/m/Y', strtotime($row['dateCreation'])), 1, 1, 'L'); // Mantido
        }
    } else {
        // No results message
        $pdf->SetFont('Arial', 'I', 10); // Fonte itálica e reduzida para 10
        $pdf->Cell(0, 8, 'No Registration found.', 1, 1, 'C');
    }


    // Close the statement and database connection
    $stmt->close();
    $stmt_location->close();
    $conexao->close();

    // Output the PDF (force download as 'Report_Location.pdf')
    $pdf->Output('D', 'Report_Location.pdf');
} else {
    // Handle the case where the form was not submitted correctly
    echo "No location specified.";
}
?>