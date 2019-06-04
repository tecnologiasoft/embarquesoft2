<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | Edit Merchant Store
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('admin/inc/stylesheet'); ?>

        <!-- link for material file upload -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <!-- BEGIN: Header -->
            <?php   $this->load->view('admin/inc/header');  ?>
            <!-- END: Header -->

            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                    <?php  $data['pagename'] = "merchantstore"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Merchant Store Details
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?php echo site_url();?>admin/dashboard" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?php echo site_url();?>admin/merchantstore/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Merchant Store List
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Merchant Store Details
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <!--begin::Form-->
                        <?php 
                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
                            echo form_open('admin/merchantstore/edit/',$form_data); 
                        ?>
                            <input type="hidden" name="merchantstore_id" value="<?php if(isset($result['id'])) echo base64_encode($result['id']); else echo set_value('id') ?>">

                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <!--begin::Portlet-->
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="la la-gear"></i>
                                                    </span>
                                                    <h3 class="m-portlet__head-text">
                                                        Edit Merchant Store Personal Details
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet__body">
                                            <div class="m-form__content">
                                                <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
                                                    <div class="m-alert__icon">
                                                        <i class="la la-warning"></i>
                                                    </div>
                                                    <div class="m-alert__text">
                                                        Oh snap! Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="m-alert__close">
                                                        <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-card-profile">
                                                <div class="m-card-profile__pic">
                                                    <div class="m-card-profile__pic-wrapper">
                                                        <img src="<?php if(isset($result['store_logo']) && $result['store_logo']!='') echo $result['store_logo']; ?>" alt=""/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="merchant_id">
                                                    Select Merchant *
                                                </label>
                                                <select class="form-control m-input" name="merchant_id" id="merchant_id">
                                                    <?php if(!empty($merchant_list)) { 
                                                    foreach ($merchant_list as $row){  ?>
                                                        <option value="<?php echo $row['id']; ?>" <?php echo set_select('merchant_id',$row['id']); if(isset($result['merchant_id']) && $result['merchant_id']==$row['id']) echo "selected"; else if(set_value('merchant_id')==$row['id']) echo "selected"; ?> > <?php echo $row['fname'].' '.$row['lname']; ?> </option>
                                                    <?php } } ?>
                                                </select>
                                                <?php echo form_error('merchant_id'); ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="store_name">
                                                    Store Name *
                                                </label>
                                                <input type="text" class="form-control m-input" name="store_name" id="store_name" placeholder="Enter your store name" value="<?php if(isset($result['store_name'])) echo $result['store_name']; else echo set_value('store_name'); ?>" >
                                                <?php echo form_error('store_name'); ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="category_id">
                                                    Category *
                                                </label>
                                                <select class="form-control m-input" name="category_id" id="category_id">
                                                    <?php if(!empty($category_list)) { 
                                                    foreach ($category_list as $row){  ?>
                                                        <option value="<?php echo $row['id']; ?>" <?php echo set_select('category_id',$row['id']); if(isset($result['category_id']) && $result['category_id']==$row['id']) echo "selected"; else if(set_value('category_id')==$row['id']) echo "selected"; ?> > <?php echo $row['name']; ?> </option>
                                                    <?php } } ?>
                                                </select>
                                                <?php echo form_error('category_id'); ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="subcategory_id">
                                                    Category Type *
                                                </label>
                                                <select class="form-control m-input" name="subcategory_id" id="subcategory_id">
                                                    <option value="">Select Category Type</option>
                                                </select>
                                                <?php echo form_error('subcategory_id'); ?>
                                            </div>
                                            
                                            <div class="form-group m-form__group">
                                                <label for="contact_name">
                                                    Contact Name *
                                                </label>
                                                <input type="text" class="form-control m-input" name="contact_name" id="contact_name" placeholder="Enter your contact name" value="<?php if(isset($result['contact_name'])) echo $result['contact_name']; else echo set_value('contact_name'); ?>" >
                                                <?php echo form_error('contact_name'); ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="contact_phone">
                                                    Contact Phone *
                                                </label>
                                                <input type="text" class="form-control m-input" name="contact_phone" id="contact_phone" placeholder="Enter your contact phone" value="<?php if(isset($result['contact_phone'])) echo $result['contact_phone']; else echo set_value('contact_phone'); ?>" >
                                                <?php echo form_error('contact_phone'); ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="address">
                                                    Address *
                                                </label>
                                                <input type="text" class="form-control m-input" name="address" id="address" placeholder="Enter your address" value="<?php if(isset($result['address'])) echo $result['address']; else echo set_value('address'); ?>" >
                                                <?php echo form_error('address'); ?>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group m-form__group">
                                                        <label for="latitude">
                                                            Latitude *
                                                        </label>
                                                        <input type="text" class="form-control m-input" name="latitude" id="latitude" placeholder="Enter your latitude" value="<?php if(isset($result['latitude'])) echo $result['latitude']; else echo set_value('latitude'); ?>"  >
                                                        <?php echo form_error('latitude'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group m-form__group">
                                                        <label for="phone">
                                                            Longitude *
                                                        </label>
                                                        <input type="text" class="form-control m-input" name="longitude" id="longitude" placeholder="Enter your longitude" value="<?php if(isset($result['longitude'])) echo $result['longitude']; else echo set_value('longitude'); ?>" >
                                                        <?php echo form_error('longitude'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="website">
                                                    Website *
                                                </label>
                                                <input type="text" class="form-control m-input" name="website" id="website" placeholder="http://" value="<?php if(isset($result['website'])) echo $result['website']; else echo set_value('website'); ?>" >
                                                <?php echo form_error('website'); ?>
                                            </div>
                                            
                                            <div class="form-group m-form__group">
                                                <label for="about">
                                                    About *
                                                </label>
                                                <textarea class="form-control m-input" name="about" id="about" placeholder="Enter a about"><?php if(isset($result['about'])) echo $result['about']; else echo set_value('about'); ?></textarea>
                                                <?php echo form_error('about'); ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="store_logo">
                                                    Store Logo *
                                                </label>
                                                <input type="file" class="form-control m-input" name="store_logo" id="store_logo" accept="image/*" value="<?php echo set_value('store_logo'); ?>"  data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {file} for upload...">
                                                <img src="<?php if(isset($result['store_logo']) && $result['store_logo']!='') echo $result['store_logo']; ?>" width="100" height="100" alt=""/>
                                                <?php echo form_error('store_logo'); echo $error_msg1; ?>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="store_banner">
                                                    Store Banner *
                                                </label>
                                                <input type="file" class="form-control m-input" name="store_banner" id="store_banner" accept="image/*" value="<?php echo set_value('store_banner'); ?>"  data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {file} for upload...">
                                                <img src="<?php if(isset($result['store_banner']) && $result['store_banner']!='') echo $result['store_banner']; ?>" width="100" height="100" alt=""/>
                                                <?php echo form_error('store_banner'); echo $error_msg; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Portlet-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-7 ml-lg-auto m-form__actions">
                                                    <button type="submit" class="btn btn-success" value="update">
                                                        Save Changes
                                                    </button>
                                                    <a onclick="history.go(-1)" class="btn btn-secondary">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('admin/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        <!-- begin::Quick Sidebar -->
            <?php   $this->load->view('admin/inc/right-bar');  ?>
        <!-- end::Quick Sidebar -->
        
        <!-- begin::Quick Nav -->
        <?php   //$this->load->view('admin/inc/quick-nav');  ?>
        <!-- begin::Quick Nav -->
        <!--begin::Base Scripts -->
            <?php $this->load->view('admin/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script type="text/javascript">

        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: {
                    merchant_id: {
                        required: !0
                    },
                    store_name: {
                        required: !0
                    },
                    contact_name: {
                        required: !0,
                    },
                    // country_code: {
                    //     required: !0,
                    //     minlength: 2,
                    //     maxlength: 5
                    // },
                    contact_phone: {
                        required: !0,
                        digits: !0,
                        minlength: 8,
                        maxlength: 14
                    },
                    category_id: {
                        required: !0,
                    },
                    subcategory_id: {
                        required: !0,
                    },
                    address: {
                        required: !0,
                    },
                    website: {
                        required: !0,
                        url: !0,
                    },
                    about: {
                        required: !0,
                    }
                },
                invalidHandler: function(e, r) {
                    var i = $("#m_form_1_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                },
                submitHandler: function(e) {
                    $("#m_form_1_msg").hide();
                    return true;
                }
            })
        });
        $.validator.addMethod("pwcheckallowedchars", function (value) {
            if(value)
                return /^[a-zA-Z0-9!@#$^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value) // has only allowed chars letter
            else
                return true;
        }, "The password contains non-admitted characters");
        </script>

       <!-- script file for File input -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
        <!-- google maps api -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo PLACE_API_KEY;?>&libraries=places&sensor=false"></script>

        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">
        $(document).ready(function()
        {
            $("#store_logo").fileinput({
                'showUpload':false, 
                'previewFileType': "image",
                'browseClass': "btn btn-success",
                'browseLabel': "Pick Image",
                'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
                'removeClass': "btn btn-danger",
                'removeLabel': "Delete",
                'removeIcon': "<i class=\"la la-trash \"></i> ",
            });

            $("#store_banner").fileinput({
                'showUpload':false, 
                'previewFileType': "image",
                'browseClass': "btn btn-success",
                'browseLabel': "Pick Image",
                'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
                'removeClass': "btn btn-danger",
                'removeLabel': "Delete",
                'removeIcon': "<i class=\"la la-trash \"></i> ",
            });

            var category_id = '<?php if(isset($result['category_id'])) echo $result['category_id']; ?>';
            if(category_id)
                subsctegory(category_id);
            
            /*List all sub category by category id*/
            $("#category_id").change(function(){
                var category_id = $(this).val();
                if(category_id)
                    subsctegory(category_id);
                else
                    $('#subcategory_id').html('<option value="">Select Category Type</option>');
            }); 
            /*Listed all subcategory*/
            function subsctegory(category_id) {
                var subcategory_id = <?php if(isset($result['subcategory_id'])) echo json_encode($result['subcategory_id']); ?>;
                $.ajax({
                    type:"GET",
                    url:"<?php echo base_url()?>admin/merchantstore/subcategorylist/"+category_id,
                    success:function(res){
                        var jsonData = JSON.parse(res); 
                        var html = '<option value="">Select Category Type</option>';
                        if(jsonData)
                        {
                            for (var i = 0; i < jsonData.length; i++) 
                            {
                                if(jQuery.inArray(jsonData[i]['id'], subcategory_id)!='-1')
                                    html += '<option value = "'+jsonData[i]['id']+'" selected>'+jsonData[i]['name']+'</option>';
                                else
                                    html += '<option value = "'+jsonData[i]['id']+'">'+jsonData[i]['name']+'</option>';
                            } 
                        }
                        html += '</select>';

                        $('#subcategory_id').html(html);
                    }
                });
            }
            $("#address").focusout(function() {
                if($("#address").val() == '')
                {
                    $("#latitude").val('');
                    $("#longitude").val('');    
                }
            });
            /*geocomplete*/
            $("#address").geocomplete().bind("geocode:result", function(event, result){
                $("#latitude").val(result.geometry.location.lat().toFixed(8));
                $("#longitude").val(result.geometry.location.lng().toFixed(8));
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
