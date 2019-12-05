<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            </div>

        <footer>
            <p>&copy; Parsial 2020 | All Rights Reserved</p>
        </footer>
		
		<!-- The Modal -->
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h2>Modal Header</h2>
				</div>
				<div class="modal-body">
				<p>Some text in the Modal Body</p>
				<p>Some other text...</p>
				</div>
				<div class="modal-footer">
					<h3>Modal Footer</h3>
				</div>
			</div>

		</div>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url($templates_dir . '/js/form-script.js'); ?>"></script>
		<script type="text/javascript">swal("Good job!", "You clicked the button!", "success");</script>
    </body>
</html>