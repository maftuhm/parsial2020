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

        <script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url($plugins_dir . '/datatables.net/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/datatables.net-bs/dataTables.bootstrap.min.js');?>"></script>

<?php if ($mobile == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php else: ?>
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
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
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
            });
        </script>
    </body>
</html>