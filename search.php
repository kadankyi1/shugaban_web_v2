<?php 

// CALLING CONFIG FILE
require_once("app/config.php");

// CALLING MODELS
include_once "app/Models/MessageModel.php";

//CALLING CONTROLLERS
include_once "app/Controllers/DatabaseController.php";
include_once "app/Controllers/QueryController.php";
include_once "app/Controllers/MessageController.php";


// MAKING INSTANCES OF MODELS
$messageModelObject = new Message();

// MAKING INSTANCES OF CONTROLLERS 
$queryController = new QueryController();
$messageController = new MessageController();

// OTHER VARIABLE AND OBJECTS
$mysqli = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);



// CREATING PREPARED STATEMENT QUERY OBJECT
$query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, cover, portrait, url FROM " . MOVIES_TABLE . " ORDER BY recommendation_date DESC LIMIT 4", 0, "", "");
if($query === false){
    $messageModelObject->error_exist = false;
    $messageModelObject->body = "Fetching last 3 movies failed";
    $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
}

// GETTING RESULTS
$query_results_array = $queryController->getQueryResults($query, array("id", "name", "cover", "portrait", "url"), 5, 2);


$page_title = "Search";
include('assets/inc/header.php');
?>



    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="bg-gray-1100 dark">
            <div class="container px-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb dark font-size-1">
                        <li class="breadcrumb-item"><a href="../home/index.html" class="text-gray-1300">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Movies</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-lg-auto d-none d-xl-block">
                        <div class="w-md-352rem space-bottom-2">
                            <div class="bg-gray-3100 px-3 py-4 mb-4">
                                <div class="mx-1 mb-1">
                                    <div class="mb-6">
                                        <!-- Categories -->
                                        <h6 class="font-size-22 font-weight-medium border-bottom border-gray-3700 pb-2 mb-5 text-white"> Categories</h6>
                                        <div class="row mb-4 pb-1">
                                            <div class="col-md">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="action">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="action">Action</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="adventures">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="adventures">Adventures</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="animation">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="animation">Animation</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="bio">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="bio">Biography</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="comedy">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="comedy">Comedy</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="crime">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="crime">Crime</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="doc">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="doc">Documentary</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="drama">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="drama">Drama</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="family">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="family">Family</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="fantasy">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="fantasy">Fantasy</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="history">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="history">History</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="horror">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="horror">Horror</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="music">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="music">Music</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="mystery">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="mystery">Mystery</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="romance">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="romance">Romance</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="sci">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="sci">Sci-Fi</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="sports">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="sports">Sports</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-1">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Checkboxes -->
                                                            <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="thriller">
                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="thriller">Thriller</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled d-flex mb-0">
                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-1">
                                                <a href="#">
                                                    <div class="d-flex flex-column">
                                                        <i class="far fa-window-maximize text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">4K ULTRA</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-1">
                                                <a href="#">
                                                    <div class="d-flex flex-column">
                                                        <i class="fas fa-chess-knight text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">BROTHER</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-1">
                                                <a href="#">
                                                    <div class="d-flex flex-column">
                                                        <i class="fab fa-teamspeak text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">DUBBING</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-0">
                                                <a href="#">
                                                    <div class="d-flex flex-column">
                                                        <i class="fas fa-chess-knight text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">HERO</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End Categories -->
                                    </div>
                                    <div class="mb-6 pb-1">
                                        <h6 class="font-size-22 text-white font-weight-medium border-bottom border-gray-3700 pb-2 mb-4">Movies by Year</h6>
                                        <ul class="list-unstyled d-flex flex-wrap mb-0">
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2020</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2019</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2018</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2017</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2016</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2015</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2014</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2013</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2012</a>
                                                </div>
                                            </li>
                                            <li class="pr-1 pb-1">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2011</a>
                                                </div>
                                            </li>
                                            <li class="pr-0 pb-0">
                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                    <a href="#" class="mx-1">2010</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mb-5">
                                        <h6 class="font-size-22 text-white font-weight-medium border-bottom border-gray-3700 pb-2 mb-3">Filter by Rating</h6>

                                        <a href="#">
                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                <span class="d-block text-primary">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <small class="text-gray-1300 font-size-15">(2)</small>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                <span class="d-block text-primary">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </span>
                                                <small class="text-gray-1300 font-size-15">(10)</small>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                <span class="d-block text-primary">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </span>
                                                <small class="text-gray-1300 font-size-15">(27)</small>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                <span class="d-block text-primary">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </span>
                                                <small class="text-gray-1300 font-size-15">(13)</small>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-0">
                                                <span class="d-block text-primary">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </span>
                                                <small class="text-gray-1300 font-size-15">(1)</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-3100 pt-5 pb-1 px-3">
                                <div class="mx-1">
                                    <!-- Nav -->
                                    <div class="border-bottom d-xl-flex pb-2d mb-2 align-items-center border-gray-3200">
                                        <h3 class="font-size-22 text-white mb-xl-0 font-weight-medium">
                                            Top 5 List
                                        </h3>
                                    </div>
                                    <!-- End Nav -->
                                    <div>
                                        <ol class="list-counter v1 list-unstyled">
                                            <li class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">
                                                <div class="">
                                                    <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1997</span>
                                                    <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v1.html" class="text-white">Delta Bravo</a></h6>
                                                    <a href="../single-movies/single-movies-v1.html" class="font-size-12">Action</a>
                                                </div>
                                            </li>
                                            <li class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">
                                                <div class="">
                                                    <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2020</span>
                                                    <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v1.html" class="text-white">Mad</a></h6>
                                                    <a href="../single-movies/single-movies-v1.html" class="font-size-12">Drama</a>
                                                </div>
                                            </li>
                                            <li class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">
                                                <div class="">
                                                    <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                    <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v1.html" class="text-white">Oh Lucy</a></h6>
                                                    <a href="../single-movies/single-movies-v1.html" class="font-size-12">Comedy, </a><a href="../single-movies/single-movies-v1.html" class="font-size-12">Adventure</a>
                                                </div>
                                            </li>
                                            <li class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">
                                                <div class="">
                                                    <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1998</span>
                                                    <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v1.html" class="text-white">Black Mirror</a></h6>
                                                    <a href="../single-movies/single-movies-v1.html" class="font-size-12">Comedy, </a><a href="../single-movies/single-movies-v1.html" class="font-size-12">Mystery</a>
                                                </div>
                                            </li>
                                            <li class="d-flex pl-5 py-2d align-items-center">
                                                <div class="">
                                                    <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                    <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v1.html" class="text-white">The Convenient Groom</a></h6>
                                                    <a href="../single-movies/single-movies-v1.html" class="font-size-12">Comedy, </a><a href="#" class="font-size-12">Adventure</a>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <section>
                            <div class="mb-4">
                                <div class="home-section mb-5">
                                    <header class="d-md-flex align-items-center justify-content-between mb-3 mb-lg-1 pb-2 w-100 border-bottom border-gray-3900">
                                        <h6 class="d-block position-relative font-size-24 font-weight-medium overflow-md-hidden m-0 text-white">Movies</h6>
                                    </header>
                                    <div class="d-xl-flex align-items-center justify-content-between">
                                        <div class="d-none d-xl-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                                            <div class="custom-control custom-checkbox pl-0">
                                                <input type="checkbox" class="custom-control-input" id="brand">
                                                <label class="custom-control-label custom-control-label-custom custom-control-label_custom  text-gray-3500 font-size-1 font-weight-normal font-secondary" for="brand">4k Ultra</label>
                                            </div>
                                            <div class="custom-control custom-checkbox ml-4 line-height-lg">
                                                <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                                <label class="custom-control-label custom-control-label-custom custom-control-label_custom  text-gray-3500 font-size-1 font-weight-normal font-secondary pl-1" for="brandAdidas">Brother</label>
                                            </div>
                                        </div>
                                        <div class="d-xl-flex align-items-center">
                                            <ul class="d-none d-xl-flex nav justify-content-center justify-content-md-start mr-md-4 mb-3 mb-md-0 tab-nav-shop" id="pills-tab" role="tablist">
                                                <li class="nav-item mr-3">
                                                    <a class="nav-link font-size-22 p-0 active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true">
                                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="15px"><path fill-rule="evenodd" fill="rgb(180, 187, 192)" d="M16.500,10.999 C15.671,10.999 15.000,10.327 15.000,9.500 C15.000,8.671 15.671,7.999 16.500,7.999 C17.328,7.999 18.000,8.671 18.000,9.500 C18.000,10.327 17.328,10.999 16.500,10.999 ZM16.500,6.999 C15.671,6.999 15.000,6.328 15.000,5.499 C15.000,4.671 15.671,3.999 16.500,3.999 C17.328,3.999 18.000,4.671 18.000,5.499 C18.000,6.328 17.328,6.999 16.500,6.999 ZM16.500,3.000 C15.671,3.000 15.000,2.328 15.000,1.499 C15.000,0.671 15.671,-0.001 16.500,-0.001 C17.328,-0.001 18.000,0.671 18.000,1.499 C18.000,2.328 17.328,3.000 16.500,3.000 ZM11.500,14.999 C10.672,14.999 10.000,14.328 10.000,13.499 C10.000,12.671 10.672,11.999 11.500,11.999 C12.328,11.999 13.000,12.671 13.000,13.499 C13.000,14.328 12.328,14.999 11.500,14.999 ZM11.500,10.999 C10.672,10.999 10.000,10.327 10.000,9.500 C10.000,8.671 10.672,7.999 11.500,7.999 C12.328,7.999 13.000,8.671 13.000,9.500 C13.000,10.327 12.328,10.999 11.500,10.999 ZM11.500,6.999 C10.672,6.999 10.000,6.328 10.000,5.499 C10.000,4.671 10.672,3.999 11.500,3.999 C12.328,3.999 13.000,4.671 13.000,5.499 C13.000,6.328 12.328,6.999 11.500,6.999 ZM11.500,3.000 C10.672,3.000 10.000,2.328 10.000,1.499 C10.000,0.671 10.672,-0.001 11.500,-0.001 C12.328,-0.001 13.000,0.671 13.000,1.499 C13.000,2.328 12.328,3.000 11.500,3.000 ZM6.500,14.999 C5.671,14.999 5.000,14.328 5.000,13.499 C5.000,12.671 5.671,11.999 6.500,11.999 C7.328,11.999 8.000,12.671 8.000,13.499 C8.000,14.328 7.328,14.999 6.500,14.999 ZM6.500,10.999 C5.671,10.999 5.000,10.327 5.000,9.500 C5.000,8.671 5.671,7.999 6.500,7.999 C7.328,7.999 8.000,8.671 8.000,9.500 C8.000,10.327 7.328,10.999 6.500,10.999 ZM6.500,6.999 C5.671,6.999 5.000,6.328 5.000,5.499 C5.000,4.671 5.671,3.999 6.500,3.999 C7.328,3.999 8.000,4.671 8.000,5.499 C8.000,6.328 7.328,6.999 6.500,6.999 ZM6.500,3.000 C5.671,3.000 5.000,2.328 5.000,1.499 C5.000,0.671 5.671,-0.001 6.500,-0.001 C7.328,-0.001 8.000,0.671 8.000,1.499 C8.000,2.328 7.328,3.000 6.500,3.000 ZM1.500,14.999 C0.671,14.999 -0.000,14.328 -0.000,13.499 C-0.000,12.671 0.671,11.999 1.500,11.999 C2.328,11.999 3.000,12.671 3.000,13.499 C3.000,14.328 2.328,14.999 1.500,14.999 ZM1.500,10.999 C0.671,10.999 -0.000,10.327 -0.000,9.500 C-0.000,8.671 0.671,7.999 1.500,7.999 C2.328,7.999 3.000,8.671 3.000,9.500 C3.000,10.327 2.328,10.999 1.500,10.999 ZM1.500,6.999 C0.671,6.999 -0.000,6.328 -0.000,5.499 C-0.000,4.671 0.671,3.999 1.500,3.999 C2.328,3.999 3.000,4.671 3.000,5.499 C3.000,6.328 2.328,6.999 1.500,6.999 ZM1.500,3.000 C0.671,3.000 -0.000,2.328 -0.000,1.499 C-0.000,0.671 0.671,-0.001 1.500,-0.001 C2.328,-0.001 3.000,0.671 3.000,1.499 C3.000,2.328 2.328,3.000 1.500,3.000 ZM16.500,11.999 C17.328,11.999 18.000,12.671 18.000,13.499 C18.000,14.328 17.328,14.999 16.500,14.999 C15.671,14.999 15.000,14.328 15.000,13.499 C15.000,12.671 15.671,11.999 16.500,11.999 Z"></path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item mr-3">
                                                    <a class="nav-link font-size-22 p-0" id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17px" height="15px"><path fill-rule="evenodd" fill="rgb(180, 187, 192)" d="M15.500,8.999 C14.671,8.999 14.000,8.328 14.000,7.499 C14.000,6.671 14.671,5.999 15.500,5.999 C16.328,5.999 17.000,6.671 17.000,7.499 C17.000,8.328 16.328,8.999 15.500,8.999 ZM15.500,2.999 C14.671,2.999 14.000,2.328 14.000,1.499 C14.000,0.671 14.671,-0.000 15.500,-0.000 C16.328,-0.000 17.000,0.671 17.000,1.499 C17.000,2.328 16.328,2.999 15.500,2.999 ZM8.500,14.999 C7.671,14.999 7.000,14.328 7.000,13.499 C7.000,12.671 7.671,11.999 8.500,11.999 C9.328,11.999 10.000,12.671 10.000,13.499 C10.000,14.328 9.328,14.999 8.500,14.999 ZM8.500,8.999 C7.671,8.999 7.000,8.328 7.000,7.499 C7.000,6.671 7.671,5.999 8.500,5.999 C9.328,5.999 10.000,6.671 10.000,7.499 C10.000,8.328 9.328,8.999 8.500,8.999 ZM8.500,2.999 C7.671,2.999 7.000,2.328 7.000,1.499 C7.000,0.671 7.671,-0.000 8.500,-0.000 C9.328,-0.000 10.000,0.671 10.000,1.499 C10.000,2.328 9.328,2.999 8.500,2.999 ZM1.500,14.999 C0.671,14.999 -0.000,14.328 -0.000,13.499 C-0.000,12.671 0.671,11.999 1.500,11.999 C2.328,11.999 3.000,12.671 3.000,13.499 C3.000,14.328 2.328,14.999 1.500,14.999 ZM1.500,8.999 C0.671,8.999 -0.000,8.328 -0.000,7.499 C-0.000,6.671 0.671,5.999 1.500,5.999 C2.328,5.999 3.000,6.671 3.000,7.499 C3.000,8.328 2.328,8.999 1.500,8.999 ZM1.500,2.999 C0.671,2.999 -0.000,2.328 -0.000,1.499 C-0.000,0.671 0.671,-0.000 1.500,-0.000 C2.328,-0.000 3.000,0.671 3.000,1.499 C3.000,2.328 2.328,2.999 1.500,2.999 ZM15.500,11.999 C16.328,11.999 17.000,12.671 17.000,13.499 C17.000,14.328 16.328,14.999 15.500,14.999 C14.671,14.999 14.000,14.328 14.000,13.499 C14.000,12.671 14.671,11.999 15.500,11.999 Z"></path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item mr-3">
                                                    <a class="nav-link font-size-22 p-0" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="false">
                                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="15px"><path fill-rule="evenodd" fill="rgb(180, 187, 192)" d="M5.000,13.999 L5.000,12.999 L18.000,12.999 L18.000,13.999 L5.000,13.999 ZM5.000,6.999 L18.000,6.999 L18.000,7.999 L5.000,7.999 L5.000,6.999 ZM5.000,0.999 L18.000,0.999 L18.000,1.999 L5.000,1.999 L5.000,0.999 ZM1.500,14.999 C0.671,14.999 -0.000,14.327 -0.000,13.499 C-0.000,12.671 0.671,11.999 1.500,11.999 C2.328,11.999 3.000,12.671 3.000,13.499 C3.000,14.327 2.328,14.999 1.500,14.999 ZM1.500,8.999 C0.671,8.999 -0.000,8.328 -0.000,7.499 C-0.000,6.671 0.671,5.999 1.500,5.999 C2.328,5.999 3.000,6.671 3.000,7.499 C3.000,8.328 2.328,8.999 1.500,8.999 ZM1.500,2.999 C0.671,2.999 -0.000,2.328 -0.000,1.499 C-0.000,0.671 0.671,-0.001 1.500,-0.001 C2.328,-0.001 3.000,0.671 3.000,1.499 C3.000,2.328 2.328,2.999 1.500,2.999 Z"></path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item mr-2">
                                                    <a class="nav-link font-size-22 p-0" id="pills-four-example1-tab" data-toggle="pill" href="#pills-four-example1" role="tab" aria-controls="pills-four-example1" aria-selected="false">
                                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="15px"><path fill-rule="evenodd" fill="rgb(180, 187, 192)" d="M5.000,13.999 L5.000,12.999 L18.000,12.999 L18.000,13.999 L5.000,13.999 ZM5.000,8.999 L18.000,8.999 L18.000,10.000 L5.000,10.000 L5.000,8.999 ZM5.000,4.999 L18.000,4.999 L18.000,5.999 L5.000,5.999 L5.000,4.999 ZM5.000,0.999 L18.000,0.999 L18.000,1.999 L5.000,1.999 L5.000,0.999 ZM1.500,14.999 C0.671,14.999 -0.000,14.327 -0.000,13.499 C-0.000,12.671 0.671,11.999 1.500,11.999 C2.328,11.999 3.000,12.671 3.000,13.499 C3.000,14.327 2.328,14.999 1.500,14.999 ZM1.500,10.999 C0.671,10.999 -0.000,10.328 -0.000,9.499 C-0.000,8.671 0.671,7.999 1.500,7.999 C2.328,7.999 3.000,8.671 3.000,9.499 C3.000,10.328 2.328,10.999 1.500,10.999 ZM1.500,6.999 C0.671,6.999 -0.000,6.328 -0.000,5.499 C-0.000,4.671 0.671,3.999 1.500,3.999 C2.328,3.999 3.000,4.671 3.000,5.499 C3.000,6.328 2.328,6.999 1.500,6.999 ZM1.500,2.999 C0.671,2.999 -0.000,2.328 -0.000,1.499 C-0.000,0.671 0.671,-0.001 1.500,-0.001 C2.328,-0.001 3.000,0.671 3.000,1.499 C3.000,2.328 2.328,2.999 1.500,2.999 Z"></path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-size-22 p-0 ml-2" id="pills-five-example1-tab" data-toggle="pill" href="#pills-five-example1" role="tab" aria-controls="pills-five-example1" aria-selected="false">
                                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17px" height="13px"><path fill-rule="evenodd" fill="rgb(180, 187, 192)" d="M-0.000,13.000 L-0.000,11.999 L17.000,11.999 L17.000,13.000 L-0.000,13.000 ZM-0.000,7.999 L17.000,7.999 L17.000,8.999 L-0.000,8.999 L-0.000,7.999 ZM-0.000,3.999 L17.000,3.999 L17.000,4.999 L-0.000,4.999 L-0.000,3.999 ZM-0.000,-0.001 L17.000,-0.001 L17.000,0.999 L-0.000,0.999 L-0.000,-0.001 Z"></path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center ml-auto">
                                                <!-- Unfold (Sidebar) -->
                                                <div class="hs-unfold d-xl-none">
                                                    <a class="js-hs-unfold-invoker text-white font-weight-bold" href="javascript:;"
                                                        data-hs-unfold-options='{
                                                            "target": "#sidebarContent-menu",
                                                            "type": "css-animation",
                                                            "animationIn": "fadeInLeft",
                                                            "animationOut": "fadeOutLeft",
                                                            "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                                            "smartPositionOff": true
                                                        }'><i class="fas fa-sliders-h"></i><span class="ml-2 font-secondary">FILTERS</span>
                                                    </a>
                                                </div>
                                                <!-- End Unfold (Sidebar) -->

                                                <!-- Sidebar Navigation -->
                                                <aside id="sidebarContent-menu" class="hs-unfold-content sidebar sidebar-left">
                                                    <div class="sidebar-scroller bg-gray-3100">
                                                        <div class="sidebar-container">
                                                            <div class="sidebar-footer-offset" style="padding-bottom: 7rem;">
                                                                <!-- Toggle Button -->
                                                                <div class="d-flex justify-content-end align-items-center pt-4 px-4">
                                                                    <div class="hs-unfold">
                                                                        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary" href="javascript:;"
                                                                            data-hs-unfold-options='{
                                                                                "target": "#sidebarContent-menu",
                                                                                "type": "css-animation",
                                                                                "animationIn": "fadeInLeft",
                                                                                "animationOut": "fadeOutLeft",
                                                                                "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                                                                "smartPositionOff": true
                                                                            }'>
                                                                            <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <!-- End Toggle Button -->

                                                                <!-- Content -->
                                                                <div class="scrollbar sidebar-body">
                                                                    <div class="sidebar-content py-4 px-3">
                                                                        <div class="bg-gray-3100">
                                                                            <div class="sidebar-area">
                                                                                <div class="mx-1 mb-1">
                                                                                    <div class="mb-6">
                                                                                        <!-- Categories -->
                                                                                        <h6 class="font-size-22 font-weight-medium border-bottom border-gray-3700 pb-2 mb-5 text-white"> Categories</h6>
                                                                                        <div class="row mb-4 pb-1">
                                                                                            <div class="col-md">
                                                                                                <ul class="list-unstyled mb-0">
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Action">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Action">Action</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Adventures">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Adventures">Adventures</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Animation">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Animation">Animation</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Bio">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Bio">Biography</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Comedy">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Comedy">Comedy</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Crime">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Crime">Crime</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Doc">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Doc">Documentary</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Drama">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Drama">Drama</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Family">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Family">Family</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Fantasy">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Fantasy">Fantasy</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div class="col-md">
                                                                                                <ul class="list-unstyled mb-0">
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="History">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="History">History</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Horror">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Horror">Horror</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Music">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Music">Music</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Mystery">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Mystery">Mystery</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Romance">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Romance">Romance</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Sci">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Sci">Sci-Fi</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Sports">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Sports">Sports</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Thriller">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Thriller">Thriller</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                        <ul class="list-unstyled d-flex mb-0">
                                                                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-1">
                                                                                                <a href="#">
                                                                                                    <div class="d-flex flex-column">
                                                                                                        <i class="far fa-window-maximize text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">4K ULTRA</span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-1">
                                                                                                <a href="#">
                                                                                                    <div class="d-flex flex-column">
                                                                                                        <i class="fas fa-chess-knight text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">BROTHER</span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-1">
                                                                                                <a href="#">
                                                                                                    <div class="d-flex flex-column">
                                                                                                        <i class="fab fa-teamspeak text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">DUBBING</span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                            <li class="h-bg-2 bg-gray-3800 py-2 px-2 mr-0">
                                                                                                <a href="#">
                                                                                                    <div class="d-flex flex-column">
                                                                                                        <i class="fas fa-chess-knight text-gray-5000 d-flex justify-content-center font-size-20"></i>
                                                                                                        <span class="font-size-10 font-weight-semi-bold text-gray-1300">HERO</span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <!-- End Categories -->
                                                                                    </div>
                                                                                    <div class="mb-6 pb-1">
                                                                                        <h6 class="font-size-22 text-white font-weight-medium border-bottom border-gray-3700 pb-2 mb-4">Movies by Year</h6>
                                                                                        <ul class="list-unstyled d-flex flex-wrap mb-0">
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2020</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2019</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2018</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2017</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2016</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2015</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2014</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2013</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2012</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-1 pb-1">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2011</a>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="pr-0 pb-0">
                                                                                                <div class="h-bg-3 bg-gray-5100 px-2 py-2 d-inline-block">
                                                                                                    <a href="#" class="mx-1">2010</a>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="mb-5">
                                                                                        <h6 class="font-size-22 text-white font-weight-medium border-bottom border-gray-3700 pb-2 mb-3">Filter by Rating</h6>

                                                                                        <a href="#">
                                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                                                                <span class="d-block text-primary">
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                </span>
                                                                                                <small class="text-gray-1300 font-size-15">(2)</small>
                                                                                            </div>
                                                                                        </a>
                                                                                        <a href="#">
                                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                                                                <span class="d-block text-primary">
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                </span>
                                                                                                <small class="text-gray-1300 font-size-15">(10)</small>
                                                                                            </div>
                                                                                        </a>
                                                                                        <a href="#">
                                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                                                                <span class="d-block text-primary">
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                </span>
                                                                                                <small class="text-gray-1300 font-size-15">(27)</small>
                                                                                            </div>
                                                                                        </a>
                                                                                        <a href="#">
                                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-1 pb-1">
                                                                                                <span class="d-block text-primary">
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                </span>
                                                                                                <small class="text-gray-1300 font-size-15">(13)</small>
                                                                                            </div>
                                                                                        </a>
                                                                                        <a href="#">
                                                                                            <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-0">
                                                                                                <span class="d-block text-primary">
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="fas fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                    <i class="far fa-star"></i>
                                                                                                </span>
                                                                                                <small class="text-gray-1300 font-size-15">(1)</small>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End Content -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </aside>
                                                <!-- End Sidebar Navigation -->

                                                <div class="d-flex align-items-center position-relative ml-auto">
                                                    <svg class="svg-icon svg-icon__sort position-absolute ml-2d" aria-hidden="true" role="img" focusable="false" width="17px" height="14px" fill="white"><path fill-rule="evenodd" d="M4.034,-0.001 C4.248,0.009 4.401,0.071 4.578,0.113 C4.699,0.294 4.899,0.408 4.967,0.644 C4.967,1.606 4.967,2.568 4.967,3.529 C4.967,5.972 4.967,8.414 4.967,10.856 C4.980,10.856 4.993,10.856 5.006,10.856 C5.641,10.224 6.276,9.591 6.911,8.958 C7.041,8.873 7.329,8.745 7.572,8.806 C7.930,8.896 8.016,9.121 8.233,9.337 C8.293,10.165 7.817,10.389 7.377,10.818 C6.639,11.539 5.900,12.260 5.161,12.982 C4.928,13.209 4.395,13.909 4.073,13.969 C3.952,13.787 3.760,13.663 3.606,13.513 C3.270,13.184 2.933,12.855 2.596,12.526 C2.052,11.982 1.507,11.438 0.963,10.894 C0.717,10.666 0.471,10.438 0.224,10.211 C0.148,10.110 0.119,9.993 0.030,9.907 C0.015,9.698 -0.048,9.491 0.069,9.337 C0.171,8.957 0.746,8.634 1.235,8.882 C1.922,9.540 2.609,10.198 3.296,10.856 C3.296,7.465 3.296,4.073 3.296,0.682 C3.358,0.600 3.351,0.467 3.412,0.379 C3.511,0.235 3.714,0.158 3.840,0.037 C3.938,0.035 3.984,0.034 4.034,-0.001 ZM12.781,0.037 C12.820,0.037 12.859,0.037 12.898,0.037 C13.999,1.125 15.101,2.214 16.202,3.302 C16.427,3.522 17.287,4.153 16.902,4.668 C16.828,4.945 16.613,4.994 16.435,5.162 C16.280,5.174 16.124,5.187 15.969,5.200 C15.631,5.108 15.447,4.842 15.230,4.630 C14.712,4.137 14.193,3.643 13.675,3.150 C13.675,6.553 13.675,9.958 13.675,13.362 C13.514,13.560 13.485,13.804 13.209,13.893 C13.076,14.007 12.700,14.044 12.548,13.931 C11.760,13.719 12.004,12.233 12.004,11.273 C12.004,8.566 12.004,5.858 12.004,3.150 C11.991,3.150 11.978,3.150 11.965,3.150 C11.676,3.589 10.996,4.095 10.604,4.479 C10.404,4.673 10.198,4.996 9.943,5.124 C9.784,5.204 9.589,5.200 9.360,5.200 C9.238,5.102 9.043,5.080 8.932,4.972 C8.848,4.890 8.822,4.751 8.738,4.668 C8.699,3.730 9.312,3.462 9.827,2.960 C10.811,1.986 11.796,1.011 12.781,0.037 Z"></path></svg>

                                                    <form method="get">
                                                        <!-- Select -->
                                                        <select class="js-custom-select vodi-select"
                                                            data-hs-select2-options='{
                                                              "minimumResultsForSearch": "Infinity",
                                                              "dropdownAutoWidth": true,
                                                              "width": "auto"
                                                            }'>
                                                            <option value="1">From A to Z</option>
                                                            <option value="2">From Z to A</option>
                                                            <option value="3" selected="selected">Latest</option>
                                                            <option value="4">Menu Order</option>
                                                            <option value="5">Rating</option>
                                                            <option value="6">Likes</option>
                                                        </select>
                                                        <!-- End Select -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content dark mb-4">
                                <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                                    <div class="border-bottom border-gray-3800 mb-4 pb-5">
                                        <div class="row mx-n2">
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Mirror</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Renegades</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Documentary</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">My Generation</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Breath</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Oceans's 8</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">A Kid Like Jake</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Last Witness</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Tale</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Water</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Horror</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Strangers: Prey At Night</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Comedy</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Oh Lucy</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Bbm</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Midnight Sun</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Pacific Rim: Uprising</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Romance</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Love, Simon</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">I Can Only Imagine</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sports</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Dirt</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Game Night</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Fantacy</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Every Day</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Biography</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Mercy</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Animation</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Have a Mercy Day</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Phantom Thread</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Euphoria</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">own Sizing</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">
                                    <div class="border-bottom border-gray-3800 mb-4 pb-5">
                                        <div class="row row-cols-1 row-cols-md-3 row-cols-wd-5 mx-n2">
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Mirror</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Renegades</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Documentary</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">My Generation</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Breath</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Oceans's 8</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">A Kid Like Jake</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Last Witness</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Tale</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Water</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Horror</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Strangers: Prey At Night</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Comedy</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Oh Lucy</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Bbm</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Midnight Sun</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Pacific Rim: Uprising</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Romance</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Love, Simon</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">I Can Only Imagine</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sports</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Dirt</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-4">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Game Night</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Fantacy</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Every Day</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Biography</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Mercy</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Animation</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Have a Mercy Day</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Phantom Thread</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Euphoria</a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col px-2">
                                                <div class="product mb-3 mb-md-0">
                                                    <div class="product-image mb-2">
                                                        <a class="d-block position-relative stretched-link" href="../single-movies/single-movies-v1.html">
                                                            <img class="img-fluid" src="https://placehold.it/300x450" alt="Image-Description">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">own Sizing</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab">

                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Mystery</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Mirror</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">In 1984, a young programmer begins to question reality as he works to adapt a fantasy novel into a video game.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>3<br>Votes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Renegades</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A team of Navy SEALs discover an underwater treasure in a Bosnian lake.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Documentary</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">My Generation</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">The cultural revolution that occurred in the 1960s England is explored in this documentary.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">10.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Breath</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">he inspiring and unknown true story behind MercyMe's beloved, chart topping song that brings ultimate hope to so many is a gripping reminder of the power of true forgiveness.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Ocean's 8</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Debbie Ocean gathers an all-female crew to attempt an impossible heist at New York City's yearly Met Gala.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">A Kid Like Jake</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Loving parents of a four-year-old must come to terms with their child being transgender.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Last Witness</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">In 1892, a legendary Army captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Tale</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A woman filming a documentary on childhood rape victims starts to question the nature of her childhood relationship with her riding instructor and running coach</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.5</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Water</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A deep cover operative awakens to find himself imprisoned in a CIA black site on a submarine.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">10.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Horror</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Strangers: Prey At Night</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A family of four staying at a secluded mobile home park for the night are stalked and then hunted by three masked psychopaths.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Oh Lucy</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A lonely woman living in Tokyo decides to take an English class where she discovers her alter ego, Lucy.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>3<br>Votes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Bpm</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Members of the advocacy group ACT UP Paris demand action by the government and pharmaceutical companies to combat the AIDS epidemic in the early 1990s.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Midnight Sun</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A 17-year-old girl suffers from a condition that prevents her from being out in the sunlight.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Pacific Rim: Uprising</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Jake Pentecost, son of Stacker Pentecost, reunites with Mako Mori to lead a new generation of Jaeger pilots, including rival Lambert and 15-year-old hacker Amara, against a new Kaiju threat.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Roamnce</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Love, Simon</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Simon Spier keeps a huge secret from his family, his friends and all of his classmates: he's gay. When that secret is threatened, Simon must face everyone and come to terms with his identity.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">I Can Only Imagine</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">The inspiring and unknown true story behind MercyMe's beloved, chart topping song that brings ultimate hope to so many is a gripping reminder of the power of true forgiveness.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sports</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Dirt</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">In search of a lifeline for his struggling off road racing team, a man takes on a young car thief looking for a second chance, but as their worlds collide, they must struggle to forge a successful alliance.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>3<br>Votes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Game Night</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A group of friends who meet regularly for game nights find themselves entangled in a real-life mystery when the shady brother of one of them is seemingly kidnapped by dangerous gangsters.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Fantasy</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Every Day</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A shy teenager falls for someone who transforms into another person every day</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>3<br>Votes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Biography</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Mercy</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">The incredible story of amateur sailor Donald Crowhurst and his solo attempt to circumnavigate the globe. The struggles he confronted on the journey while his family awaited his return is one of the most enduring mysteries of recent times.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>3<br>Votes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Animation</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Have a Nice Day</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A city in southern China and a bag containing a million yuan draw several people from diverse backgrounds with different personal motives into a bloody conflict</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Phantom Thread</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Set in 1950s London, Reynolds Woodcock is a renowned dressmaker whose fastidious life is disrupted by a young, strong-willed woman, Alma, who becomes his muse and lover.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Euphoria</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">Sisters in conflict travelling through Europe toward a mystery destination</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>1<br>Vote</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Down Sizing</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7">A social satire in which a man realizes he would have a better life if he were to shrink himself to five inches tall, allowing him to live in wealth and splendor.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="rating-number position-relative font-size-42 mb-3">
                                                    <i class="fas fa-star d-flex justify-content-center">
                                                    </i>
                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                </div>

                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                    <span>3<br>Votes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-four-example1" role="tabpanel" aria-labelledby="pills-four-example1-tab">
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Mystery</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Mirror</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">In 1984, a young programmer begins to question reality as he works to adapt a fantasy novel into a video game.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>3<br>Votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Renegades</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A team of Navy SEALs discover an underwater treasure in a Bosnian lake.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Documentary</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">My Generation</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">The cultural revolution that occurred in the 1960s England is explored in this documentary.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">10.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Breath</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">he inspiring and unknown true story behind MercyMe's beloved, chart topping song that brings ultimate hope to so many is a gripping reminder of the power of true forgiveness.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Ocean's 8</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Debbie Ocean gathers an all-female crew to attempt an impossible heist at New York City's yearly Met Gala.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="rating-number position-relative font-size-42">
                                                            <i class="fas fa-star d-flex justify-content-center">
                                                            </i>
                                                            <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                        </div>

                                                        <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                            <span>1<br>Vote</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">A Kid Like Jake</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Loving parents of a four-year-old must come to terms with their child being transgender.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Last Witness</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">In 1892, a legendary Army captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Tale</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A woman filming a documentary on childhood rape victims starts to question the nature of her childhood relationship with her riding instructor and running coach</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.5</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Black Water</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A deep cover operative awakens to find himself imprisoned in a CIA black site on a submarine.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">10.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Horror</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Strangers: Prey At Night</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A family of four staying at a secluded mobile home park for the night are stalked and then hunted by three masked psychopaths.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Oh Lucy</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A lonely woman living in Tokyo decides to take an English class where she discovers her alter ego, Lucy.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>3<br>Votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Bpm</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Members of the advocacy group ACT UP Paris demand action by the government and pharmaceutical companies to combat the AIDS epidemic in the early 1990s.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Midnight Sun</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A 17-year-old girl suffers from a condition that prevents her from being out in the sunlight.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Pacific Rim: Uprising</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Jake Pentecost, son of Stacker Pentecost, reunites with Mako Mori to lead a new generation of Jaeger pilots, including rival Lambert and 15-year-old hacker Amara, against a new Kaiju threat.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Roamnce</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Love, Simon</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Simon Spier keeps a huge secret from his family, his friends and all of his classmates: he's gay. When that secret is threatened, Simon must face everyone and come to terms with his identity.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">I Can Only Imagine</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">The inspiring and unknown true story behind MercyMe's beloved, chart topping song that brings ultimate hope to so many is a gripping reminder of the power of true forgiveness.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sports</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Dirt</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">In search of a lifeline for his struggling off road racing team, a man takes on a young car thief looking for a second chance, but as their worlds collide, they must struggle to forge a successful alliance.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>3<br>Votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Game Night</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A group of friends who meet regularly for game nights find themselves entangled in a real-life mystery when the shady brother of one of them is seemingly kidnapped by dangerous gangsters.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Fantasy</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Every Day</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A shy teenager falls for someone who transforms into another person every day</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                        <span>3<br>Votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Biography</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">The Mercy</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">The incredible story of amateur sailor Donald Crowhurst and his solo attempt to circumnavigate the globe. The struggles he confronted on the journey while his family awaited his return is one of the most enduring mysteries of recent times.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>3<br>Votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Animation</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Have a Nice Day</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A city in southern China and a bag containing a million yuan draw several people from diverse backgrounds with different personal motives into a bloody conflict</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Phantom Thread</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Set in 1950s London, Reynolds Woodcock is a renowned dressmaker whose fastidious life is disrupted by a young, strong-willed woman, Alma, who becomes his muse and lover.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Euphoria</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">Sisters in conflict travelling through Europe toward a mystery destination</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>1<br>Vote</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-1">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                    </div>
                                                    <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html">Down Sizing</a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-4">A social satire in which a man realizes he would have a better life if he were to shrink himself to five inches tall, allowing him to live in wealth and splendor.</p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-gray-1 d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>

                                                        <a href="../single-movies/single-movies-v1.html" class="d-flex align-items-center justify-content-center font-secondary font-size-12 text-white font-weight-bold ml-md-3 pl-md-1" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="rating-number position-relative font-size-42">
                                                        <i class="fas fa-star d-flex justify-content-center">
                                                        </i>
                                                        <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                    </div>

                                                    <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                        <span>3<br>Votes</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-five-example1" role="tabpanel" aria-labelledby="pills-five-example1-tab">
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0 h-btn-show dark ">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class=" px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Mystery</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Black Mirror</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">In 1984, a young programmer begins to question reality as he works to adapt a fantasy novel into a video game.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>3<br>Votes</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters pl-4 py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block ">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Renegades</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A team of Navy SEALs discover an underwater treasure in a Bosnian lake.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Documentary</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">My Generation</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">The cultural revolution that occurred in the 1960s England is explored in this documentary.</p>
                                                            </div>

                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">10.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>3<br>Votes</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Breath</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">he inspiring and unknown true story behind MercyMe's beloved, chart topping song that brings ultimate hope to so many is a gripping reminder of the power of true forgiveness.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>3<br>Votes</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Ocean's 8</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Debbie Ocean gathers an all-female crew to attempt an impossible heist at New York City's yearly Met Gala.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">A Kid Like Jake</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Loving parents of a four-year-old must come to terms with their child being transgender.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">The Last Witness</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">In 1892, a legendary Army captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">The Tale</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A woman filming a documentary on childhood rape victims starts to question the nature of her childhood relationship with her riding instructor and running coach</p>
                                                            </div>

                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.5</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>2<br>Votes</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Thriller</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Black Water</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A deep cover operative awakens to find himself imprisoned in a CIA black site on a submarine.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">10.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Horror</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">The Strangers: Prey At Night</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A family of four staying at a secluded mobile home park for the night are stalked and then hunted by three masked psychopaths.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Comedy</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Oh Lucy</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A lonely woman living in Tokyo decides to take an English class where she discovers her alter ego, Lucy.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Bpm</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Members of the advocacy group ACT UP Paris demand action by the government and pharmaceutical companies to combat the AIDS epidemic in the early 1990.</p>
                                                            </div>

                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Midnight Sun</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A 17-year-old girl suffers from a condition that prevents her from being out in the sunlight.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Pacific Rim:  Uprising </a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Jake Pentecost, son of Stacker Pentecost, reunites with Mako Mori to lead a new generation of Jaeger pilots, including rival Lambert and 15-year-old hacker Amara, against a new Kaiju threat.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">7.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Votes</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Romance</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Simon, Love</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Simon Spier keeps a huge secret from his family, his friends and all of his classmates: he's gay. When that secret is threatened, Simon must face everyone and come to terms with his identity.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Family</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">I Can Only Imagine </a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">The inspiring and unknown true story behind MercyMe's beloved, chart topping song that brings ultimate hope to so many is a gripping reminder of the power of true forgiveness.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sports</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Dirt</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">In search of a lifeline for his struggling off road racing team, a man takes on a young car thief looking for a second chance, but as their worlds collide, they must struggle to forge a successful alliance.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Game Night</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A group of friends who meet regularly for game nights find themselves entangled in a real-life mystery when the shady brother of one of them is seemingly kidnapped by dangerous gangsters.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Fantacy</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Every Day</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A shy teenager falls for someone who transforms into another person every day</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Biography</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">The Mercy</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">The incredible story of amateur sailor Donald Crowhurst and his solo attempt to circumnavigate the globe. The struggles he confronted on the journey while his family awaited his return is one of the most enduring mysteries of recent times.</p>
                                                            </div>

                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span><br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Animation</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Have Nice Day</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">A city in southern China and a bag containing a million yuan draw several people from diverse backgrounds with different personal motives into a bloody conflict</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Drama</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Phantom Thread</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Set in 1950s London, Reynolds Woodcock is a renowned dressmaker whose fastidious life is disrupted by a young, strong-willed woman, Alma, who becomes his muse and lover.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">8.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-gray-3800 no-gutters">
                                        <div class="col-md-6">
                                            <div class="product mb-5 mb-md-0  h-btn-show dark">
                                                <div class="row no-gutters py-3">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block border-md-right-dark">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Adventures</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Euphoria</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">Sisters in conflict travelling through Europe toward a mystery destination</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>1<br>Vote</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product h-btn-show dark">
                                                <div class="row no-gutters py-3 pl-4">
                                                    <div class="col-md-3">
                                                        <div class="product-image mb-2 mb-md-0">
                                                            <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="px-md-4d mt-2d d-flex justify-content-between d-md-block">
                                                            <div>
                                                                <div class="product-meta font-size-12">
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">2020</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Action</a></span>
                                                                    <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0">Sci-Fi</a></span>
                                                                </div>
                                                                <div class="font-size-1 font-weight-bold mb-2 product-title d-inline-block">
                                                                    <a href="../single-movies/single-movies-v1.html">Downsizing</a>
                                                                </div>
                                                                <p class="mb-0 font-size-1 line-clamp-1 text-gray-1300">IA social satire in which a man realizes he would have a better life if he were to shrink himself to five inches tall, allowing him to live in wealth and splendor.</p>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating-number position-relative font-size-42">
                                                                    <i class="fas fa-star d-flex justify-content-center">
                                                                    </i>
                                                                    <span class="font-size-13 font-weight-bold text-gray-1300 position-absolute bottom-0 top-0 right-0 left-0 d-flex align-items-center justify-content-center">9.0</span>
                                                                </div>

                                                                <div class="font-size-12 text-gray-1300 text-center text-lh-1 ml-3">
                                                                    <span>3<br>Votes</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-md-flex align-items-center justify-content-between">
                                <div class="font-secondary font-size-1 font-weight-normal text-gray-1300 text-center text-md-left mb-3 mb-md-0">Showing 1–30 of 139 results</div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination custom-pagination-dark justify-content-center justify-content-md-start mb-0">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next Page<i class="fas fa-long-arrow-alt-right ml-2 font-size-11"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <footer class="">
        <div class="bg-gray-4000">
            <div class="container px-md-5">
                <div class="d-flex flex-wrap align-items-center pt-6 pb-3d border-bottom mb-7 border-gray-4100">
                    <a href="#" class="mb-4 mb-md-0 mr-auto">
                        <svg version="1.1" width="92" height="40px">
                            <g fill="#fff">
                                <path class="vodi-svg0" d="M72.8,12.7c0-2.7,0-1.8,0-4.4c0-0.9,0-1.8,0-2.8C73,3,74.7,1.4,77,1.4c2.3,0,4.1,1.8,4.2,4.2c0,1,0,2.1,0,3.1
                                c0,6.5,0,9.4,0,15.9c0,4.7-1.7,8.8-5.6,11.5c-4.5,3.1-9.3,3.5-14.1,0.9c-4.7-2.5-7.1-6.7-7-12.1c0.1-7.8,6.3-13.6,14.1-13.2
                                c0.7,0,1.4,0.2,2.1,0.3C71.3,12.2,72,12.4,72.8,12.7z M67.8,19.8c-2.9,0-5.2,2.2-5.2,5c0,2.9,2.3,5.3,5.2,5.3
                                c2.8,0,5.2-2.4,5.2-5.2C73,22.2,70.6,19.8,67.8,19.8z
                                M39.9,38.6c-7.3,0-13.3-6.1-13.3-13.5c0-7.5,5.9-13.4,13.4-13.4c7.5,0,13.4,6,13.4,13.5
                                C53.4,32.6,47.4,38.6,39.9,38.6z M39.9,30.6c3.2,0,5.6-2.3,5.6-5.6c0-3.2-2.3-5.5-5.5-5.5c-3.2,0-5.6,2.2-5.6,5.4
                                C34.4,28.2,36.7,30.6,39.9,30.6z
                                M14.6,27c0.6-1.4,1.1-2.6,1.6-3.8c1.2-2.9,2.5-5.8,3.7-8.8c0.7-1.7,2-2.8,4-2.7c3,0,4.9,2.6,3.8,5.4
                                c-0.5,1.3-1.2,2.6-1.8,3.9c-2.4,5-4.9,10-7.3,15c-0.8,1.6-2,2.6-3.9,2.6c-2,0-3.3-0.8-4.2-2.6c-2.7-5.6-5.3-11.1-8-16.7
                                c-0.3-0.7-0.6-1.3-0.9-2c-0.8-1.8-0.3-3.7,1.1-4.8c1.5-1.2,4-1.3,5.3,0c0.7,0.6,1.2,1.5,1.6,2.3C11.3,18.8,12.9,22.7,14.6,27z
                                M90.9,25.1c0,3.1,0,6.2,0,9.4c0,1.9-1.2,3.4-2.9,4c-1.7,0.5-3.5,0-4.5-1.6c-0.5-0.8-0.8-1.8-0.8-2.6
                                c-0.1-6.1-0.1-11.3,0-17.5c0-2.2,1.5-3.9,3.5-4.2c2.1-0.3,4.1,0.9,4.7,2.9c0.1,0.5,0.2,1.1,0.2,1.6C90.9,20,90.9,22.1,90.9,25.1
                                C90.9,25.1,90.9,25.1,90.9,25.1z
                                M90.2,4.7L86,2.3c-1.3-0.8-3,0.2-3,1.7v4.8c0,1.5,1.7,2.5,3,1.7l4.2-2.4C91.5,7.4,91.5,5.5,90.2,4.7z"></path>
                            </g>
                        </svg>
                    </a>
                    <ul class="list-unstyled mx-n3 mb-0 d-flex flex-wrap align-items-center">
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-facebook-f fa-inverse"></i> <span class="ml-2">Facebook</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-twitter fa-inverse"></i> <span class="ml-2">Twitter</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-google-plus-g fa-inverse"></i> <span class="ml-2">Google+</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-vimeo-v fa-inverse"></i> <span class="ml-2">Vimeo</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fas fa-rss fa-inverse"></i> <span class="ml-2">RSS</span></a>
                        </li>
                    </ul>
                </div>
                <div class="row pb-5">
                    <div class="col-md mb-5 mb-md-0">
                        <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">Movie Categories</h4>
                        <ul class="column-count-2 v2 list-unstyled mb-0">
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Action</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Adventure</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Animation</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Comedy</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Crime</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Drama</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Fantacy</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Horror</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Mystrey</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Romance</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md mb-5 mb-md-0">
                        <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">TV Series</h4>
                        <ul class="column-count-2 v2 list-unstyled mb-0">
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Valentine Day</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Underrated Comedies</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Scary TV Series</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Best 2020 Documentaries</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Classic Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Big TV Premieres</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Reality TV Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Original Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Suprise of the Year Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Top 10 TV Shows</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 mb-5 mb-md-0 border-left border-gray-4100">
                        <div class="ml-1">
                            <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">Support</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">My Account</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">FAQ</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">Watch on TV</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">Help Center</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-4300">
            <div class="container px-md-5">
                <div class="text-center d-md-flex flex-wrap align-items-center py-3">
                    <div class="font-size-13 text-gray-1300 mb-2 mb-md-0">Copyright © 2020, Vodi. All Rights Reserved</div>
                    <a href="#" class="font-size-13 h-g-white ml-md-auto">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="close position-absolute top-0 right-0 z-index-2 mt-3 mr-3" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                </button>

                <!-- Body -->
                <div class="modal-body">
                    <form class="js-validate">
                        <!-- Login -->
                        <div id="login">
                            <!-- Title -->
                            <div class="text-center mb-7">
                                <h3 class="mb-0">Sign In to Vodi</h3>
                                <p>Login to manage your account.</p>
                            </div>
                            <!-- End Title -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Email</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email" aria-label="Email" required
                                    data-msg="Please enter a valid email address.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-3">
                                <label class="input-label">Password</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="password" class="form-control" name="password" id="signinPassword" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <div class="d-flex justify-content-end mb-4">
                                <a class="js-animation-link small link-underline" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#forgotPassword",
                                        "groupName": "idForm"
                                    }'>Forgot Password?
                                </a>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Sign In</button>
                            </div>

                            <div class="text-center mb-3">
                                <span class="divider divider-xs divider-text">OR</span>
                            </div>

                            <a class="btn btn-sm btn-ghost-secondary btn-block mb-2" href="#">
                                <span class="d-flex justify-content-center align-items-center">
                                    <i class="fab fa-google mr-2"></i>
                                    Sign In with Google
                                </span>
                            </a>

                            <div class="text-center">
                                <span class="small text-muted">Do not have an account?</span>
                                <a class="js-animation-link small font-weight-bold" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#signup",
                                        "groupName": "idForm"
                                    }'>Sign Up
                                </a>
                            </div>
                        </div>

                        <!-- Signup -->
                        <div id="signup" style="display: none; opacity: 0;">
                            <!-- Title -->
                            <div class="text-center mb-7">
                                <h3 class="mb-0">Create your account</h3>
                                <p>Fill out the form to get started.</p>
                            </div>
                            <!-- End Title -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Email</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="email" class="form-control" name="email" id="signupEmail" placeholder="Email" aria-label="Email" required
                                    data-msg="Please enter a valid email address.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Password</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="password" class="form-control" name="password" id="signupPassword" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Confirm Password</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="password" class="form-control" name="confirmPassword" id="signupConfirmPassword" placeholder="Confirm Password" aria-label="Confirm Password" required
                                    data-msg="Password does not match the confirm password.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Sign Up</button>
                            </div>

                            <div class="text-center mb-3">
                                <span class="divider divider-xs divider-text">OR</span>
                            </div>

                            <a class="btn btn-sm btn-ghost-secondary btn-block mb-2" href="#">
                                <span class="d-flex justify-content-center align-items-center">
                                    <i class="fab fa-google mr-2"></i>
                                    Sign Up with Google
                                </span>
                            </a>

                            <div class="text-center">
                                <span class="small text-muted">Already have an account?</span>
                                <a class="js-animation-link small font-weight-bold" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#login",
                                        "groupName": "idForm"
                                    }'>Sign In
                                </a>
                            </div>
                        </div>
                        <!-- End Signup -->

                        <!-- Forgot Password -->
                        <div id="forgotPassword" style="display: none; opacity: 0;">
                            <!-- Title -->
                            <div class="text-center mb-7">
                                <h3 class="mb-0">Recover password</h3>
                                <p>Instructions will be sent to you.</p>
                            </div>
                            <!-- End Title -->

                            <!-- Input Group -->
                            <div class="js-form-message">
                                <label class="sr-only" for="recoverEmail">Your email</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="email" class="form-control" name="email" id="recoverEmail" placeholder="Your email" aria-label="Your email" required
                                    data-msg="Please enter a valid email address.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Recover Password</button>
                            </div>

                            <div class="text-center mb-4">
                                <span class="small text-muted">Remember your password?</span>
                                <a class="js-animation-link small font-weight-bold" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#login",
                                        "groupName": "idForm"
                                    }'>Login
                                </a>
                            </div>
                        </div>
                        <!-- End Forgot Password -->
                    </form>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Login Modal -->

    <!-- Sidebar Navigation -->
    <aside id="sidebarContent" class="hs-unfold-content sidebar sidebar-left off-canvas-menu">
        <div class="sidebar-scroller">
            <div class="sidebar-container">
                <div class="sidebar-footer-offset" style="padding-bottom: 7rem;">
                    <!-- Toggle Button -->
                    <div class="d-flex justify-content-end align-items-center py-2 px-4 border-bottom">
                        <!-- Logo -->
                        <a class="navbar-brand mr-auto" href="../home/index.html" aria-label="Vodi">
                            <svg version="1.1" width="103" height="40px">
                                <linearGradient id="vodi-gr1" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0" style="stop-color:#2A4999"></stop>
                                    <stop offset="1" style="stop-color:#2C9CD4"></stop>
                                </linearGradient>
                                <g class="vodi-gr">
                                    <path class="vodi-svg0" d="M72.8,12.7c0-2.7,0-1.8,0-4.4c0-0.9,0-1.8,0-2.8C73,3,74.7,1.4,77,1.4c2.3,0,4.1,1.8,4.2,4.2c0,1,0,2.1,0,3.1
                                    c0,6.5,0,9.4,0,15.9c0,4.7-1.7,8.8-5.6,11.5c-4.5,3.1-9.3,3.5-14.1,0.9c-4.7-2.5-7.1-6.7-7-12.1c0.1-7.8,6.3-13.6,14.1-13.2
                                    c0.7,0,1.4,0.2,2.1,0.3C71.3,12.2,72,12.4,72.8,12.7z M67.8,19.8c-2.9,0-5.2,2.2-5.2,5c0,2.9,2.3,5.3,5.2,5.3
                                    c2.8,0,5.2-2.4,5.2-5.2C73,22.2,70.6,19.8,67.8,19.8z
                                    M39.9,38.6c-7.3,0-13.3-6.1-13.3-13.5c0-7.5,5.9-13.4,13.4-13.4c7.5,0,13.4,6,13.4,13.5
                                    C53.4,32.6,47.4,38.6,39.9,38.6z M39.9,30.6c3.2,0,5.6-2.3,5.6-5.6c0-3.2-2.3-5.5-5.5-5.5c-3.2,0-5.6,2.2-5.6,5.4
                                    C34.4,28.2,36.7,30.6,39.9,30.6z
                                    M14.6,27c0.6-1.4,1.1-2.6,1.6-3.8c1.2-2.9,2.5-5.8,3.7-8.8c0.7-1.7,2-2.8,4-2.7c3,0,4.9,2.6,3.8,5.4
                                    c-0.5,1.3-1.2,2.6-1.8,3.9c-2.4,5-4.9,10-7.3,15c-0.8,1.6-2,2.6-3.9,2.6c-2,0-3.3-0.8-4.2-2.6c-2.7-5.6-5.3-11.1-8-16.7
                                    c-0.3-0.7-0.6-1.3-0.9-2c-0.8-1.8-0.3-3.7,1.1-4.8c1.5-1.2,4-1.3,5.3,0c0.7,0.6,1.2,1.5,1.6,2.3C11.3,18.8,12.9,22.7,14.6,27z
                                    M90.9,25.1c0,3.1,0,6.2,0,9.4c0,1.9-1.2,3.4-2.9,4c-1.7,0.5-3.5,0-4.5-1.6c-0.5-0.8-0.8-1.8-0.8-2.6
                                    c-0.1-6.1-0.1-11.3,0-17.5c0-2.2,1.5-3.9,3.5-4.2c2.1-0.3,4.1,0.9,4.7,2.9c0.1,0.5,0.2,1.1,0.2,1.6C90.9,20,90.9,22.1,90.9,25.1
                                    C90.9,25.1,90.9,25.1,90.9,25.1z
                                    M90.2,4.7L86,2.3c-1.3-0.8-3,0.2-3,1.7v4.8c0,1.5,1.7,2.5,3,1.7l4.2-2.4C91.5,7.4,91.5,5.5,90.2,4.7z"></path>
                                </g>
                            </svg>
                        </a>
                        <!-- End Logo -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary" href="javascript:;"
                                data-hs-unfold-options='{
                                    "target": "#sidebarContent",
                                    "type": "css-animation",
                                    "animationIn": "fadeInLeft",
                                    "animationOut": "fadeOutLeft",
                                    "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                    "smartPositionOff": true
                                }'>
                                <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- End Toggle Button -->

                    <!-- Content -->
                    <div class="scrollbar sidebar-body">
                        <div class="sidebar-content py-4">
                            <!-- Sidebar Navbar -->
                            <div class="">
                                <div id="sidebarNavExample3" class="collapse show navbar-collapse">
                                    <!-- Nav Link -->
                                    <div class="sidebar-body_inner">
                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                                Home
                                            </a>

                                            <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav1" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../home/index.html">Home v1</a>
                                                    <a class="dropdown-item" href="../home/home-v2.html">Home v2</a>
                                                    <a class="dropdown-item" href="../home/home-v3.html">Home v3</a>
                                                    <a class="dropdown-item" href="../home/home-v4.html">Home v4</a>
                                                    <a class="dropdown-item" href="../home/home-v5.html">Home v5</a>
                                                    <a class="dropdown-item" href="../home/home-v6.html">Home v6 - Vodi Prime (Light)</a>
                                                    <a class="dropdown-item" href="../home/home-v7.html">Home v7 - Vodi Prime (Dark)</a>
                                                    <a class="dropdown-item" href="../home/home-v8.html">Home v8 - Vodi Stream</a>
                                                    <a class="dropdown-item" href="../home/home-v9.html">Home v9 - Vodi Tube (Light)</a>
                                                    <a class="dropdown-item" href="../home/home-v10.html">Home v10 - Vodi Tube (Dark)</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2Collapse" data-target="#sidebarNav2Collapse">
                                                Archive Pages
                                            </a>

                                            <div id="sidebarNav2Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav2" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../archive/movies.html">Movies</a>
                                                    <a class="dropdown-item" href="../archive/tv-shows.html">TV Shows</a>
                                                    <a class="dropdown-item" href="../archive/videos.html">Videos</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav2One" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2One">
                                                Single Movies
                                            </a>
                                            <div id="sidebarNav2One" class="navbar-nav flex-column collapse" data-parent="#sidebarNav2">
                                                <a class="dropdown-item" href="../single-movies/single-movies-v1.html">Movie v1</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v2.html">Movie v2</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v3.html">Movie v3</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v4.html">Movie v4</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v5.html">Movie v5</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v6.html">Movie v6</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v7.html">Movie v7</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav2Two" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2Two">
                                                Single Videos
                                            </a>
                                            <div id="sidebarNav2Two" class="navbar-nav flex-column collapse" data-parent="#sidebarNav2">
                                                <a class="dropdown-item" href="../single-video/single-video-v1.html">Video v1</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v2.html">Video v2</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v3.html">Video v3</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v4.html">Video v4</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v5.html">Video v5</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v6.html">Video v6</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav3Collapse" data-target="#sidebarNav3Collapse">
                                                Single Episodes
                                            </a>

                                            <div id="sidebarNav3Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav3" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v1.html">Episode v1</a>
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v2.html">Episode v2</a>
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v3.html">Episode v3</a>
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v4.html">Episode v4</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav3One" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav3One">
                                                Other Pages
                                            </a>
                                            <div id="sidebarNav3One" class="navbar-nav flex-column collapse" data-parent="#sidebarNav3">
                                                <a class="dropdown-item" href="../other/landing-v1.html">Landing v1</a>
                                                <a class="dropdown-item" href="../other/landing-v2.html">Landing v2</a>
                                                <a class="dropdown-item" href="../other/coming-soon.html">Coming Soon</a>
                                                <a class="dropdown-item" href="../single-tv-show/single-tv-show.html">Single TV Show</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav3Two" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav3Two">
                                                Blog Pages
                                            </a>
                                            <div id="sidebarNav3Two" class="navbar-nav flex-column collapse" data-parent="#sidebarNav3">
                                                <a class="dropdown-item" href="../blog/blog.html">Blog</a>
                                                <a class="dropdown-item" href="../blog/blog-single.html">Single Blog</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav4Collapse" data-target="#sidebarNav4Collapse">
                                                Static Pages
                                            </a>

                                            <div id="sidebarNav4Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav4" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../static/contact.html">Contact Us</a>
                                                    <a class="dropdown-item" href="../static/404.html">404</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav4One" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav4One">
                                                Docs
                                            </a>
                                            <div id="sidebarNav4One" class="navbar-nav flex-column collapse" data-parent="#sidebarNav4">
                                                <a class="dropdown-item" href="../../documentation/index.html">Documentation</a>
                                                <a class="dropdown-item" href="../../snippets/index.html">Snippets</a>
                                            </div>
                                        </div>
                                        <!-- End Nav Link -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Sidebar Navbar -->
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </aside>
    <!-- End Sidebar Navigation -->

    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- Go to Top -->
    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
        data-hs-go-to-options='{
            "offsetTop": 700,
            "position": {
                "init": {
                    "right": 15
                },
                "show": {
                    "bottom": 15
                },
                "hide": {
                    "bottom": -15
                }
            }
        }'>
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- End Go to Top -->

    <!-- JS Global Compulsory -->
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="../../assets/vendor/hs-header/dist/hs-header.min.js"></script>
    <script src="../../assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
    <script src="../../assets/vendor/hs-unfold/dist/hs-unfold.min.js"></script>
    <script src="../../assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
    <script src="../../assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
    <script src="../../assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
    <script src="../../assets/vendor/hs-counter/dist/hs-counter.min.js"></script>
    <script src="../../assets/vendor/appear.js"></script>
    <script src="../../assets/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../../assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
    <script src="../../assets/vendor/aos/dist/aos.js"></script>
    <script src="../../assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="../../assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="../../assets/vendor/select2/dist/js/select2.full.min.js"></script>

    <!-- JS Vodi -->
    <script src="../../assets/js/hs.core.js"></script>
    <script src="../../assets/js/hs.validation.js"></script>
    <script src="../../assets/js/hs.cubeportfolio.js"></script>
    <script src="../../assets/js/hs.slick-carousel.js"></script>
    <script src="../../assets/js/hs.fancybox.js"></script>
    <script src="../../assets/js/hs.select2.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // initialization of header
            var header = new HSHeader($('#header')).init();

            // initialization of mega menu
            var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
                desktop: {
                    position: 'left'
                }
            }).init();

            // initialization of fancybox
            $('.js-fancybox').each(function () {
              var fancybox = $.HSCore.components.HSFancyBox.init($(this));
            });

            // initialization of unfold
            var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


            // initialization of slick carousel
            $('.js-slick-carousel').each(function() {
                var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
            });

            // initialization of form validation
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this), {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });
            });

            // initialization of show animations
            $('.js-animation-link').each(function () {
                var showAnimation = new HSShowAnimation($(this)).init();
            });

            // initialization of counter
            $('.js-counter').each(function() {
                var counter = new HSCounter($(this)).init();
            });

            // initialization of sticky block
            var cbpStickyFilter = new HSStickyBlock($('#cbpStickyFilter'));

            // initialization of cubeportfolio
            $('.cbp').each(function () {
                var cbp = $.HSCore.components.HSCubeportfolio.init($(this), {
                    layoutMode: 'grid',
                    filters: '#filterControls',
                    displayTypeSpeed: 0
                });
            });

            $('.cbp').on('initComplete.cbp', function() {
                // update sticky block
                cbpStickyFilter.update();

                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });
            });

            $('.cbp').on('filterComplete.cbp', function() {
                // update sticky block
                cbpStickyFilter.update();

                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });
            });

            $('.cbp').on('pluginResize.cbp', function() {
                // update sticky block
                cbpStickyFilter.update();
            });

            // animated scroll to cbp container
            $('#cbpStickyFilter').on('click', '.cbp-filter-item', function (e) {
                $('html, body').stop().animate({
                    scrollTop: $('#demoExamplesSection').offset().top
                }, 200);
            });

            // initialization of go to
            $('.js-go-to').each(function () {
                var goTo = new HSGoTo($(this)).init();
            });

            // initialization of select picker
            $('.js-custom-select').each(function () {
              var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>
        <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../../assets/vendor/polifills.js"><\/script>');
    </script>
</body>
</html>
