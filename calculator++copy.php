<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator plus plus</title> 
    <link rel="stylesheet" href="calculator.css">

</head>
<header>
    <h1> calculator</h1>
</header>
<body>
    <div class="vak">
    
    
    
    
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
        first number
        
        <input type="number" name="nummer1" required>
        <br>  <br>
        operator 
    
      
      
      <select name="oparator" id="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="x">x</option>
        <option value="/">/</option>
      </select>
      <br> <br>
         second number 
      <input type="number" name="nummer2" required>
      <br> <br> <br>
      <button> calculate </button>
      <br> <br>
      
        </form>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nummer1 = filter_input(INPUT_POST, "nummer1", FILTER_SANITIZE_NUMBER_FLOAT);
          $nummer2 = filter_input(INPUT_POST, "nummer2", FILTER_SANITIZE_NUMBER_FLOAT);
          $operator = htmlspecialchars($_POST["oparator"]); // Corrected variable name

          $errors = false;
          if (empty($nummer1) || empty($nummer2) ||  empty($operator))  {
            echo "<p class='calc-error'>fill in all fields!</p>";
            $errors = true;
          }

          if(!is_numeric($nummer1) || !is_numeric($nummer2)){
            echo "<p class='calc-error'>Invalid input! Please enter numeric values.</p>";
            $errors = true;

          }

          if (!$errors) {
            $value = 0;
            switch ($operator) {
              case "+":
                $value = $nummer1 + $nummer2;
                break;
              case "-":
                $value = $nummer1 - $nummer2;
                break;
              case "x":
                  $value = $nummer1 * $nummer2;
                  break;
              case "/":
                    $value = $nummer1 / $nummer2;
                    break;
              default:
                    echo "<p class='calc-error'>error!</p>";

            }
            echo "<p class='results'><h1> Result = " .
            $value . "</p>";
          }
        }

          ?>
    </div>
    <div></div>

</body>
<footer>
    
</footer>
</html>