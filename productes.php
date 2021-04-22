<!--CONNEXIO A LA BASE DE DADES-->

<?php
    $con = mysqli_connect("localhost", "root", "", "escobarsnow");
?>

<!--INICI DE LA PÀGINA WEB-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Productes</title>
        <link rel="stylesheet" href="css/estils_prod.css">
    </head>

    <!--COS DE LA WEB-->

    <body>
        <div id="all">
           
            <!--CAPÇALERA DE LA WEB + MENU-->
           
            <header>
                <div class="capcalada">
                    <img src="./imatges/logo.png" alt="logotip">
                    <h1>EscobarSnow</h1>
                    <nav>
                        <div class="menu">
                            <a href="index.html">Inici</a>
                            <a href="productes.php">Productes</a>
                        </div>
                    </nav>
                </div>
            </header>
            
            <!--APARTAT DE PRODUCTES (TÍTOL + TAULA)-->

            <div class="productes">
                <h2>Productes oferits</h2>
                
                <!--FILTRE DE LA TAULA-->

                <input type="text" id="miInput" onkeyup="filtrar()" placeholder="Busca... (Esquis, botes o pals)" title="Escriu un tipus de material">
                
                <!--CAPÇALERA DE LA TAULA-->

                <table id="taula">
                    <tr>
                        <th>Material</th>
                        <th>Marca</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Preu</th>
                        <th>Categoria</th>
                    </tr>
                    
                    <!--AGAFEM LES DADES QUE VOLEM MOSTRAR A LA TAULA DE LA BASE DE DADES-->

                    <?php
                        $consulta = "SELECT marca, color, talla, preu, categoria FROM esquis";
                        $resultado = mysqli_query($con, $consulta);
                            while ($row = mysqli_fetch_array($resultado)) {
                        ?>
                        
                    <!--MOSTREM LES DADES A LA TAULA-->

                    <tr id="esquis" class="esquis filterElements">
                        <td>Esqui</td>
                        <td><?php echo $row['marca'] ?></td>
                        <td><?php echo $row['color'] ?></td>
                        <td><?php echo $row['talla'] ?></td>
                        <td><?php echo $row['preu'] ?></td>
                        <td><?php echo $row['categoria'] ?></td>
                    </tr>

                    <?php
                        }    

                        ?>
                        
                    <!--AGAFEM LES DADES QUE VOLEM MOSTRAR A LA TAULA DE LA BASE DE DADES-->
                        
                    <?php
                        $consulta2 = "SELECT marca, color, talla, preu, categoria FROM botes";
                        $resultado2 = mysqli_query($con, $consulta2);
                            while ($row2 = mysqli_fetch_array($resultado2)) {
                        ?>
                        
                    <!--MOSTREM LES DADES A LA TAULA-->

                    <tr id="botes" class="botes filterElements">
                        <td>Botes</td>
                        <td><?php echo $row2['marca'] ?></td>
                        <td><?php echo $row2['color'] ?></td>
                        <td><?php echo $row2['talla'] ?></td>
                        <td><?php echo $row2['preu'] ?></td>
                        <td><?php echo $row2['categoria'] ?></td>
                    </tr>

                    <?php
                        }    

                        ?>
                        
                    <!--AGAFEM LES DADES QUE VOLEM MOSTRAR A LA TAULA DE LA BASE DE DADES-->
                        
                    <?php
                        $consulta2 = "SELECT marca, color, talla, preu, categoria FROM pals";
                        $resultado2 = mysqli_query($con, $consulta2);
                            while ($row2 = mysqli_fetch_array($resultado2)) {
                        ?>
                        
                    <!--MOSTREM LES DADES A LA TAULA-->

                    <tr id="pals" class="pals filterElements">
                        <td>Pals</td>
                        <td><?php echo $row2['marca'] ?></td>
                        <td><?php echo $row2['color'] ?></td>
                        <td><?php echo $row2['talla'] ?></td>
                        <td><?php echo $row2['preu'] ?></td>
                        <td><?php echo $row2['categoria'] ?></td>
                    </tr>

                    <?php
                        }    

                        ?>
                </table>
            </div>
            
            <!--FOOTER DE LA WEB-->

            <footer>
               
                <!--ICONES XARXES SOCIALS-->
               
                <div class="social">
                    <ul class="menu_simple">
                        <li><a href="https://www.facebook.com/" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/?hl=en" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/?lang=en" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                
                <!--INFORMACIÓ SOBRE L'EMPRESA-->
                
                <div class="sobreempresa">
                    <ul>
                        <li class="titolfooter">Serveis</li>
                        <li><a href="#">Lloguers</a></li>
                        <li><a href="#">Material</a></li>
                    </ul>
                    <ul>
                        <li class="titolfooter">Atenció al clients</li>
                        <li>Tlf:/973158534</li>
                        <li>Email:info@escobarsnow.es</li>
                    </ul>
                    <ul>
                        <li class="titolfooter">Sobre EscobarSnow</li>
                        <li><a href="#">Qui som?</a></li>
                        <li><a href="#">On estem?</a></li>
                    </ul>
                </div>
            </footer>
        </div>
        
        <!--FUNCIONAMENT DEL FILTRE-->

        <script>
            function filtrar() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("miInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("taula");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>

    </body>
</html>