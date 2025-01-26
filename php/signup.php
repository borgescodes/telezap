<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    
    include_once "config.php";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    // Coletar dados do formulário de forma segura
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Verificar se os campos estão preenchidos
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        // Validar o formato do email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Verificar se o email já existe no banco de dados
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$email - Este e-mail já existe!";
            } else {
                // Verificar se foi enviado uma imagem
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    // Obter a extensão da imagem
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    // Definir extensões permitidas
                    $extensions = ["jpeg", "png", "jpg"];
                    if (in_array($img_ext, $extensions) === true) {
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if (in_array($img_type, $types) === true) {
                            $time = time();
                            $new_img_name = $time . $img_name;
                            
                            // Mover o arquivo para o diretório 'images/'
                            if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                                // Gerar um ID único e criptografar a senha
                                $ran_id = rand(time(), 100000000);
                                $status = "Online Agora";
                                $encrypt_pass = md5($password);

                                // Inserir o novo usuário no banco de dados
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                if ($insert_query) {
                                    // Selecionar o usuário inserido para iniciar a sessão
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if (mysqli_num_rows($select_sql2) > 0) {
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    } else {
                                        echo "Este endereço de e-mail não existe!";
                                    }
                                } else {
                                    echo "Algo deu errado. Por favor, tente novamente!";
                                }
                            }
                        } else {
                            echo "Por favor, carregue um arquivo de imagem - jpeg, png, jpg";
                        }
                    } else {
                        echo "Por favor, carregue um arquivo de imagem - jpeg, png, jpg";
                    }
                }
            }
        } else {
            echo "$email não é um e-mail válido!";
        }
    } else {
        echo "Todos os campos de entrada são obrigatórios!";
    }
?>
