<?php
require_once 'theme/header.php';
require_once 'theme/menu.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="forma" method="POST">
                <div class="form-group">
                    <label for="pole">Поле для фильтра</label>
                    <select name="pole" id="pole">
                        <option value="0">-</option>
                        <option value="1">Имя</option>
                        <option value="2">Номер</option>
                        <option value="3">Email</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter">Введите значение фильтра</label>
                    <input type="text" class="form-control" id="filter" name="filter">
                </div>
                <button type="submit" name="button" class="btn btn-primary">Фильтр</button>
            </form><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $pole = @ trim(htmlspecialchars($_POST["pole"]));
                    $filter = @ trim(htmlspecialchars($_POST["filter"]));
                    $CONNECT = mysqli_connect(HOST, USER, PASS, DB);
                    if (mysqli_connect_errno()) {
                        printf("Соединение не удалось: %s\n", mysqli_connect_error());
                        exit();
                    }
                    mysqli_query($CONNECT, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
                    mysqli_query($CONNECT, "SET CHARACTER SET 'utf8'");
                    $nomer = mysqli_query($CONNECT, "SELECT * FROM clients");
                    switch($pole)
                    {
                      case "0": $nomer = mysqli_query($CONNECT, "SELECT * FROM clients"); break;
                      case "1": $nomer = mysqli_query($CONNECT, "SELECT * FROM clients WHERE name = '{$filter}'"); break;
                      case "2": $nomer = mysqli_query($CONNECT, "SELECT * FROM clients WHERE tel = '{$filter}'"); break;
                      case "3": $nomer = mysqli_query($CONNECT, "SELECT * FROM clients WHERE email = '{$filter}'"); break;
                    }
                  
                    while( $row = mysqli_fetch_array($nomer) ){
                        $id = $row['id'];
                        $fio = $row['name'];
                        $email = $row['email'];
                        $tel = $row['tel'];
                        print "<tr><th scope='row'>".$id."</th><td>".$fio."</td><td>".$tel."</td><td>".$email."</td></tr>";
                    }
                    mysqli_close($CONNECT);
                    ?>
                    
                </tbody>
              </table>
            <form class="forma" method="POST">
                <div class="form-group">
                    <label for="pole2">Выберите клиента для удаления</label>
                    <select name="pole2" id="pole2">
                        <?php
                        $CONNECT = mysqli_connect(HOST, USER, PASS, DB);
                        if (mysqli_connect_errno()) {
                            printf("Соединение не удалось: %s\n", mysqli_connect_error());
                            exit();
                        }
                        mysqli_query($CONNECT, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
                        mysqli_query($CONNECT, "SET CHARACTER SET 'utf8'");
                        $nomer = mysqli_query($CONNECT, "SELECT * FROM clients");

                        while( $row = mysqli_fetch_array($nomer) ){
                            $fio = $row['name'];
                            print "<option value='{$fio}'>{$fio}</option>";
                        }
                        mysqli_close($CONNECT);
                        ?>
                    </select>
                </div>
                <button type="submit" name="but" class="btn btn-primary">Удалить</button>
            </form>
                        <?php
                        $pole2 = @ trim(htmlspecialchars($_POST["pole2"]));
                        $CONNECT = mysqli_connect(HOST, USER, PASS, DB);
                        if (mysqli_connect_errno()) {
                            printf("Соединение не удалось: %s\n", mysqli_connect_error());
                            exit();
                        }
                        mysqli_query($CONNECT, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
                        mysqli_query($CONNECT, "SET CHARACTER SET 'utf8'");
                        $nomer = mysqli_query($CONNECT, "DELETE FROM clients WHERE name = '{$pole2}'");
                        mysqli_close($CONNECT);
                        ?>
        </div>
    </div>
</div>


<?php
require_once 'theme/footer.php';
?>
