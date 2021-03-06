<div class="body-container">

<div class="error-msg">
<?php echo validation_errors(); //This function will return any error messages sent back by the validator. ?>
</div>
    
<?php 

$formClass = array('class' => 'visa-form');
echo form_open('create/index', $formClass); 

?>


<div class="wrapper">
    <div class="wrapper_container">
    
    <h2><?php echo $title; ?></h2>
    
    <div class="form-group">
        <label for="country">Country: </label>
        <select name="country" id="country">
            <option style="display:none"> </option>
            
            
            <?php
            
            foreach($countries as $country){
                echo '<option value="' . $country['country_id'] . '">' . $country['country'] . '</option>';
            }
            
            ?>
            
            
        </select>
    </div>

    <div class="form-group">
        <label for="purpose">Purpose: </label>
        <select name="purpose" id="purpose">

            <option style="display:none"> </option>
            <option value="Tourist">Tourist</option>
            <option value="Business">Business</option>
            <option value="Media">Media</option>
            <option value="Media">Journalist</option>
            <option value="Study">Study</option>
            <option value="Work">Work</option>
            <option value="Working Holiday">Working Holiday</option>
            <option value="Transit">Transit</option>
        </select>
    </div>                    

    <div class="form-group">
        <label for="visatype">Type: </label>
        <input type="text" name="visatype" id="visatype">
    </div>
    
    <div class="form-group">
            <label for="processingtime_tvc">Processing time (TVC): </label>
            <div class="flex">
                <input type="text" name="processingtime_tvc" id="processingtime_tvc">
                
                <select name="processingtime_tvc_format" id="processingtime_tvc_format" class="format">
                    
                <?php foreach($formats as $format){

                    echo '<option value="' . $format['format_id'] . '">' . $format['format_type'] . '</option>';
                        
                    }    
                ?>
                    
                    
                </select>
                
            </div>
        </div>   

    <div class="form-group">
        <label for="processingtime_embassy">Processing time (Embassy): </label>
        <select name="processingtime_embassy" id="processingtime_embassy">

            <option value="Standard">Standard</option>
            <option value="Express">Express</option>
            <option value="Same Day">Same Day</option>
            <option value="Next Working Day">Next Working Day</option>
            <option value="Urgent">Urgent</option>

        </select>
    </div>
                <!-- 

                What if validity is set to date?

                Need to account for validity in months and years e.g. a 5 year visa

                -->
    <div class="form-group">
        <label for="validity">Validity: </label>
        <div class="flex">
        
        <input type="text" name="validity" id="validity">

        <select name="validity_format" id="validity_format" class="format">
            <?php foreach($formats as $format){

                echo '<option value="' . $format['format_id'] . '">' . $format['format_type'] . '</option>';

                }    
            ?>
        </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="stay">Maximum length of stay: </label>
        <div class="flex">
        
        <input type="text" name="stay" id="stay">

        <select name="stay_format" id="stay_format" class="format">
            <?php foreach($formats as $format){

                echo '<option value="' . $format['format_id'] . '">' . $format['format_type'] . '</option>';

                }    
            ?>
        </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="entries">Number of entries: </label>
        <select name="entries" id="entries">

            <option style="display:none"> </option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Multiple">Multiple</option>
        </select>
    </div>

    <div class="form-group">
        <label for="embassy_fee">Embassy Fee: </label>
        <input type="text" name="embassy_fee" id="embassy_fee" class="amount" >
    </div>
                <!--

                Service fee will always have VAT added.

                There should be a sub-total and a total. Sub-total to show the fee of all teh values in the inputs and the total will take into account VAT.

                Need to think about how this gets translated into an SQL query.

                When a user ticks to apply VAT to the additonal fee, a new 


                -->


    <div class="form-group">
            <label for="band">Price Band: </label>
            <div class="flex">
            <select type="text" name="band_list" id="band_list" class="band amount">
                <option style="display:none"> </option>
                
        <?php foreach($price_bands as $band){ 

            echo '<option label="' . $band['price'] . '" value="' . $band['price_band_id'] . '">' . $band['price_band_id'] . '</option>';

        }
        ?>
                
                
                
            </select>
                
            <input type="text" name="band" id="band" class="amount" readonly>
            </div>
        </div>

    
    
    
    
    

    <div class="form-group servicefee">
        <label for="service_fee">Variable Service Fee: </label>
        <input type="text" name="service_fee" id="service_fee" class="amount" >
    </div>
    
    
    <div class="form-group">
        <label for="service_fee_vat">Service Fee VAT: </label>
        <input type="text" name="service_fee_vat" id="service_fee_vat" class="amount" placeholder="VAT" readonly>
    </div>
    
    


    <div class="form-group">
        <label for="additional_fee">Additional Fee: </label>
            <div class="flex">
            <input type="text" name="additional_fee" id="additional_fee" value="0.00" class="amount" >

            <label for="vat"></label>
            <label class="checkbox" style="padding: 0px;">    
                <input type="checkbox" name="vat" value="0" id="vat">
                <span class="check"></span><p>VAT</p>
            </label>
        </div>
    </div>
        

    <div class="form-group">
        <div class="summary_btn"><p>Summary</p></div>
    </div>
        
        
        <script>
            
            /**
            This script toggles the summary box on the /create and /update pages.
            The 
            */
        
        $(document).ready(function(){
            
            var summary_btn =  $('.summary_btn');
            var close_btn =  $('.summary_close_btn');
            var summary = $('.summary');
            
            summary.hide();
            
            summary_btn.click(function(){
                summary.slideToggle();
                summary_btn.slideToggle();
                
                
                
            });
            
            close_btn.click(function(){
                summary.slideToggle();
                summary_btn.slideToggle();
            });
        });
            
        </script>
        
        
    </form>
    </div>
    
    
    
    
    <div class="summary">
        <div class="summary_close_btn">&times;</div>
            <div class="summary_section">



                <h2>Summary</h2>

                <div class="row">
                    <div class="summary_header">
                        <p>Embassy Fee</p>
                    </div>
                    <div class="summary_value">
                        <p><span class="embassy_fee_summary summary">0.00</span></p>
                    </div>
                </div>

                <div class="row">
                    <div class="summary_header">
                        <p>Service Fee</p>
                    </div>
                    <div class="summary_value">
                        <p><span class="service_fee_summary summary">0.00</span></p>
                    </div>
                </div>

                <div class="row">
                    <div class="summary_header">
                        <p>VAT</p>
                    </div>
                    <div class="summary_value">
                        <p><span class="vat_summary summary">0.00</span></p>
                    </div>
                </div>

                <div class="row">
                    <div class="summary_header">
                        <p>Additional Fee</p>
                    </div>
                    <div class="summary_value">
                        <p><span class="additional_fee_summary summary">0.00</span></p>
                    </div>
                </div>

                <hr class="summary_hr" />

                <div class="row">
                    <div class="summary_header">
                        <p>Total</p>
                    </div>
                    <div class="summary_value">
                        <p><span class="total">0.00</span></p>
                    </div>
                </div>
            </div>
        
        
            <div class="wrapper_container">
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="submit" style="width: 100%">
                </div>
            </div>
        
        
        </div>
    
    
    
    
    
    

</div>
    
 
