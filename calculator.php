<!-- My notes: xampp is used to watch php websites live, first you have to start aparche form xampp control panel and then in 
the web browser type localhost/filename.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #888;
            display: inline-block;
        }

        input[type="text"] {
            width: 150px;
            padding: 5px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        #result {
            margin-top: 10px;
            font-weight: bold;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Simple Calculator</h2>
    <form method="post">
        <input type="text" name="num1" placeholder="Enter number 1" pattern="\d+" title="Please enter numbers only" required>
        <input type="text" name="num2" placeholder="Enter number 2" pattern="\d+" title="Please enter numbers only" required>
        <br><br>
        <input type="submit" name="operation" value="Add">
        <input type="submit" name="operation" value="Subtract">
        <input type="submit" name="operation" value="Multiply">
        <input type="submit" name="operation" value="Divide">
    </form>

    <div id="result">
        <?php
        if (isset($_POST['operation'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];

            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo '<div class="error-message">Please enter valid numbers only.</div>';
            } else {
                switch ($operation) {
                    case 'Add':
                        $result = $num1 + $num2;
                        break;
                    case 'Subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'Multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'Divide':
                        if ($num2 == 0) {
                            echo "Division by zero is not allowed.";
                        } else {
                            $result = $num1 / $num2;
                        }
                        break;
                    default:
                        echo "Invalid operation selected.";
                }

                if (isset($result)) {
                    echo "Result: $num1 $operation $num2 = " . $result;
                }
            }
        }
        ?>
    </div>
</body>
</html>

