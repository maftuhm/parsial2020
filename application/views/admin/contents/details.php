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
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tim Details</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        <?php
                                            foreach ($participant_data as $key => $value)
                                            {
                                                echo '<tr>';
                                                echo '<th>' . lang('contents_'.$key) . '</th>';
                                                echo '<td>:</td>';
                                                echo '<td>';
                                                if ($key == 'created_on'){echo date('D, d M Y H:i', $value);}
                                                else{echo $value;}
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Members Details</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <pre><?php //print_r($members_data)?></pre>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php //print_r($player);?></h3>
                                </div>
                                <div class="box-body">
                                    <table id="dataTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <?php foreach ($all_keys as $key => $value):?>
                                                <th><?php echo lang('contents_'.$value);?></th>
                                                <?php endforeach;?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;foreach ($members_data as $member => $value):?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <?php foreach ($members_keys as $key => $k):?>
                                                <td><?php echo $value[$k];?></td>
                                                <?php endforeach;?>
                                                
                                                <?php foreach ($media_keys as $key => $k):?>
                                                <td><img class="image-pa" src="<?php echo base_url('media/futsal/data/'.$value[$k]);?>"></td>
                                                <?php endforeach;?>
                                            </tr>
                                            <?php $i++;endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <?php foreach ($all_keys as $key => $value):?>
                                                <th><?php echo lang('contents_'.$value);?></th>
                                                <?php endforeach;?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
