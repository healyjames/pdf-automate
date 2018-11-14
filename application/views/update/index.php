<h2><?php echo $title; ?></h2>

<div class="section">
    
    <?php echo validation_errors(); ?>

    <?php
    echo '<form class="visa-form" method="post" accept-charset="utf-8">';
    
    foreach(array_slice($result, 1, -3) as $key => $value){  
    ?>
    
    
    
    <div class="input-wrapper">
        
        
    
        <?php
        echo '<label for="' . $key . '">' . html_escape(ucfirst($key)) . ': </label>';
        echo '<input id="' . $key . '" name="' . $key . '" value="' . html_escape($value) . '" type="text">';
    
        if($key === 'additionalfee'){
        
            echo '<input type="checkbox" name="vat" value="vat" id="vat">+ VAT<br/><script src="' . base_url() . 'assets/custom-scripts/calculate-vat.js"></script>';
        
        }
        ?>
    
        
        
    </div>
    
    

    <?php
    }
    ?>
    
    
    
    <div class="element">
        <p>Total: £<span class="total"></span></p>
    </div>
    
    <div class="element">
            <input type="submit" name="submit" value="Submit" class="submit">
        </div>
    
</div>