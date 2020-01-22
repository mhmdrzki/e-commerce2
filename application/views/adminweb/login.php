<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Busana Muslim Wanita | Login Options</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo base_url();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/select2/select2_metro.css" />
    <link href="<?php echo base_url();?>assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" />
   
</head>

<body class="login">

    <div class="logo">

        <img src="<?php echo base_url();?>images/logo/09102018195518A.png" alt="" />
    </div>
    <div class="content">

    <?php if(validation_errors()) { ?>
                <div class="alert alert-error">
                   <span>Username atau Password Kosong.</span>  
                </div>
                <?php } ?>


    <?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-error">
                   <span>Username atau Password Salah!</span>  
                </div>
                <?php } ?>


        <?php echo form_open('adminweb/login','class="form-vertical"'); ?>
           
            <div id="box_message" class="hide"></div>
            <div class="control-group">
                
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-user"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
               
                <button type="submit" class="btn blue pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
                </button>            
            </div>
         
        <?php echo form_close(); ?>
       
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2018 &copy; Toko Busana Muslim Wanita - Admin Dashboard.
    </div>
   
</body>
<!-- END BODY -->
</html>