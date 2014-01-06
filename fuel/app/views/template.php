<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CBO - <?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <?php if(isset($add_css)){ echo Asset::css(array('bootstrap.css', 'style.css', $add_css)); }else{ echo Asset::css(array('normalize.css','bootstrap.min.css', 'main.css')); } ?>

</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                </button>
                            <?php echo Html::anchor('welcome', 'CasseBriqueOnline', array('class' => 'brand')); ?>
                            <div class="nav-collapse collapse">
                                <p class="navbar-text pull-right">
                                    <?php $mesbonjours  = array(
                                        0 => "Bonjour",
                                        1 => "Привет",
                                        2 => "Salâm",
                                        3 => "Aloha",
                                        4 => "你好",
                                        5 => "こんにちは",
                                        6 => "Olá",
                                        7 => "Namaste",
                                        8 => "สวัสดีค่ะ",
                                    ); if(isset($user)){echo Html::anchor('account/edit', $mesbonjours[array_rand($mesbonjours)] . ', ' . $user->prenom . ' !');}else{echo Html::anchor('login/login', $mesbonjours[array_rand($mesbonjours)] . ', Invité !');} ?>
                                </p>
                            </div>
                    </div>
                </div>
        </div>

        <div class="container padding" id="container">

        <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success">
                <p>
                    <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert alert-error">
                <h4>Attention !</h4>
                <p>
                    <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
                </p>
            </div>
        <?php endif; ?>

        <?php echo $content ?>

        <hr>

        <div>
            <p>&copy; Rémi Delhaye - 2013</p>
        </div>

        <?php echo Asset::js(array('bootstrap.min.js', /*'//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'*/'jquery.js')); ?>
        <?php if(isset($jeux_online)){echo Asset::js(array('http://localhost:1337/socket.io/socket.io.js','main.js'));} ?>
        <?php if(isset($jeux_offline)){echo Asset::js(array('main-offline.js'));} ?>
        <?php if(isset($generateur)){echo Asset::js(array('generateur.js'));} ?>

</body>
</html>