<?php
session_start();

error_reporting(0);

$Error = ""; // Definir la variable $Error antes de usarla

$db = new Base;
$conn = $db->ConexionBD();

$Email = htmlspecialchars($_POST['Email']);

try {
    if (isset($_POST['Email'])) {
        $stmt = $conn->prepare("SELECT * FROM Clientes WHERE CorreoElectronico = :Email");
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();

        // Verificar si la consulta fue exitosa
        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $Contrasena = $_POST['Contrasena'];
                $truecontrasena = $row['Contrasena'];

                if ($truecontrasena == $Contrasena) {
                    // Generar y almacenar token
                    $token = bin2hex(random_bytes(32));
                    $_SESSION['token'] = $token;

                    // Almacenar el token en la base de datos (reemplaza 'token_column' y 'id_column' con los nombres reales)
                    $updateTokenStmt = $conn->prepare("UPDATE Clientes SET Token = :token WHERE ClienteID = :ClienteID");
                    $updateTokenStmt->bindParam(':token', $token);
                    $updateTokenStmt->bindParam(':ClienteID', $row['ClienteID']);
                    $updateTokenStmt->execute();

                    $_SESSION['ID'] = $row['ClienteID'];
                    $_SESSION['Usuario'] = $row['CorreoElectronico'];
                    $_SESSION['Contrasena'] = $truecontrasena;
                    $_SESSION['Rol'] = 'Cliente';

                    header('Location: /pedidos-cliente/1');
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
