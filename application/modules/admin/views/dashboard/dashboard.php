<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | Dashboard
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('admin/inc/stylesheet'); ?>
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
                    <?php  $data['pagename'] = "dashboard"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title ">
                                    Dashboard
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <!--Begin::Main Portlet-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-4">
                                <!--begin:: Widgets/Top Products-->
                                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                                    <div class="m-portlet__head" style="background: none !important; height: 5.1rem;">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    Users
                                                </h3>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="m-portlet__body">
                                        <!--begin::Widget5-->
                                        <div class="m-widget4">

                                            <div class="m-widget4__chart m-portlet-fit--sides m--margin-top-10 m--margin-top-20 " style="height:200px;">
                                                <canvas id="m_chart_trends_stats"></canvas>
                                            </div>
                                            <div class="m-widget4__item">
                                                <div class="m-widget4__img m-widget4__img--logo">
                                                    <i class="flaticon-list-2  m--font-success" style="font-size: 30px;"></i>
                                                </div>
                                                <div class="m-widget4__info">
                                                    <span class="m-widget4__title">
                                                        Active
                                                    </span>
                                                    <br>
                                                    <span class="m-widget4__sub">
                                                        Active Users
                                                    </span>
                                                </div>
                                                <span class="m-widget4__ext">
                                                    <span class="m-widget4__number m--font-success">
                                                        <?php echo $active_user; ?>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="m-widget4__item">
                                                <div class="m-widget4__img m-widget4__img--logo">
                                                    <i class="flaticon-danger   m--font-danger" style="font-size: 30px;"></i>
                                                </div>
                                                <div class="m-widget4__info">
                                                    <span class="m-widget4__title">
                                                        Inactive
                                                    </span>
                                                    <br>
                                                    <span class="m-widget4__sub">
                                                        Inactive Users
                                                    </span>
                                                </div>
                                                <span class="m-widget4__ext">
                                                    <span class="m-widget4__number m--font-danger">
                                                        <?php echo $inactive_user; ?>
                                                    </span>
                                                </span>
                                            </div>
                                            
                                            <div class="m-widget4__item">
                                                <div class="m-widget4__img m-widget4__img--logo">
                                                    <i class="flaticon-user  m--font-brand" style="font-size: 30px;"></i>
                                                </div>
                                                <div class="m-widget4__info">
                                                    <span class="m-widget4__title">
                                                        Total
                                                    </span>
                                                    <br>
                                                    <span class="m-widget4__sub">
                                                        Total Users
                                                    </span>
                                                </div>
                                                <span class="m-widget4__ext">
                                                    <span class="m-widget4__number m--font-brand">
                                                        <?php echo $this->common->company_count(); ?>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Widget 5-->
                                    </div>
                                </div>
                                <!--end:: Widgets/Top Products-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin:: Widgets/Activity-->
                                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
                                    <div class="m-portlet__head"  style="background: none !important; height: 5.1rem;">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text m--font-light">
                                                    Merchants
                                                </h3>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-widget17">
                                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-brand">
                                                <div class="m-widget17__chart" style="height:320px;">
                                                    <canvas id="m_chart_activities"></canvas>
                                                </div>
                                            </div>
                                            <div class="m-widget17__stats">
                                                <div class="m-widget17__items m-widget17__items-col1">
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-list-2  m--font-success"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Active
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            <?php echo $active_merchant; ?> Active Merchants
                                                        </span>
                                                    </div>
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-exclamation-2  m--font-warning"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Not Verify
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            <?php echo $not_verify_merchant; ?> Not Verified Merchants
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="m-widget17__items m-widget17__items-col2">
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-danger   m--font-danger"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Inactive
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            <?php echo $inactive_merchant; ?> Inactive Merchants
                                                        </span>
                                                    </div>
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-users  m--font-brand"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Total
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            <?php /*echo $this->common->merchant_count();*/ ?> Merchants
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Activity-->
                            </div>
                        </div>    
                        <!--End::Main Portlet-->
                    </div>
                </div>
             </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('admin/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        
        <!--begin::Base Scripts -->
            <?php $this->load->view('admin/inc/scripts'); ?>
        <!--end::Base Scripts -->

        <script type="text/javascript">
            if (0 != $("#m_chart_trends_stats").length) {
                var e = document.getElementById("m_chart_trends_stats").getContext("2d"),
                    t = e.createLinearGradient(0, 0, 0, 240);
                t.addColorStop(0, Chart.helpers.color("#00c5dc").alpha(.7).rgbString()), t.addColorStop(1, Chart.helpers.color("#f2feff").alpha(0).rgbString());
                var a = {
                    type: "line",
                    data: {
                        labels: <?php echo json_encode($months); ?>,
                        datasets: [{
                            label: "Users",
                            backgroundColor: t,
                            borderColor: "#0dc8de",
                            pointBackgroundColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(),
                            pointBorderColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(),
                            pointHoverBackgroundColor: mUtil.getColor("danger"),
                            pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.2).rgbString(),
                            data: <?php echo json_encode($month_vise_user); ?>
                        }]
                    },
                    options: {
                        title: {
                            display: !1
                        },
                        tooltips: {
                            intersect: !1,
                            mode: "nearest",
                            xPadding: 10,
                            yPadding: 10,
                            caretPadding: 10
                        },
                        legend: {
                            display: !1
                        },
                        responsive: !0,
                        maintainAspectRatio: !1,
                        hover: {
                            mode: "index"
                        },
                        scales: {
                            xAxes: [{
                                display: !1,
                                gridLines: !1,
                                scaleLabel: {
                                    display: !0,
                                    labelString: "Month"
                                }
                            }],
                            yAxes: [{
                                display: !1,
                                gridLines: !1,
                                scaleLabel: {
                                    display: !0,
                                    labelString: "Value"
                                },
                                ticks: {
                                    beginAtZero: !0
                                }
                            }]
                        },
                        elements: {
                            line: {
                                tension: .19
                            },
                            point: {
                                radius: 4,
                                borderWidth: 12
                            }
                        },
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 5,
                                bottom: 0
                            }
                        }
                    }
                };
                new Chart(e, a)
            }
            if (0 != $("#m_chart_activities").length) {
                var e = document.getElementById("m_chart_activities").getContext("2d"),
                    t = e.createLinearGradient(0, 0, 0, 240);
                t.addColorStop(0, Chart.helpers.color("#e14c86").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#e14c86").alpha(.3).rgbString());
                var a = {
                    type: "line",
                    data: {
                        labels: <?php echo json_encode($months); ?>,
                        datasets: [{
                            label: "Merchants",
                            backgroundColor: t,
                            borderColor: "#e13a58",
                            pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                            pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                            pointHoverBackgroundColor: mUtil.getColor("light"),
                            pointHoverBorderColor: Chart.helpers.color("#ffffff").alpha(.1).rgbString(),
                            data: <?php echo json_encode($month_vise_merchant); ?>
                        }]
                    },
                    options: {
                        title: {
                            display: !1
                        },
                        tooltips: {
                            mode: "nearest",
                            intersect: !1,
                            position: "nearest",
                            xPadding: 10,
                            yPadding: 10,
                            caretPadding: 10
                        },
                        legend: {
                            display: !1
                        },
                        responsive: !0,
                        maintainAspectRatio: !1,
                        scales: {
                            xAxes: [{
                                display: !1,
                                gridLines: !1,
                                scaleLabel: {
                                    display: !0,
                                    labelString: "Month"
                                }
                            }],
                            yAxes: [{
                                display: !1,
                                gridLines: !1,
                                scaleLabel: {
                                    display: !0,
                                    labelString: "Value"
                                },
                                ticks: {
                                    beginAtZero: !0
                                }
                            }]
                        },
                        elements: {
                            line: {
                                tension: 1e-7
                            },
                            point: {
                                radius: 4,
                                borderWidth: 12
                            }
                        },
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 10,
                                bottom: 0
                            }
                        }
                    }
                };
                new Chart(e, a)
            }
        </script>


    </body>
    <!-- end::Body -->
</html>
