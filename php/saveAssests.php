<?php
include_once('conexao.php');

if (isset($_POST['update'])) {
    $id = $_POST['item_id'];
    $locationChange = $_POST['location-change'];
    $responsibleChange = $_POST['responsible-change'];
    $dateChange = $_POST['date-change'];

    // Check if the fields are not empty
    if (!empty($id) && !empty($locationChange) && !empty($responsibleChange) && !empty($dateChange)) {
        // Prepare the SQL query for updating
        $sqlUpdate = "UPDATE assets 
                      SET numberLocation = ?, responsible_id = ?, dateCreation = ?, sstatus = 2 
                      WHERE id = ?";

        // Initialize a statement and bind parameters
        if ($stmt = $conexao->prepare($sqlUpdate)) {
            $stmt->bind_param("sssi", $locationChange, $responsibleChange, $dateChange, $id);

            // Execute the statement
            if ($stmt->execute()) {
                // Successful update
                $stmt->close();
                header('Location: ../pages/moveAssets.php');
                exit;
            } else {
                // Error updating record
                echo "Error updating record: " . $stmt->error;
            }
        } else {
            // Error preparing the statement
            echo "Error preparing statement: " . $conexao->error;
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Update button not pressed.";
}
