<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        .delete-btn {
            background-color: red;
            color: white;
        }

        .cancel-btn {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Student Registration</h2>
    <form action="register_process.php" method="post">
        <!-- Adding studentID field -->
        <label for="studentID">Student ID:</label>
        <input type="number" name="studentID"><br>

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="middleName">Middle Name:</label>
        <input type="text" name="middleName"><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="college">College:</label>
        <input type="text" name="college" required><br>

        <label for="program">Program:</label>
        <input type="text" name="program" required><br>

        <label for="year">Year:</label>
        <input type="number" name="year" required><br>

        <!-- Adding delete and cancel buttons -->
        <button type="submit">Register</button>
        <button type="submit" class="delete-btn" name="action" value="delete">Delete</button>
        <button type="submit" class="cancel-btn" name="action" value="cancel">Cancel</button>
    </form>
</body>
</html>
