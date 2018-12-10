<div class="body-container">

<div class="section">
    <div class="container">
        
    <?php echo validation_errors(); ?>
    
    <p>Are you sure you would like to delete...</p>
    <h2><?php echo $visa['country'] . " " . $visa['purpose'] . " " . $visa['visatype']; ?>?</h2>
    

    <table id="visaPrices" style="width: 50%;">
			     <thead>
				    <tr class="table-header">
                        <th>Processing Time (TVC)</th>
                        <th>Processing Time (Embassy)</th>
                        <th>Validity</th>
                        <th>Stay</th>
                        <th>Entries</th>
                        <th>Embassy Fee</th>
                        <th>Price Band</th>
                        <th>Service Fee</th>
                        <th>Additional Fee</th>
                        <th>Total</th>
				    </tr>
                </thead>
                <tbody>
                    <tr>

<?php
                        
    $additionalfee = 0;
    
    if($visa['additional_fee_vat'] === '1'){
        $additionalfee = $visa['additional_fee'] * $vat_rate;
    }else {
        $additionalfee = $visa['additional_fee'];
    }
    
    echo "<td>" . html_escape($visa['processingtime_tvc']) . "</td>";
    echo "<td>" . html_escape($visa['processingtime_embassy']) . "</td>";
    echo "<td>" . html_escape($visa['validity']) . "</td>";
    echo "<td>" . html_escape($visa['stay']) . "</td>";
    echo "<td>" . html_escape($visa['entries']) . "</td>";
    echo "<td>£" . html_escape($visa['embassy_fee']) . "</td>";
    echo "<td>" . html_escape($visa['price_band_id']) . "</td>";
    echo "<td>£" . html_escape($visa['variable_service_fee'] + $visa['price']) . "</td>";
    echo "<td>£" . html_escape($additionalfee) . "</td>";
    echo "<td>£" . html_escape($visa['embassy_fee'] + $visa['variable_service_fee'] + $visa['price'] + $visa['additional_fee']) . "</td>";

?>
                        
                    </tr>
                </tbody>
            </table>
    
    
    <form style="display: inline" method="post" accept-charset="utf-8">
        
        
    <a href="#"><input type="submit" name="submit" value="Delete" class="focus-btn btn delete-btn"></a>
    </form>
        
    <a href="/"><button class="unfocus-btn btn">No, take me back</button></a>
    
    </div>
</div>
    </div>