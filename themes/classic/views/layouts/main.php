<?php /* @var $model SearchForm */?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $this->pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/main.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.png">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo Yii::app()->baseUrl;?>/assets/5e2914df/jquery.yiiactiveform.js"></script>

</head>

<body>

  <div class="navbar navbar-static-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="?r=site/index">My app</a>

        <div class="nav-collapse collapse pull-right">
          <!-- Yii widget para implementa????o do NavBar -->
          <?php $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'items' => array(
              array('label' => 'Home', 'url' => array('site/index')),
              array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
              array('label' => 'Contact', 'url' => array('site/contact')),
              array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
              array('label' => 'Users', 'url' => array('/site/users'), 'visible' => !Yii::app()->user->isGuest),
            ),
          ));  ?>

          <!-- Creates Search Bar using active form -->
          <div class="form-container">
            <?php $form = $this->beginWidget('CActiveForm', array(
              'method' => 'get', 
              'action' => '?r=user/search',
              'enableAjaxValidation' => true,
              'enableClientValidation' => true,
            )) ?>
            <?php $model = new SearchForm; ?>
            <?php echo $form->searchField($model, 'search', array('class' => 'form-inline', 'name' => 'search')) ?>
            <button type="submit" class="search-button" id="search-button">
              <i class="fa fa-search"></i>
            </button>
          </div>
          
          <?php $this->endWidget() ?>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <?php if (!empty($this->breadcrumbs)) : ?>
    <div class="container" style="padding:0">
      <div class="row-fluid">
        <div class="span12">
          <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'htmlOptions' => array("style" => "margin: 10px 0;"),
            'links' => $this->breadcrumbs,
          )); ?>
          <!-- breadcrumbs -->
        </div>
      </div>
    </div>
  <?php endif ?>
  <?php if (($msgs = Yii::app()->user->getFlashes()) !== null and $msgs !== array()) : ?>
    <div class="container" style="padding-top:0">
      <div class="row-fluid">
        <div class="span12">
          <?php foreach ($msgs as $type => $message) : ?>
            <div class="alert alert-<?php echo $type ?>">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $message ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php echo $content; ?>

  <footer class="footer bg-ft clearfix pd4">
    <div class="container">
      <!--footer container-->
      <div class="row-fluid">
        <div class="span3">
          <section>
            <h4><span>Contact Us</span></h4>
            <p>Gustalh Creative<br>
              123456 <br>
              Bogot?? Colombia<br>
              <strong>phone:</strong> <a href="tel:123456789" class="tele">123456789</a><br>
              <strong>fax:</strong> 123456789<br>
              <span class="overflow"><strong>email:</strong> <a href="mailto:email@domain.com">email@companydomain.com</a></span>
            </p>
          </section>
          <!--close section-->

          <section>
            <h4><span>Follow Us</span></h4>
            <div class="social">
              <a href="#"><i class="icon-facebook facebook"></i></a>
              <a href="#"><i class="icon-twitter twitter"></i></a>
              <a href="#"><i class="icon-linkedin linkedin"></i></a>
              <a href="#"><i class="icon-google-plus google-plus"></i></a>
            </div>
          </section>
          <!--close section-->
        </div>
        <!-- close .span3 -->

        <!--section containing newsletter signup and recent images-->
        <div class="span5">
          <section>
            <h4><span>Stay Updated</span></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius.</p>
            <form action="#" method="post">
              <div class="input-append append-fix custom-append row-fluid">
                <input type="email" class="span8" placeholder="Email Address" name="email">
                <button class="btn btn-primary">Sign Up</button>

              </div>
            </form>
            <!--close input-append-->
          </section>
          <!--close section-->
        </div>
        <!-- close .span5 -->

        <!--section containing blog posts-->
        <div class="span4">
          <section>
            <h4><span>About Us</span></h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </section>
        </div>
        <!-- close .span4 -->
      </div>
      <!-- close .row-fluid-->
    </div>
    <!-- close footer .container-->
  </footer>


  <section class="footer-credits">
    <div class="container">
      <ul class="clearfix">
        <li>?? 2013 Your Company Name. All rights reserved.</li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
      </ul>
    </div>
    <!--close footer-credits container-->
  </section>


</body>

</html>