<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PCC test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .forma{
            padding-top: 140px;
        }
    </style>
  </head>
  <body>
          <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PCC</a>
              </div>
              <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Форма заполнения</a></li>
                      <li><a href="#">Клиенты</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav>
      
          <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form class="forma">
                        <div class="form-group">
                          <label for="name">Имя</label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="tel">Телефон</label>
                          <input type="tel" class="form-control" id="tel">
                        </div>
                        <div class="form-group">
                          <label for="Email1">Email</label>
                          <input type="email" class="form-control" id="Email1">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">ЖМИ!</button>
                    </form>
                </div>
            </div>
          </div>
      

   
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
