        <footer id="footer" class="container">                
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1">
                    DirectID is provided by miiCard Limited | Edinburgh | London | New York <br/>
                    US +1 302 760 9130 | UK +44 (0)845 119 3333 | e: info@directid.co | © miiCard® | All rights reserved 2014 | Registered in Scotland SC400459     
                </div>
            </div>                       
        </footer> 
        
        
        <?php 
            if(isset($_POST["version"])){
                $version = $_POST["version"];
                echo '<!-- Direct ID Script -->';
                echo '<script src="https://az708254.vo.msecnd.net/content/' . $version . '/directid.min.js"></script>';
            }
        ?>
        
    </body>
</html>