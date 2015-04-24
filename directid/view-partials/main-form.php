<div id="page-wrapper">
            
    <header id="header" class="container">
        <div class="row">
            <div class="col-xs-12">                                        
                <a href="http://direct.id"><img src="http://direct.id/Media/Default/Images/DirectID.png" /></a>                                                           
            </div>
        </div>
    </header>

    <main id="main" class="container">        
        <header class="row">
            <div id="form-header" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1">                
                <h1>Setup Connection to Direct ID</h1>     
                <legend>Connection details provided by Direct ID</legend>
            </div>
        </header>

        <div class="row">
            <div id="form" class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1">
                <form action="./widget.php" method="post">

                    <div class="form-group">
                        <label>Client ID</label>
                        <input type="text" class="form-control" name="clientId" />
                    </div>

                    <div class="form-group">
                        <label>Client Secret</label>
                        <input type="text" class="form-control" name="clientSecret" />                    
                    </div>                         

                    <div class="form-group">
                        <label>API Endpoint</label>
                        <input type="text" class="form-control" name="apiPath" />
                    </div>

                    <div class="form-group">
                        <label>API Version</label>
                        <input type="text" class="form-control" name="version" />                    
                    </div>                            

                    <div class="form-group">
                         <label>OAuth Resource</label>
                        <input type="text" class="form-control" name="oAuthResource" />                    
                    </div>                            

                    <div class="form-group">
                        <label>OAuth Path</label>
                        <input type="text" class="form-control" name="oAuthPath" />
                    </div>

                    <button type="submit" value="Setup Connection" class="btn btn-primary pull-right"> Setup Connection </button>                                        

                </form>
            </div>
        </div>
    </main>
</div>