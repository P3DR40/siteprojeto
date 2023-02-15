<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cena.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Gestor dos condominios</title>
</head>
<body>
    <form action="./cena2.php" method="post">
    <div class="container-sm center w-25">
        

        <br>
        <label for="cc" class="form-label">Condominio:</label>
        <br>
        <select name="Condomonios" id="Condomonio">
    
        <?php
        #Alterar em caso de erro de conexão
        $conn = mysqli_connect("localhost","root","");

        if (!$conn) {
         die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }

        mysqli_select_db($conn, "gestaodecondominios");

        #Não mexer: 
        $condominios = mysqli_query($conn, "SELECT  ID_CONDOMINIO, nomecondo, codpostal FROM CONDOMINIO");

        if (!$condominios) {
           die("Erro ao realizar a consulta: " . mysqli_error($conn));
        }

        while($row = $condominios->fetch_row()) {
            $id_condominio = $row[0];
            $nome = $row[1];
            $cod_postal = $row[2];

            echo "<option value='$id_condominio'>$nome $cod_postal</option>";
        }

        #close conn 
        mysqli_close($conn);
?>  


        </select>
        <br>
        <label for="nif_txt">Nif:</label>
        <input type="text" class = "form-control" name = "nif" id = "nif_txt"><br>
        <button class = "btn btn-primary" type="submit" >Submeter</button>
    </form>
</body>
</html>