<html>
    <head>
        <title>Direct ID PHP Example</title>
        
        <!-- Direct ID Dependencies -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        
        
        <?php
            if(isset($_POST["fullCDNPath"])){
                $fullCDNPath = trim($_POST["fullCDNPath"],"/");
                echo '<!-- Direct ID Css -->';
                echo '<link href="' . $fullCDNPath . '/directid.min.css" rel="stylesheet" />';
            }
        ?>
        <!-- Example Style -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700,800,300' rel='stylesheet' type='text/css'/>   
        <link href="css/style.css" rel="stylesheet" />
        
    </head>
    
<body>

    