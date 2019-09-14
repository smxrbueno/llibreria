<?php

    $servername = "localhost";
    $username =  "id9086159_administrador";
    $password = "administrador";
    $dbName = "id9086159_llibreria";


   $conn = new mysqli($servername, $username, $password, $dbName);
    //Check Connection

   if($conn){
      

    $consulta= "select nom,preu from Llibre WHERE preu<=15" ; //escribim la consulta
        
    $Result = mysqli_query($conn ,$consulta); //realitzem la consulta passant la connexio i la consulta
   
       
    if(mysqli_num_rows($Result)>0) //si ens retorna més de 0 files...
    {
      //creem la taula i assignem els camps
      echo "<table border='1'><center>
            <tr>
            <th>Llibres</th>
            <th>Preu</th>
            <th>Preu+IVA</th>
            </tr>";

        
       while($row=mysqli_fetch_assoc($Result)) //while que recorre totes les files imprimint el nom,preu i preu+IVA
       {
            echo "<tr>";
            echo "<td><center>". $row['nom'] ."</center></td>"; //imprimim el nom del llibre
            echo "<td><center>". $row['preu'] ."</center></td>"; //imprimim el preu
            $preuIVA = $row['preu'] + (21*($row['preu']/100)); //creem la variable preuIVA on ens guardará el preu + el IVA del llibre que esta sent impres
            echo "<td><center>". $preuIVA ."</center></td>"; //imprimim en la taula el preu+IVA

               
        }
        echo "</table></center>";
        
    }else{
        echo "No s'ha pogut recollir la informacio";
    }

   }
   if(!$conn){
        die("Connection Failed. ". mysqli_connect_error());
   }
?>