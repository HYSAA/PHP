<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentID = $_POST["studentID"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $college = $_POST["college"];
    $program = $_POST["program"];
    $year = $_POST["year"];

    // Perform database operations or any other necessary actions here

    // For simplicity, we'll just display the registered student's information
    $message = "Student Registration successful!<br>";
    $message .= "Student ID: " . $studentID . "<br>";
    $message .= "First Name: " . $firstName . "<br>";
    $message .= "Middle Name: " . $middleName . "<br>";
    $message .= "Last Name: " . $lastName . "<br>";
    $message .= "College: " . $college . "<br>";
    $message .= "Program: " . $program . "<br>";
    $message .= "Year: " . $year . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            margin-top: 10px;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
            font-weight: bold;
        }

        .delete-button {
            background-color: #ff4d4d;
            color: #fff;
            margin-right: 10px;
        }

        .cancel-button {
            background-color: #4d94ff;
            color: #fff;
        }
    </style>
    <title>Student Registration</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Student Registration</h2>
            <?php if(isset($message)) { ?>
                <p style="color:green;"><?php echo $message; ?></p>
            <?php } ?>

            <label for="studentID">Student ID:</label>
            <input type="text" id="studentID" name="studentID" required>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="middleName">Middle Name:</label>
            <input type="text" id="middleName" name="middleName">

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="college">College:</label>
            <input type="text" id="college" name="college" required>

            <label for="program">Program:</label>
            <input type="text" id="program" name="program" required>

            <label for="year">Year:</label>
            <input type="text" id="year" name="year" required>

            <button type="submit">Register</button>
            <div>
                <button class="delete-button" type="button">Delete</button>
                <button class="cancel-button" type="button">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
