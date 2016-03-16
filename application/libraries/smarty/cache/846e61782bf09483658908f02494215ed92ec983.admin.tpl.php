<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-07 03:53:37
  from "E:\wamp\www\ci_login\application\views\admin\templates\admin.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56dced319cd279_71600137',
  'file_dependency' => 
  array (
    '98c4b702f4d1d40b9febe50016db522363af7be1' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\templates\\admin.tpl',
      1 => 1455846169,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56dced319cd279_71600137 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin - </title>
      
      <!-- Bootstrap -->
      <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      
      <!--[if lt IE 9]>
      <script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
   </head>
   
   <body>
        <div id="header>" class="container-fluid">

            <nav class = "navbar navbar-default" role = "navigation">
   
               <div class = "navbar-header">
                  <a class = "navbar-brand" href = "#">TutorialsPoint</a>
               </div>
               
               <div class="pull-left">
                  <ul class = "nav navbar-nav">
                     <li class = "active"><a href = "#">iOS</a></li>
                     <li><a href = "#">SVN</a></li>
                  
                     <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                           Java 
                           <b class = "caret"></b>
                        </a>
                        
                        <ul class = "dropdown-menu">
                           <li><a href = "#">jmeter</a></li>
                           <li><a href = "#">EJB</a></li>
                           <li><a href = "#">Jasper Report</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "#">Separated link</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "#">One more separated link</a></li>
                        </ul>
                        
                     </li>
                     <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                           Setting 
                           <b class = "caret"></b>
                        </a>
                        
                        <ul class = "dropdown-menu">
                            <li><a href = "http://localhost:8080/ci_login/index.php/admin/menus">Menu</a></li>
                           <li><a href = "#">Activity Log</a></li>
                           <li><a href = "#">Back up Database</a></li>
                           <li class = "divider"></li>
                           <li><a href = "#">Edit Profile</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "login/logout">Logout</a></li>
                        </ul>
                        
                     </li>

                                         
                    
                        
                        
                        
                            
                            <li >
                                <a href = "link.php" class="dropdown-toggle" data-toggle="dropdown">
                                   Link
                                   <b class = "caret"></b>
                                </a>

                                                                    <ul class = "dropdown-menu">                                
                                                                    
                                                                                                                

                                    <li >
                                        <a href = "submenu0.php">Sub Menu 0</a>
                                    </li>
                                    <li class = "divider"></li>
                                                                    
                                                                                                                

                                    <li >
                                        <a href = "submenu01.php">Sub Menu 01</a>
                                    </li>
                                    <li class = "divider"></li>
                                                            
                            </ul>
                                                            </li>
                                            
                    
                        
                        
                        
                            
                            <li class="active">
                                <a href = "link1.php" class="dropdown-toggle" data-toggle="dropdown">
                                   Link 1
                                   <b class = "caret"></b>
                                </a>

                                                                    <ul class = "dropdown-menu">                                
                                                                    
                                                                                                                

                                    <li >
                                        <a href = "sublink1.php">Sub Menu 1</a>
                                    </li>
                                    <li class = "divider"></li>
                                                                    
                                                                                                                                                        

                                    <li class="active">
                                        <a href = "http://localhost:8080/ci_login/index.php/admin/home">Home</a>
                                    </li>
                                    <li class = "divider"></li>
                                                            
                            </ul>
                                                            </li>
                                            
                    
                  </ul>
               </div>
           
            </nav>

        </div>

        <div class="container">
            <div id="content">


              
              
   <h2>Welcome <?php echo '<?php'; ?>
 echo $username; <?php echo '?>'; ?>
!</h2>



            </div>
        </div>

        <div id="footer" class="container">
            <p>footer</p>
        </div>
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
      
   </body>
</html>
<?php }
}
