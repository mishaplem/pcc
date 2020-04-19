<?php
require_once 'theme/header.php';
require_once 'theme/menu.php';
?>
      
          <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form class="forma" method="POST">
                        <div class="form-group">
                          <label for="name">Имя</label>
                          <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                          <label for="tel">Телефон</label>
                          <input type="tel" class="form-control" id="tel" name="tel">
                        </div>
                        <div class="form-group">
                          <label for="Email1">Email</label>
                          <input type="email" class="form-control" id="Email1" name="email">
                        </div>
                        <input type="text" name="kod" class="kod">
                        <button type="submit" name="button" class="btn btn-primary">ЖМИ!</button>
                    </form>
                </div>
            </div>
          </div>
      
<?php
$CONNECT = mysqli_connect(HOST, USER, PASS, DB);
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$name = @ trim(htmlspecialchars($_POST["name"]));
$tel = @ trim(htmlspecialchars($_POST["tel"]));
$email = @ trim(htmlspecialchars($_POST["email"]));
$kod = @ trim(htmlspecialchars($_POST["kod"]));
$name_ok = preg_match('/[a-zA-Z|а-яА-Я]+/', $name);
$number_ok = preg_match('/[0-9]+/', $tel);
$email_ok = preg_match('/.+@.+\..+/i', $email);
if (empty($kod) && isset($_POST["button"]) && ($name_ok == 1) && ($number_ok == 1) && ($email_ok == 1)){
    mysqli_query($CONNECT, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($CONNECT, "SET CHARACTER SET 'utf8'");
    mysqli_query ($CONNECT,"INSERT INTO `clients`(`id`, `name`, `tel`, `email`) VALUES (NULL,'$name','$tel','$email')"); 
    mysqli_close($CONNECT);
}
require_once 'theme/footer.php';
?>
