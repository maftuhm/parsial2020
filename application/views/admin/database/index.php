<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">xxx</h3>
                                </div>
                                <div class="box-body">

<h2>Platform</h2>
<?php echo $platform; ?>

<h2>Version</h2>
<?php echo $version; ?>



<h2>List Tables</h2>
                                    <div class="scrolling-table" style="overflow: auto;white-space: nowrap;">
                                    <table class="table table-striped table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>name</th>
                                                <th>type</th>
                                                <th>max_length</th>
                                                <th>primary_key</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list_tables as $db):?>
                                            <tr class="info">
                                                <?php $length = count($this->db->field_data($db))+1;?>
                                                <th rowspan="<?php echo $length;?>"><strong><?php echo $db; ?></strong></th>
                                            </tr>
                                            <?php foreach ($this->db->field_data($db) as $field):?>
                                            <tr>
                                                <td><?php echo $field->name; ?></td>
                                                <td><?php echo $field->type; ?></td>
                                                <td><?php echo $field->max_length; ?></td>
                                                <td><?php echo $field->primary_key; ?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    </div>









                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
