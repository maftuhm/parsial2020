<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            </div>

        <footer>
            <p>&copy; Parsial 2020 | All Rights Reserved</p>
        </footer>
        <?php if ($show_alert != FALSE):?>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/sweetalert2/sweetalert2.min.js'); ?>"></script>
        <?php
        	$atts = array('icon' => 'success', 'title' => 'Berhasil !', 'text' => 'anda berhasil mendaftar'); 
        	echo sweet_alert($atts);?>
        <?php endif;?>

    </body>
</html>