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
                                    <h3 class="box-title">Details</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
                                            <p class="text-center"><strong>xxx</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
