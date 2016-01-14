<div id="page-wrapper">
            
    <header id="header" class="container">
        <div class="row">
            <div class="col-xs-12">                        
                <a href="http://direct.id"><img src="images/DirectID.png" /></a>                        
            </div>
        </div>                
    </header>

    <main id="main" class="container">        
        <header class="row">
            <div id="widget-header" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1">
                <?php 
                    if((isset($oAuthToken) && $oAuthToken->token != null) && (isset($userToken) && $userToken->token != null)){
                        echo '<h1>Well Done!</h1>';  
                        echo '<legend>You Have Successfully Set Up The API Widget</legend> ';
                    }
                    else{
                        echo '<h1>Whoops!</h1>';  
                        echo "<legend>Something isn't quite right...</legend> ";
                    }
                ?>
            </div>
        </header>
        <div class="row">           

            <?php
                if((isset($oAuthToken) && $oAuthToken->token != null) && (isset($userToken) && $userToken->token != null)){
                    echo '<div id="widget" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">';
                    echo '<div id="did" data-token="' . $userToken->token .'"></div>';
                    echo '</div>';
                }
                else{
                    echo '<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">';
                    
                    if( !isset($oAuthToken) || $oAuthToken->token == null){
                        echo '<h3 class="alert alert-danger">OAuth Token Not Set</h3>';
                    }
                    if( !isset($userToken) || $userToken->token == null){
                        echo '<h3 class="alert alert-danger">User Token Not Set</h3>';
                    }
                    
                    echo '</div>';
                }
            ?>
            
        </div>
    </main>
    
</div>