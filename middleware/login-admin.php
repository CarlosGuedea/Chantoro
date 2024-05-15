<?php
session_start();

error_reporting(0);

$Error = ""; // Definir la variable $Error antes de usarla

$db = new Base;
$conn = $db->ConexionBD();

$nombre_usuario = htmlspecialchars($_POST['nombre_usuario']);

try {
    if (isset($_POST['nombre_usuario'])) {
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE NombreUsuario = :nombre_usuario");
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();

        // Verificar si la consulta fue exitosa
        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $Contrasena = $_POST['contraseña'];
                $truecontrasena = $row['Contraseña'];

                if ($truecontrasena == $Contrasena) {
                    // Generar y almacenar token
                    $token = bin2hex(random_bytes(32));
                    $_SESSION['token'] = $token;

                    // Almacenar el token en la base de datos (reemplaza 'token_column' y 'id_column' con los nombres reales)
                    $updateTokenStmt = $conn->prepare("UPDATE Usuarios SET Token = :token WHERE UsuarioID = :user_id");
                    $updateTokenStmt->bindParam(':token', $token);
                    $updateTokenStmt->bindParam(':user_id', $row['UsuarioID']);
                    $updateTokenStmt->execute();

                    $_SESSION['ID'] = $row['UsuarioID'];
                    $_SESSION['Usuario'] = $row['NombreUsuario'];
                    $_SESSION['Contrasena'] = $truecontrasena;
                    $_SESSION['Rol'] = 'Admin';

                    header('Location: /productos/1');
                } else {
                    $Error = "Contraseña o usuario invalido.";
                }
            } else {
                $Error = "Contraseña o usuario invalido.";
            }
        } else {
            $Error = "Error en la consulta SQL.";
        }
    }
} catch (PDOException $ex) {
    echo $ex;
}
