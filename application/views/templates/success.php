<div class="success-body">
    
    <div class="container">
        
        <h1 class="success-heading">Success!</h1>
    
        <?php echo '<p class="success-message">' . $message . '</p>'; ?>
        
        <p><em><?php echo $this->db->last_query(); ?></em></p>
        
        <a href="/"><button class="focus-btn btn home-btn">Dashboard Home</button></a>
        
        <a href="/create"><button class="unfocus-btn btn">Add a new visa</button></a>
        
    </div>
 

</div>