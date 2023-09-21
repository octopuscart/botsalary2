<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE CSS STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />

<!-- begin #content -->
<!-- begin #content -->
<div id="content" class="content content-full-width">

    <h1 class="page-header">
        Website Page
        <small></small>

        <?php if ($operation == "edit") { ?>
            <a href="<?php echo SITE_URL . "" . $pageobj["uri"] ?>" class="btn btn-primary" target="_block">View Page</a>
        <?php } ?>
    </h1>

    <!-- begin vertical-box -->
    <div class="vertical-box">
        <!-- begin vertical-box-column -->

        <!-- end vertical-box-column -->
        <!-- begin vertical-box-column -->
        <div class="vertical-box-column">

            <!-- begin wrapper -->
            <div class="wrapper ">
                <div class="p-30  bg-white">

                    <!-- begin email form -->
                    <form action="" method="post" class="row" >
                        <!-- begin email to -->


                        <!--tags-->
                        <label class="control-label"> Title</label>
                        <div class="m-b-15">
                            <input  class="form-control "   name="title" required="" value="<?php echo $pageobj["title"]; ?>"/>
                        </div>
                        <br/>

                        <?php if ($operation == "create") { ?>
                            <!--tags-->
                            <label class="control-label"> URI (Page Link Suffix)</label>
                            <div class="m-b-15">
                                <input  class="form-control "   name="uriname" required="" value="<?php echo $pageobj["uri"]; ?>"/>
                            </div>
                            <br/>
                            <!-- begin email content -->

                            <!--tags-->
                            <label class="control-label"> Page Type</label>
                            <div class="m-b-15">
                                <select  class="form-control "   name="page_type" required="" >
                                    <?php
                                    $options = array("main" => "Main Page", "sidebar" => "Side Bar Component");
                                    foreach ($options as $key => $value) {
                                        $selected = $value == $pageobj["uri"] ? "selected" : "";
                                        echo "<option $selected value='$key'>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <br/>
                            <!-- begin email content -->
                        <?php } ?>
                        <div class="m-b-15 ">

                            <label class="control-label">Content:</label>
                            <textarea class=" form-control " novalidate name="content" ><?php echo $pageobj["content"]; ?></textarea>

                        </div>
                        <div class="m-b-15 col-md-12">
                            <!-- end email content -->
                            <button type="submit" name="update_data" class="btn btn-primary p-l-40 p-r-40">Save Page</button></div>
                    </form>
                    <!-- end email form -->
                </div>
            </div>
            <!-- end wrapper -->
        </div>
        <!-- end vertical-box-column -->
    </div>
   
    <!-- end vertical-box -->
</div>
<!-- end #content -->


<?php
$this->load->view('layout/footer');
?>



<script>



</script>

