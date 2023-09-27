<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>NGOAB</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/owlcarousel.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/rating.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>
<body>
<!-- Loader starts-->
<?php include 'loader.php'; ?>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php include 'top_header.php'; ?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <?php include 'left_header.php'; ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Branch</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Nothi List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5>ডাক প্রেরণ করুন</h5>
                            </div>
                            <form class="form theme-form">
                                <div class="card-body">
                                    <h5>সিধান্তঃ বিধি মোতাবেক বাবস্থা নিন।</h5>
                                    <div class="nothi_header_box">
                                        <span>সিধান্ত নিন</span>
                                    </div>
                                    <div class="form-group mt-3 m-checkbox-inline mb-0 custom-radio-ml">
                                        <div class="radio radio-primary">
                                            <input id="radioinline1" type="radio" name="radio1" value="option1">
                                            <label class="mb-0" for="radioinline1">বিধি মোতাবেক বাবস্থা নিন</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input id="radioinline2" type="radio" name="radio1" value="option1">
                                            <label class="mb-0" for="radioinline2">নথিতে উপস্থাপন করুন</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input id="radioinline3" type="radio" name="radio1" value="option1">
                                            <label class="mb-0" for="radioinline3">নথিজাত করুন</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input id="radioinline4" type="radio" name="radio1" value="option1">
                                            <label class="mb-0" for="radioinline4">সিধান্ত নিজে নিন</label>
                                        </div>
                                    </div>
                                    <select class="form-select digits mt-3" id="exampleFormControlSelect9">
                                        <option>দেখলাম কাজ শুরু হচ্ছে</option>
                                        <option>পেশ করুন</option>
                                        <option>তদন্ত পূর্বক প্রতিবেদন দিবেন</option>
                                        <option>দেখলাম পেশ করুন</option>
                                        <option>নথিজাত করুন</option>
                                    </select>
                                    <div class="nothi_header_box">
                                        <span>বিধি মোতাবেক ব্যবস্থা নিন</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                       for="exampleInputPassword21">অগ্রাধিকার</label>
                                                <select class="form-select digits" id="exampleFormControlSelect9">
                                                    <option>সর্বচ্চ অগ্রাধিকার</option>
                                                    <option>অবিলম্বে</option>
                                                    <option>জরুরী</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputPassword21">গোপনীয়তা</label>
                                                <select class="form-select digits" id="exampleFormControlSelect9">
                                                    <option>গোপনীয়তা বাছাই করুন</option>
                                                    <option>অতি গোপনীয়তা</option>
                                                    <option>বিশেষ গোপনীয়</option>
                                                    <option>গোপনীয়</option>
                                                    <option>সিমিত</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nothi_header_box">
                                        <span>বিধি মোতাবেক ব্যবস্থা নিন</span>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-row-reverse">
                                                <button class="btn btn-outline-success me-2" type="button"
                                                        onclick="location.href = 'recipient_list.php';"><i
                                                            class="fa fa-plus"></i> নতুন
                                                    সিল বানান
                                                </button>
                                            </div>
                                            <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active" id="icon-home-tab"
                                                                        data-bs-toggle="tab" href="#icon-home1"
                                                                        role="tab" aria-controls="icon-home"
                                                                        aria-selected="true"><i
                                                                class="icofont icofont-ui-home"></i>নিজ অফিস</a></li>
                                            </ul>
                                            <div class="tab-content" id="icon-tabContent">
                                                <div class="tab-pane fade show active" id="icon-home1" role="tabpanel"
                                                     aria-labelledby="icon-home-tab">
                                                    <table class="table table-bordered mt-3">
                                                        <tr>
                                                            <th>
                                                                <button class="btn btn-outline-success"><i
                                                                            class="fa fa-plus"></i></button>
                                                            </th>
                                                            <th>পদবী</th>
                                                            <th>নাম</th>
                                                            <th>মূল-প্রাপক</th>
                                                            <th>কার্যার্থে অনুলিপি</th>
                                                            <th>জ্ঞাতার্থে অনুলিপি</th>
                                                            <th>দৃষ্টি আকর্ষণ</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <button class="btn btn-outline-success"><i
                                                                                class="fa fa-trash"></i></button>
                                                                </div>
                                                            </td>
                                                            <td>মহাপরিচালক, মহাপরিচালক মহোদয়ের শাখা, এঞ্জিও বিশয়ক
                                                                ব্যুরো
                                                            </td>
                                                            <td>শেখ মোঃ মনিরুজ্জামান</td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div>
                                                                        <div class="md-radio">
                                                                            <input id="5" type="radio" name="">
                                                                            <label for="5"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="custom_checkbox">
                                                                        <input id="check" class="custom_check"
                                                                               type="checkbox"/>
                                                                        <label for="check" style="--d: 30px">
                                                                            <svg viewBox="0,0,50,50">
                                                                                <path d="M5 30 L 20 45 L 45 5"></path>
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="custom_checkbox">
                                                                        <input id="check1" class="custom_check"
                                                                               type="checkbox"/>
                                                                        <label for="check1" style="--d: 30px">
                                                                            <svg viewBox="0,0,50,50">
                                                                                <path d="M5 30 L 20 45 L 45 5"></path>
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="custom_checkbox">
                                                                        <input id="check2" class="custom_check"
                                                                               type="checkbox"/>
                                                                        <label for="check2" style="--d: 30px">
                                                                            <svg viewBox="0,0,50,50">
                                                                                <path d="M5 30 L 20 45 L 45 5"></path>
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <button class="btn btn-outline-success"><i
                                                                                class="fa fa-trash"></i></button>
                                                                </div>
                                                            </td>
                                                            <td>মহাপরিচালক, মহাপরিচালক মহোদয়ের শাখা, এঞ্জিও বিশয়ক
                                                                ব্যুরো
                                                            </td>
                                                            <td>শেখ মোঃ মনিরুজ্জামান</td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div>
                                                                        <div class="md-radio">
                                                                            <input id="1" type="radio" name="">
                                                                            <label for="1"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="custom_checkbox">
                                                                        <input id="check3" class="custom_check"
                                                                               type="checkbox"/>
                                                                        <label for="check3" style="--d: 30px">
                                                                            <svg viewBox="0,0,50,50">
                                                                                <path d="M5 30 L 20 45 L 45 5"></path>
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="custom_checkbox">
                                                                        <input id="check4" class="custom_check"
                                                                               type="checkbox"/>
                                                                        <label for="check4" style="--d: 30px">
                                                                            <svg viewBox="0,0,50,50">
                                                                                <path d="M5 30 L 20 45 L 45 5"></path>
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="custom_checkbox">
                                                                        <input id="check5" class="custom_check"
                                                                               type="checkbox"/>
                                                                        <label for="check5" style="--d: 30px">
                                                                            <svg viewBox="0,0,50,50">
                                                                                <path d="M5 30 L 20 45 L 45 5"></path>
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nothi_header_box">
                                        <span>সিদ্ধান্ত, ফাইল , স্বাক্ষরকারী তালিকা </span>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-row-reverse">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-original-title="test" data-bs-target="#exampleModal"
                                                        data-bs-original-title="" title="">
                                                    <i class="fa fa-plus"></i>
                                                    স্বাক্ষরকারী যুক্ত করুন
                                                </button>

                                                <div class="modal fade bd-example-modal-lg" id="exampleModal"
                                                     tabindex="-1" aria-labelledby="exampleModalLabel"
                                                     style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg"
                                                         role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    স্বাক্ষরকারী যুক্ত করুন </h5>
                                                                <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal" aria-label="Close"
                                                                        data-bs-original-title="" title=""></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <div class="h-100 scroller">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th>পদবী</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><input type="checkbox"
                                                                                                       name="name1"/>&nbsp;
                                                                                            </td>
                                                                                            <td>শেখ মোঃ মনিরুজ্জামান,
                                                                                                মহাপরিচালক, মহাপরিচালক
                                                                                                মহোদয়ের শাখা, এঞ্জিও
                                                                                                বিশয়ক ব্যুরো
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                        data-bs-original-title="" title="">Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 mb-2">
                                                <h5>স্বাক্ষরকারী ব্যাক্তি</h5>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th></th>
                                                        <th>নাম</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-outline-success"><i
                                                                            class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                        <td style="width:80%">
                                                            শেখ মোঃ মনিরুজ্জামান,
                                                            মহাপরিচালক, মহাপরিচালক
                                                            মহোদয়ের শাখা, এঞ্জিও
                                                            বিশয়ক ব্যুরো
                                                        </td>
                                                        <td>
                                                            <span style="color: #7e8ba8"><i
                                                                        class="fa fa-check-square-o"></i> স্বাক্ষরকারী ব্যাক্তি</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-outline-success"><i
                                                                            class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                        <td style="width:80%">
                                                            শেখ মোঃ মনিরুজ্জামান,
                                                            মহাপরিচালক, মহাপরিচালক
                                                            মহোদয়ের শাখা, এঞ্জিও
                                                            বিশয়ক ব্যুরো
                                                        </td>
                                                        <td>
                                                            <span style="color: #7e8ba8"><i
                                                                        class="fa fa-check-square-o"></i> স্বাক্ষরকারী ব্যাক্তি</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-outline-success"><i
                                                                            class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                        <td style="width:80%">
                                                            শেখ মোঃ মনিরুজ্জামান,
                                                            মহাপরিচালক, মহাপরিচালক
                                                            মহোদয়ের শাখা, এঞ্জিও
                                                            বিশয়ক ব্যুরো
                                                        </td>
                                                        <td>
                                                            <span style="color: #7e8ba8"><i
                                                                        class="fa fa-check-square-o"></i> স্বাক্ষরকারী ব্যাক্তি</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-outline-success"><i
                                                                            class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                        <td style="width:80%">
                                                            শেখ মোঃ মনিরুজ্জামান,
                                                            মহাপরিচালক, মহাপরিচালক
                                                            মহোদয়ের শাখা, এঞ্জিও
                                                            বিশয়ক ব্যুরো
                                                        </td>
                                                        <td>
                                                            <span style="color: #7e8ba8"><i
                                                                        class="fa fa-check-square-o"></i> স্বাক্ষরকারী ব্যাক্তি</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="">Decision/সিধান্ত</label>
                                                            <input class="form-control" id=""
                                                                   type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="">File/ফাইল
                                                                আপলোড</label>
                                                            <input class="form-control" id=""
                                                                   type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row-reverse">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fa fa-send"></i>
                                                    প্রেরন
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php include 'footer.php'; ?>
    </div>
</div>


<!-- latest jquery-->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>
<script src="../assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="../assets/js/bootstrap/popper.min.js"></script>
<script src="../assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/rating/jquery.barrating.js"></script>
<script src="../assets/js/rating/rating-script.js"></script>
<script src="../assets/js/owlcarousel/owl.carousel.js"></script>
<script src="../assets/js/ecommerce.js"></script>
<script src="../assets/js/product-list-custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="../assets/js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->
</body>
</html>