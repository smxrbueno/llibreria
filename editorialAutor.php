<?php

    $servername = "localhost";
    $username =  "id9086159_administrador";
    $password = "administrador";
    $dbName = "id9086159_llibreria";


   $autor = $_GET["autor"];
   

   $conn = new mysqli($servername, $username, $password, $dbName);
    //Check Connection

   if($conn){
       

    $consulta= "select editorial from Llibre WHERE autor like '$autor'" ; //guardem la consulta a la variable consulta
        
    $Result = mysqli_query($conn ,$consulta); //realitzem la consulta passant la connexio i la consulta
   
       
    if(mysqli_num_rows($Result)>0) //si ens retorna més de 0 files...
    {
        
       while($row=mysqli_fetch_assoc($Result)) //si s'associa el numero de files amb el resultat...
       {
            if($row['editorial']!=null){ //si la fila retornada de la consulta es diferent de null
                echo "<p>" .$row['editorial']."<p>"; //la imprimim fent un salt de linia
                
            }

               
        }
        
    }else{
        echo "No s'ha pogut agafar la editorial de l'autor";
    }

   }
   if(!$conn){
        die("Connection Failed. ". mysqli_connect_error());
   }
?>