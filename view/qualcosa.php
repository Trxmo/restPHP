<?php
function visualizza($variabile){
?>  
<?php require __DIR__ . '/parcials/header.php'; ?>
<body>
    <h1>Bella Fra</h1>

    <form action="/qualcosa.php" method="POST">
    	First Name:<br>
    	<input type="text" name="firstname"><br>
    	Last Name:<br>
    	<input type="text" name="lastname"><br><br>
    	<input type="submit" name="Submit">
    </form>
</body>
</html> 


<?php  }?>



