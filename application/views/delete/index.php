<div class="section">
    <div class="container">
        
    <?php echo validation_errors(); ?>
    
    <p>Are you sure you would like to delete...</p>
    <h2><?php echo $result['country'] . " " . $result['purpose'] . " " . $result['visatype']; ?>?</h2>
    

    <table id="visaPrices" style="width: 50%;">
			     <thead>
				    <tr class="table-header">
                        <th>Country</th>
                        <th>Purpose</th>
                        <th>Visa Type</th>
                        <th>Processing Time</th>
                        <th>Validity</th>
                        <th>Stay</th>
                        <th>Entries</th>
                        <th>Embassy Fee</th>
                        <th>Service Fee</th>
                        <th>Additional Fee</th>
                        <th>Total</th>
				    </tr>
                </thead>
                <tbody>
                    <tr>

<?php
    
    echo "<td>" . html_escape($result['country']) . "</td>";
    echo "<td>" . html_escape($result['purpose']) . "</td>";
    echo "<td>" . html_escape($result['visatype']) . "</td>";
    echo "<td>" . html_escape($result['processingtime']) . "</td>";
    echo "<td>" . html_escape($result['validity']) . "</td>";
    echo "<td>" . html_escape($result['stay']) . "</td>";
    echo "<td>" . html_escape($result['entries']) . "</td>";
    echo "<td>" . html_escape($result['embassyfee']) . "</td>";
    echo "<td>" . html_escape($result['servicefee']) . "</td>";
    echo "<td>" . html_escape($result['additionalfee']) . "</td>";
    echo "<td>" . html_escape($result['total']) . "</td>";

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