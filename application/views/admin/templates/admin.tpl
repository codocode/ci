<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin - {$title|default:''}</title>
      
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
                            <li><a href = "{"admin/menus"|site_url}">Menu</a></li>
                           <li><a href = "#">Activity Log</a></li>
                           <li><a href = "#">Back up Database</a></li>
                           <li class = "divider"></li>
                           <li><a href = "#">Edit Profile</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "login/logout">Logout</a></li>
                        </ul>
                        
                     </li>

                     {assign var="current_url" value=current_url()}
                    
                    {foreach from=$menu key="menu_name" item=$link}

                        {assign var="link_url" value=$link.url|default:'#'}

                        {assign var="menu_active" value=""}

                        {if !empty($link.sub_menu)}

                            {capture name="sub_menu"}
                                
                                {foreach from=$link.sub_menu key="sub_menu_name" item=$sub_link}
                                    {assign var="sub_link_url" value=$sub_link.url|default:'#'}

                                    {if $current_url == $sub_link_url}
                                        {assign var="class_active" value='class="active"'}
                                        {assign var="menu_active" value=$class_active}
                                    {else}
                                        {assign var="class_active" value=''}
                                    {/if}


                                    <li {$class_active}>
                                        <a href = "{$sub_link_url}">{$sub_link.title}</a>
                                    </li>
                                    <li class = "divider"></li>
                                {/foreach}
                            
                            {/capture}

                            <li {$menu_active}>
                                <a href = "{$link_url}" class="dropdown-toggle" data-toggle="dropdown">
                                   {$link.title}
                                   <b class = "caret"></b>
                                </a>

                                {if $smarty.capture.sub_menu ne ""}
                                    <ul class = "dropdown-menu">{$smarty.capture.sub_menu nofilter}</ul>
                                {/if}
                            </li>
                        {else}
                            <li class = "active"><a href = "{$link_url}">{$link.title}</a></li>
                        {/if}
                    
                    {/foreach}

                  </ul>
               </div>
           
            </nav>

        </div>

        <div class="container">
            <div id="content">


              {* 2nd way $dis->view($view_file)*}
              {$this->load->view($view_file)}

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
