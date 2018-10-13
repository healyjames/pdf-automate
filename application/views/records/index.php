<h2><?php echo $title; ?></h2>

		      <table>
			     <thead>
				    <tr>
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
                        <th></th>
				    </tr>
                </thead>
                <tbody>
                    <tr>

<?php

//Escaping html -> http://php.net/manual/en/language.basic-syntax.phpmode.php

foreach($price as $row){
    
    echo "<td>" . html_escape($row['country']) . "</td>";
    echo "<td>" . html_escape($row['purpose']) . "</td>";
    echo "<td>" . html_escape($row['visatype']) . "</td>";
    echo "<td>" . html_escape($row['processingtime']) . "</td>";
    echo "<td>" . html_escape($row['validity']) . "</td>";
    echo "<td>" . html_escape($row['stay']) . "</td>";
    echo "<td>" . html_escape($row['entries']) . "</td>";
    echo "<td>" . html_escape($row['embassyfee']) . "</td>";
    echo "<td>" . html_escape($row['servicefee']) . "</td>";
    echo "<td>" . html_escape($row['additionalfee']) . "</td>";
    echo "<td>" . html_escape($row['total']) . "</td>";
    
    echo '<td><a href="/index.php/records/update.php?visa_id="' . $row['visa_id'] . '><p>Edit</p></a></td>';
    
    echo "</tr>";
    
}


?>
                        
                    </tr>
                </tbody>
            </table>