
<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/treejs/themes/default/style.min.css">
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/treejs/themes/default/style.min.css">

<script src="<?php echo base_url(); ?>assets/treejs/jstree.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"  />

<link href="<?php echo base_url(); ?>assets/plugins/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<style>
    .product_image{
        height: 200px!important;
    }
    .product_image_back{
        background-size: contain!important;
        background-repeat: no-repeat!important;
        height: 200px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }
    .primarytext{
        font-size: 15px;
    }
    .pnlnotetable{
        margin: 0px;

    }
    .pnlnotetable .headtdleft{
        padding-left: 70px;
        width:300px;
    }
</style>
<!-- Main content -->
<section class="content" ng-controller="pnlControllerEdit">
    <div class="">
        <div class="well well-sm">
            <form action="" method="get">
                <div class="form-group form-group-bg  row form-inline">
                    <label class="form-label col-form-label col-lg-2"><b>Financial Report</b><br/><small>Click on Calendar Icon</small></label>
                    <div class="col-lg-4">
                        <div class="input-group date" >
                            <select class="form-control" name="startYear">
                                <?php
                                
                                for ($yr = 2021; $yr <= START_YEAR; $yr++) {
                                    $sYear = $yr;
                                    $eYear = $yr + 1;
                              
                                    ?>
                                <option value="<?php echo $sYear;?>" <?php echo $sYear == $startYear ?'selected':'' ?>><?php echo $sYear;?>-<?php echo $eYear;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-success" type="submit" name="select_month" value="select_month">
                            <i class="fa fa-paragraph"></i>   GET REPORT
                        </button>

                        <button class="btn btn-success" type="button" onclick="printDiv('printArea')">
                            <i class="fa fa-print"></i>   PRINT REPORT
                        </button>

                        <a class="btn btn-success" href="<?php echo site_url("Salary/viewAnnualSalaryXls?startYear=$startYear") ?>">
                            <i class="fa fa-print"></i>   EXPORT XLS
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h3 class="panel-title"><?php echo $report_title; ?></h3>

            </div>

            <div class="panel-body " id='printArea'>
                <?php
                $this->load->view('Salary/salarylistReportAnnual', array("salary_report" => $salary_report, "salary_date_list" => $salary_date_list, "report_title" => $report_title));
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end col-6 -->





<script>

</script>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/table-manage-default.demo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/angular/accountController.js"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>
<?php
$this->load->view('layout/footer');
?> 


