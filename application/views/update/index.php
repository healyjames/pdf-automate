<div class="body-container">

<div class="error-msg">
<?php echo validation_errors(); //This function will return any error messages sent back by the validator. ?>
</div>
    
<?php 

$formClass = array('class' => 'visa-form');
echo form_open('update/' . $id, $formClass); 

?>
    <div class="wrapper">
        <h2><?php echo $title; ?></h2>
        
        <h1><?php echo $visa['country']; ?> <?php echo $visa['purpose']; ?> <?php echo $visa['visatype']; ?></h1>
        
        <input  name="country" id="country" style="display: none" value="<?php echo $visa['country_id']; ?>">
        <input  name="purpose" id="purpose" style="display: none" value="<?php echo $visa['purpose']; ?>">
        <input  name="visatype" id="visatype" style="display: none" value="<?php echo $visa['visatype']; ?>">
        
        
        
        <div class="form-group">
            <label for="processingtime_tvc">Processing time (TVC): </label>
            <div class="flex">
                <input type="text" name="processingtime_tvc" id="processingtime_tvc" value="<?php echo $visa['processingtime_tvc'] ?>">
                
                <select name="processingtime_tvc_format" id="processingtime_tvc_format" class="format">
                    
                <?php foreach($formats as $format){ 

                    if($visa['processingtime_tvc_format_id'] === $format['format_id']){

                        echo '<option value="' . $format['format_id'] . '" selected>' . $format['format_type'] . '</option>';

                    }else {  

                        echo '<option value="' . $format['format_id'] . '">' . $format['format_type'] . '</option>';

                        }
                    }    
                ?>
                    
                    
                </select>
                
            </div>
        </div>
        
        <div class="form-group">
            <label for="processingtime_embassy">Processing time (Embassy): </label>
            <select name="processingtime_embassy" id="processingtime_embassy">
                <option value="<?php echo $visa['processingtime_embassy'] ?>"><?php echo $visa['processingtime_embassy'] ?></option>
                <option value="Standard">Standard</option>
                <option value="Express">Express</option>
                <option value="Same Day">Same Day</option>
                <option value="Next Working Day">Next Working Day</option>
                <option value="Urgent">Urgent</option>  
            </select>
        </div>
        
        <div class="form-group">
            <label for="validity">Validity: </label>
            <div class="flex">
        
                <input type="text" name="validity" id="validity" value="<?php echo $visa['validity'] ?>">
                
                <select name="validity_format" id="validity_format" class="format">
                    
                <?php foreach($formats as $format){ 

                    if($visa['validity_format_id'] === $format['format_id']){

                        echo '<option value="' . $format['format_id'] . '" selected>' . $format['format_type'] . '</option>';

                    }else {  

                        echo '<option value="' . $format['format_id'] . '">' . $format['format_type'] . '</option>';

                        }
                    }    
                ?>
                    
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="stay">Maximum length of stay: </label>
            <div class="flex">
        
                <input type="text" name="stay" id="stay" value="<?php echo $visa['stay'] ?>">

                <select name="stay_format" id="stay_format" class="format">
                    
                    
                <?php foreach($formats as $format){ 

                    if($visa['stay_format_id'] === $format['format_id']){

                        echo '<option value="' . $format['format_id'] . '" selected>' . $format['format_type'] . '</option>';

                    }else {  

                        echo '<option value="' . $format['format_id'] . '">' . $format['format_type'] . '</option>';

                        }
                    }    
                ?>
                
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="entries">Number of entries: </label>
            <select name="entries" id="entries" value="<?php echo $visa['entries'] ?>">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Multiple">Multiple</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="embassy_fee">Embassy Fee: </label>
            <input type="text" name="embassy_fee" id="embassy_fee" class="amount" value="<?php echo $visa['embassy_fee'] ?>">
        </div>
        
        <div class="form-group">
            <label for="band">Price Band: </label>
            <div class="flex">
            <select type="text" name="band_list" id="band_list" class="band">
                <option style="display:none"> </option>
                
        <?php foreach($price_bands as $band){ 
    
            if($band['price_band_id'] === $visa['price_band_id']){

                echo '<option value="' . $band['price_band_id'] . '" selected>' . $band['price_band_id'] . '</option>';

            }else {

                echo '<option value="' . $band['price_band_id'] . '">' . $band['price_band_id'] . '</option>';

            }
        }



        ?>
                
                
                
                </select>
                <input type="text" name="band" id="band" class="amount" value="<?php echo $visa['price']; ?>" readonly>
                

                <script src="<?php echo base_url(); ?>assets/custom-scripts/price-bands.js"></script>
                <script src="<?php echo base_url(); ?>assets/custom-scripts/auto-selector.js"></script>
            
                
            </div>
        </div>
        
        <div class="form-group servicefee">
            <label for="service_fee">Variable Service Fee: </label>
            <input type="text" name="service_fee" id="service_fee" class="amount" value="<?php echo $visa['variable_service_fee'] ?>">
            <script src="<?php echo base_url(); ?>assets/custom-scripts/show-hide.js"></script>
        </div>
        
        

        <div class="form-group">
        <label for="additional_fee">Additional Fee: </label>
        <div class="flex">
        <input type="text" name="additional_fee" id="additional_fee" class="amount" value="<?php                   
                                                                                         
                                                                                         
            if($visa['additional_fee_vat'] === '1'){
                
                echo $visa['additional_fee'] * $vat_rate;
                
            }else {
                
                echo $visa['additional_fee'];
                
            }
                                                                                         

        ?>">
            
            
        
        <label for="vat"></label>
        <label class="checkbox" style="padding: 0px;">    
            
            
            <?php
            
                if($visa['additional_fee_vat'] === '1'){
                    
                    echo '<input type="checkbox" name="vat" value="' . $visa['additional_fee_vat'] . '" id="vat" checked>';
                    
                }else {
                    
                    echo '<input type="checkbox" name="vat" value="' . $visa['additional_fee_vat'] . '" id="vat">';
                    
                }

            ?>
            
            
            
            <span class="check"></span><p>VAT</p>
        </label>
            
            
            
            
            
            
            
        <script src="<?php echo base_url(); ?>assets/custom-scripts/checked-value.js"></script>
        
            
        <script src="<?php echo base_url(); ?>assets/custom-scripts/calculate-vat.js"></script>
    </div>
        
        <div class="form-group">
            <script src="<?php echo base_url(); ?>assets/custom-scripts/calculate-total.js"></script>
            <p>Total: £<span class="total"><?php echo $visa['embassy_fee'] + $visa['variable_service_fee'] + $visa['additional_fee'] + $visa['price'];  ?></span></p>
        
            <input type="submit" name="submit" value="Submit" class="submit">
            
        </div>
    </form>
</div>


