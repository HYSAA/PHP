<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // If action is delete, perform delete operation
    if ($action === 'delete') {
        $studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';

        if (!empty($studentID)) {
            $stmt = $pdo->prepare("DELETE FROM students WHERE studentID = :studentID");
            $stmt->bindParam(':studentID', $studentID);

            if ($stmt->execute()) {
                echo "Student with ID $studentID deleted successfully!";
            } else {
                echo "Error deleting student with ID $studentID.";
            }
        } else {
            echo "Please provide a valid Student ID for deletion.";
        }

    } elseif ($action === 'cancel') {
        // Handle cancel action
        echo "Operation cancelled.";
    } else {
        // If action is not delete or cancel, perform registration
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $college = $_POST['college'];
        $program = $_POST['program'];
        $year = $_POST['year'];

        $stmt = $pdo->prepare("INSERT INTO students (firstName, middleName, lastName, college, program, year) VALUES (:firstName, :middleName, :lastName, :college, :program, :year)");
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':middleName', $middleName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':college', $college);
        $stmt->bindParam(':program', $program);
        $stmt->bindParam(':year', $year);

        if ($stmt->execute()) {
            echo "Student registered successfully!";
        } else {
            echo "Error in student registration.";
        }
    }
}
?>
