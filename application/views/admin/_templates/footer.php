<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><?php echo lang('footer_version'); ?></b> Development
                </div>
                <strong>Developed by <a href="http://maftuhm.github.io" target="_blank">Maftuh Mashuri</a>. <?php if ($mobile == TRUE){ echo '<br>';} echo lang('footer_copyright'); ?> &copy; 2014-<?php echo date('Y'); ?> <a href="http://almsaeedstudio.com" target="_blank">Almsaeed Studio</a> &amp; <a href="https://domprojects.com" target="_blank">domProjects</a>. </strong> <?php echo lang('footer_all_rights_reserved'); ?>.
            </footer>
        </div>

        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/icheck/icheck.min.js'); ?>"></script>

<?php if ($mobile == TRUE): ?>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'mailbox' && $this->router->fetch_method() == 'compose'): ?>
		<script type="text/javascript" src="<?php echo base_url($plugins_dir . '/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
		<script type="text/javascript">$(function () {$("#compose-textarea").wysihtml5();});</script>
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script  type="text/javascript"src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' OR $this->router->fetch_class() == 'contents'): ?>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/datatables.net/jquery.dataTables.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/datatables.net-bs/dataTables.bootstrap.min.js');?>"></script>
        <script type="text/javascript">
            $(function () {
                $('#dataTable').DataTable({
                "scrollX"       : true,
                'paging'        : false,
                'lengthChange'  : true,
                'searching'     : false,
                'ordering'      : true,
                'info'          : true,
                'autoWidth'     : false
                })
				$('#modal-danger').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var url  = button.data('url')
					var name = button.data('name')
					var modal = $(this)
					var body = modal.find('.modal-body p').first()
					body.text(body.text() + name + '?')
					modal.find('.btn-delete').attr('href', url)
				})
                $('.members-details input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });

                //Enable check and uncheck all functionality
                $(".checkbox-toggle").click(function () {
                    var clicks = $(this).data('clicks');
                    if (clicks) {
                        //Uncheck all checkboxes
                        $(".members-details input[type='checkbox']").iCheck("uncheck");
                        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                    } else {
                        //Check all checkboxes
                        $(".members-details input[type='checkbox']").iCheck("check");
                        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                    }
                    $(this).data("clicks", !clicks);
                });
            });
        </script>
        <?php if ($mobile == FALSE):?>
	    <script type="text/javascript">
	            var action = '.actions';
	            $(action).removeClass('show-actions');
	            $('tr').hover(
	              function() {
	                $(this).find(action).addClass('show-actions');
	              },
	              function() {
	                $(this).find(action).removeClass('show-actions');
	              }
	            );
	    </script>
        <?php endif;?>
<?php endif; ?>
        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
    </body>
</html>