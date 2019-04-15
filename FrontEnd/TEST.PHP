<?php


?>

<html>
    <head>
      <script>
                body {
          overflow: hidden;
          margin: 0;
          padding: 0;
        }

        #full {
          position: absolute;
          height: 100%;
          width: 100%;
        }
      </script>
      <script>
        var div = document.getElementById("full");

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function changeColor(){
          div.style.backgroundColor= getRandomColor();
        }

        setInterval(changeColor,1000);
      </script>
    </head>
   <body>
      <div id="full"></div>
   </body>
</html>