<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery.js"></script>
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-ui.js"></script>
        
        
        <?php
        
        //If $load_script is not empty, loop through it and print out each script tag
        //Need to make sure my Controller declares $data['load_script'] as an array
        
        if(!empty($load_js)){
            
            foreach($load_js as $js){
                
                echo '<script type="text/javascript" src="' .  base_url() . 'assets/custom-scripts/' . $js . '"></script>';
                
            }
        }
        
        ?>
        
        
        <title><?php echo $title; ?></title>
        
    </head>
    <body>
        
