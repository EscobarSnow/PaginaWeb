<?php
    $con = mysqli_connect("localhost", "root", "", "escobarsnow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Productes</title>
    <link rel="stylesheet" href="css/estils_prod.css">
</head>
<body>
    <div id="all">
        <header>
            <div class="capcalada">
                <img src="./imatges/logo.png" alt="logotip">
                <h1>EscobarSnow</h1>
                <nav>
                    <div class="menu">
                        <a href="index.html">Inici</a>
                        <a href="productes.php">Productes</a>
                        <a href="#">Contacte</a>    
                    </div>
                </nav>
            </div>
        </header>

        <div class="productes">
            <h2>Productes oferits</h2>
            <div id="filtre">
                <button class="btn active" onclick="filterSelection('all')">Mostra tot</button>
                <button class="btn" onclick="filterSelection('esquis')" >Esquis</button>
                <button class="btn" onclick="filterSelection('botes')" >Botes</button>
                <button class="btn" onclick="filterSelection('pals')" >Pals</button>
            </div>

            <table>
                <tr>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>Preu</th>
                    <th>Categoria</th>
                </tr>

                <?php
                $consulta = "SELECT marca, color, talla, preu, categoria FROM esquis";
                $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) {
                ?>    
                    
                    <tr id="esquis" class="esquis filterElements">
                    <td><?php echo $row['marca'] ?></td>
                    <td><?php echo $row['color'] ?></td>
                    <td><?php echo $row['talla'] ?></td>
                    <td><?php echo $row['preu'] ?></td>
                    <td><?php echo $row['categoria'] ?></td>
                    </tr>
                
                <?php
                }    
                
                ?>
                <?php
                $consulta2 = "SELECT marca, color, talla, preu, categoria FROM botes";
                $resultado2 = mysqli_query($con, $consulta2);
                    while ($row2 = mysqli_fetch_array($resultado2)) {
                    ?>    
                    
                    <tr id="botes" class="botes filterElements">
                    <td><?php echo $row2['marca'] ?></td>
                    <td><?php echo $row2['color'] ?></td>
                    <td><?php echo $row2['talla'] ?></td>
                    <td><?php echo $row2['preu'] ?></td>
                    <td><?php echo $row2['categoria'] ?></td>
                    </tr>
                
                <?php
                }    
                
                ?>
                <?php
                $consulta2 = "SELECT marca, color, talla, preu, categoria FROM pals";
                $resultado2 = mysqli_query($con, $consulta2);
                    while ($row2 = mysqli_fetch_array($resultado2)) {
                    ?>    
                    
                    <tr id="esquis" class="esquis filterElements">
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


        <footer>
            <div class="social">
                <ul class="menu_simple">
                    <li><a href="https://www.facebook.com/"> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
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

    <script>
        filterSelection("all")
            function filtre(c){
                var x, i;
                    x = document.querySelectorAll(.filterElements):
                    if (c == "all") c = "" {
                        Array.from(x).forEach(item =>{
                            borrarClasse(item, "show");
                            if (item.className.indexOf(c) > -1) inserirClasse(item, "show");
                        });  
                }
            }
            function inserirClasse(ele, name) {
                var i, arr1, arr2;
                arr1 = ele.className.split(" ");
                arr2 = name.split(" ");
                    for (i = 0; i < arr2.length; i++) {
                        if (arr1.indexOf(arr2[i]) == -1) {ele.className += " " + arr2[i];}
                    }
            }
            function borrarClasse(ele, name) {
                var i, arr1, arr2;
                arr1 = ele.className.split(" ");
                arr2 = name.split(" ");
                    for (i = 0; i < arr2.length; i++) {
                        while (arr1.indexOf(arr2[i]) > -1) {
                            arr1.splice(arr1.indexOf(arr2[i]), 1);
                        }
                    }
                    ele.className = arr1.join(" ");
            }
            var filtre = document.querySelector(".filtre");
            var botons = filtre.getElementsByTagName("button");
                for (i = 0; i < botons.length; i++) {
                    botons[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active");
                        current[0].className = current[0].className.replace(" active", "");
                        this.className += " active";    
                    });
                }
    </script>

</body>
</html>