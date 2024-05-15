<?php
    session_start();

    $db = new Base;
    $conn = $db->ConexionBD();

    // Almacenar el token en la base de datos (reemplaza 'token_column' y 'id_column' con los nombres reales)
    $TokenStmt = $conn->prepare("SELECT * from Usuarios Where UsuarioID = :user_id");
    $TokenStmt->bindParam(':user_id', $_SESSION['ID']);
    $TokenStmt->execute();

    $row = $TokenStmt->fetch(PDO::FETCH_ASSOC);

    if($_SESSION['token']){

    } else{
        session_unset();
        session_destroy();
    //Aqui lo redireccionas al lugar que quieras.
        header('Location: /');
        die() ;
    }

    if($_SESSION['Rol']==='Cliente'){
        session_unset();
        session_destroy();
    //Aqui lo redireccionas al lugar que quieras.
        header('Location: /');
        die() ;
    }
?>