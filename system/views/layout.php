<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<div class="navbar navbar-inverse" style="position: static;">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="" style="color: darkorange; font-style: italic">Site</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: darkorange">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><? if($auth = Auth::instance()->logged_in()){?><a href="/logout">Logout</a><?} else{?><a href="#login" data-toggle=modal>Login</a><?}?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="login" action="login" method="post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="form-signin-heading" id="myModalLabel">Пожалуйста авторизуйтесь</h3>
    </div>
    <div class="modal-body">
        <input type="text" class="input-block-level" placeholder="Email address" id="email">
        <input type="password" class="input-block-level" placeholder="Password" id="password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="chkbox"> Запомнить меня
        </label>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Закрыть</button>
        <button class="btn btn-primary" type="button" id="btnsubmit">Отправить</button>
    </div>
</div>
<div class="container-fluid">
    <div id="content">
        <?php echo $content ?>
    </div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#btnsubmit').on('click', function(){
        $.post('/login',{'login': $('#email').val(),'password':$('#password').val(),'chkbox':$('#chkbox').is(":checked"), 'btnsubmit':$('#btnsubmit').val()}, function(data){
            if(data!='success')
            {
                $('#errors').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ошибка</strong> авторизации.</div>');
            }
            else
            {
                location.reload();
            }}, 'text');
        $('#login').modal('hide');
    });</script>
</body>
</html>