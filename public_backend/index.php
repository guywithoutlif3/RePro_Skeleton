<?php

(require __DIR__ . '/../config/bootstrap.php')->run();




?>

<script type="text/JavaScript\"> 
const userAction = async () => {
        const response = await fetch('http://localhost:8080/menu');
        const myJson = await response.json(); //extract JSON from the http response
        alert(myJson);
      }
      </script>