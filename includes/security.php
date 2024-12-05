<?php 


class Wedevs_Essential_Security_plugin{
public function __construct(){

    add_action( 'admin_menu', array( $this, 'wedevs_essentials_security_menu' ) );
}

public function wedevs_essentials_security_menu() {
    add_menu_page(
        __( 'Security'),
        __( 'Security' ),
        'manage_options',
        'wedevs-essential-security',
        array( $this, 'wedevs_essentials_security_page' )
    );
}

public function wedevs_essentials_security_page() {

    if(isset($_POST['submit'])){

        $this->validate();

        if(empty($this->error)){
            $this->save_data();
        }
        
    }

    ?>
    <h1>WordPress Security</h1>
    <form action="" method="post">
        <input type="hidden" name="page" value="wedevs-essential-security">
        <table class="form-table">

            <tbody>
                <tr>
                    <td>
                        <h2>name </h2>
                    </td>
                    <td>
                    <input name="ac_name" type="text" id="blogname" value="<?php echo isset($_POST['ac_name']) ? $_POST['ac_name'] : ''; ?>" class="regular-text">
                    <?php 
                    if(isset($this->error['ac_name'])):?>
                  <p>  <?php  echo '<span class="error">'.$this->error['ac_name'].'</span>'; ?></p>
                    <?php endif;
                    ?>
                    
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Email address </h2>
                    </td>
                    <td>
                    <input name="ac_email" type="text" id="blogname" value="<?php echo isset($_POST['ac_email']) ? $_POST['ac_email'] : ''; ?>" class="regular-text">
                    <?php 
                    if(isset($this->error['ac_email'])):?>
                  <p>  <?php  echo '<span class="error">'.$this->error['ac_email'].'</span>'; ?></p>
                    <?php endif;
                    ?>
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php 
}

/**
 * Summary of validate is here check the email address and password
 *
 * @return void
 */
private function validate(){
$this->error=array();

    if(isset($_POST['ac_email'])){

        if(empty($_POST['ac_email'])){
            $this->error['ac_email']='PLease enter your email address';
        }else{
            if(!filter_var($_POST['ac_email'],FILTER_VALIDATE_EMAIL)){
                $this->error['ac_email']='Please enter valid email address';
            }
        }

    }
}


private function save_data(){
    $email= sanitize_email($_POST['ac_email']);
    update_option('ac_email',$_POST['ac_email']);
}

}