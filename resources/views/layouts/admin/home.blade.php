@extends('layouts.admin.master.master')
@section('pageTitle', 'Dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ env('APP_NAME') }}</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @admin
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Planos</p>
                                    <h4 class="mb-2">{{ $plans }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-calendar-2-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                @endadmin

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Usuários</p>
                                    <h4 class="mb-2"> {{ $users }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-user-3-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                @admin
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Empresas</p>
                                    <h4 class="mb-2"> {{ $companies }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-database-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                @endadmin

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Perfis</p>
                                    <h4 class="mb-2"> {{ $profiles }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-account-circle-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Categorias</p>
                                    <h4 class="mb-2"> {{ $categories }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-price-tag-3-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Produtos</p>
                                    <h4 class="mb-2">{{ $products }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-inbox-archive-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Mesas</p>
                                    <h4 class="mb-2">{{ $tables }}</h4>
                                    <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="ri-command-fill font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Pedidos de hoje</p>
                                    <h4 class="mb-2">{{ $orders }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                                </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-end d-none d-md-inline-block">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Import</a>
                                        <a class="dropdown-item" href="#">Download Report</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Email Sent</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">25,117</h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Marketplace</p>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">$34,856</h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Last Week</p>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">$18,225</h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>1.7 %
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Last Month</p>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                        <div class="card-body py-0 px-2" style="position: relative;">
                            <div id="area_chart" class="apex-charts" dir="ltr" style="min-height: 365px;"><div id="apexchartsbv4nbamc" class="apexcharts-canvas apexchartsbv4nbamc apexcharts-theme-light" style="width: 503px; height: 350px;"><svg id="SvgjsSvg1262" width="503" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1264" class="apexcharts-inner apexcharts-graphical" transform="translate(50.79997253417969, 40)"><defs id="SvgjsDefs1263"><clipPath id="gridRectMaskbv4nbamc"><rect id="SvgjsRect1270" width="442.7937774658203" height="261.11199999999997" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskbv4nbamc"><rect id="SvgjsRect1271" width="440.7937774658203" height="263.11199999999997" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1276" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1277" stop-opacity="0.65" stop-color="rgba(15,156,243,0.65)" offset="0"></stop><stop id="SvgjsStop1278" stop-opacity="0.5" stop-color="rgba(135,206,249,0.5)" offset="1"></stop><stop id="SvgjsStop1279" stop-opacity="0.5" stop-color="rgba(135,206,249,0.5)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1285" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1286" stop-opacity="0.65" stop-color="rgba(111,208,136,0.65)" offset="0"></stop><stop id="SvgjsStop1287" stop-opacity="0.5" stop-color="rgba(183,232,196,0.5)" offset="1"></stop><stop id="SvgjsStop1288" stop-opacity="0.5" stop-color="rgba(183,232,196,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1269" x1="0" y1="0" x2="0" y2="259.11199999999997" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="259.11199999999997" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1291" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1292" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1294" font-family="Helvetica, Arial, sans-serif" x="0" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1295">2015</tspan><title>2015</title></text><text id="SvgjsText1297" font-family="Helvetica, Arial, sans-serif" x="72.79896291097006" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1298">2016</tspan><title>2016</title></text><text id="SvgjsText1300" font-family="Helvetica, Arial, sans-serif" x="145.5979258219401" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1301">2017</tspan><title>2017</title></text><text id="SvgjsText1303" font-family="Helvetica, Arial, sans-serif" x="218.39688873291013" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1304">2018</tspan><title>2018</title></text><text id="SvgjsText1306" font-family="Helvetica, Arial, sans-serif" x="291.19585164388013" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1307">2019</tspan><title>2019</title></text><text id="SvgjsText1309" font-family="Helvetica, Arial, sans-serif" x="363.99481455485017" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1310">2020</tspan><title>2020</title></text><text id="SvgjsText1312" font-family="Helvetica, Arial, sans-serif" x="436.7937774658202" y="288.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1313">2021</tspan><title>2021</title></text></g><line id="SvgjsLine1314" x1="0" y1="260.11199999999997" x2="436.7937774658203" y2="260.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"></line></g><g id="SvgjsG1327" class="apexcharts-grid"><g id="SvgjsG1328" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1344" x1="0" y1="0" x2="436.7937774658203" y2="0" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1345" x1="0" y1="64.77799999999999" x2="436.7937774658203" y2="64.77799999999999" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1346" x1="0" y1="129.55599999999998" x2="436.7937774658203" y2="129.55599999999998" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1347" x1="0" y1="194.33399999999997" x2="436.7937774658203" y2="194.33399999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1348" x1="0" y1="259.11199999999997" x2="436.7937774658203" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1329" class="apexcharts-gridlines-vertical"><line id="SvgjsLine1330" x1="0" y1="0" x2="0" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1332" x1="72.79896291097005" y1="0" x2="72.79896291097005" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1334" x1="145.5979258219401" y1="0" x2="145.5979258219401" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1336" x1="218.39688873291016" y1="0" x2="218.39688873291016" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1338" x1="291.1958516438802" y1="0" x2="291.1958516438802" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1340" x1="363.9948145548502" y1="0" x2="363.9948145548502" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1342" x1="436.79377746582026" y1="0" x2="436.79377746582026" y2="259.11199999999997" stroke="#90a4ae" stroke-dasharray="0" class="apexcharts-gridline"></line></g><line id="SvgjsLine1331" x1="0" y1="260.11199999999997" x2="0" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1333" x1="72.79896291097005" y1="260.11199999999997" x2="72.79896291097005" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1335" x1="145.5979258219401" y1="260.11199999999997" x2="145.5979258219401" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1337" x1="218.39688873291016" y1="260.11199999999997" x2="218.39688873291016" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1339" x1="291.1958516438802" y1="260.11199999999997" x2="291.1958516438802" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1341" x1="363.9948145548502" y1="260.11199999999997" x2="363.9948145548502" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1343" x1="436.79377746582026" y1="260.11199999999997" x2="436.79377746582026" y2="266.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1350" x1="0" y1="259.11199999999997" x2="436.7937774658203" y2="259.11199999999997" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1349" x1="0" y1="1" x2="0" y2="259.11199999999997" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1272" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1273" class="apexcharts-series" seriesName="series1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1280" d="M 0 259.11199999999997L 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 142.5116 72.79896291097006 142.5116C 98.27859992980959 142.5116 120.1182888031006 220.24519999999995 145.59792582194012 220.24519999999995C 171.07756284077965 220.24519999999995 192.91725171407063 116.60039999999998 218.39688873291016 116.60039999999998C 243.87652575174968 116.60039999999998 265.7162146250407 204.05069999999998 291.19585164388025 204.05069999999998C 316.6754886627198 204.05069999999998 338.51517753601075 136.03379999999999 363.9948145548503 136.03379999999999C 389.4744515736898 136.03379999999999 411.3141404469808 213.76739999999998 436.7937774658203 213.76739999999998C 436.7937774658203 213.76739999999998 436.7937774658203 213.76739999999998 436.7937774658203 259.11199999999997M 436.7937774658203 213.76739999999998z" fill="url(#SvgjsLinearGradient1276)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbv4nbamc)" pathTo="M 0 259.11199999999997L 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 142.5116 72.79896291097006 142.5116C 98.27859992980959 142.5116 120.1182888031006 220.24519999999995 145.59792582194012 220.24519999999995C 171.07756284077965 220.24519999999995 192.91725171407063 116.60039999999998 218.39688873291016 116.60039999999998C 243.87652575174968 116.60039999999998 265.7162146250407 204.05069999999998 291.19585164388025 204.05069999999998C 316.6754886627198 204.05069999999998 338.51517753601075 136.03379999999999 363.9948145548503 136.03379999999999C 389.4744515736898 136.03379999999999 411.3141404469808 213.76739999999998 436.7937774658203 213.76739999999998C 436.7937774658203 213.76739999999998 436.7937774658203 213.76739999999998 436.7937774658203 259.11199999999997M 436.7937774658203 213.76739999999998z" pathFrom="M -1 259.11199999999997L -1 259.11199999999997L 72.79896291097006 259.11199999999997L 145.59792582194012 259.11199999999997L 218.39688873291016 259.11199999999997L 291.19585164388025 259.11199999999997L 363.9948145548503 259.11199999999997L 436.7937774658203 259.11199999999997"></path><path id="SvgjsPath1281" d="M 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 142.5116 72.79896291097006 142.5116C 98.27859992980959 142.5116 120.1182888031006 220.24519999999995 145.59792582194012 220.24519999999995C 171.07756284077965 220.24519999999995 192.91725171407063 116.60039999999998 218.39688873291016 116.60039999999998C 243.87652575174968 116.60039999999998 265.7162146250407 204.05069999999998 291.19585164388025 204.05069999999998C 316.6754886627198 204.05069999999998 338.51517753601075 136.03379999999999 363.9948145548503 136.03379999999999C 389.4744515736898 136.03379999999999 411.3141404469808 213.76739999999998 436.7937774658203 213.76739999999998" fill="none" fill-opacity="1" stroke="#0f9cf3" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbv4nbamc)" pathTo="M 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 142.5116 72.79896291097006 142.5116C 98.27859992980959 142.5116 120.1182888031006 220.24519999999995 145.59792582194012 220.24519999999995C 171.07756284077965 220.24519999999995 192.91725171407063 116.60039999999998 218.39688873291016 116.60039999999998C 243.87652575174968 116.60039999999998 265.7162146250407 204.05069999999998 291.19585164388025 204.05069999999998C 316.6754886627198 204.05069999999998 338.51517753601075 136.03379999999999 363.9948145548503 136.03379999999999C 389.4744515736898 136.03379999999999 411.3141404469808 213.76739999999998 436.7937774658203 213.76739999999998" pathFrom="M -1 259.11199999999997L -1 259.11199999999997L 72.79896291097006 259.11199999999997L 145.59792582194012 259.11199999999997L 218.39688873291016 259.11199999999997L 291.19585164388025 259.11199999999997L 363.9948145548503 259.11199999999997L 436.7937774658203 259.11199999999997"></path><g id="SvgjsG1274" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1356" r="0" cx="0" cy="0" class="apexcharts-marker w5lzivuybf no-pointer-events" stroke="#ffffff" fill="#0f9cf3" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1282" class="apexcharts-series" seriesName="series2" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath1289" d="M 0 259.11199999999997L 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 249.39529999999996 72.79896291097006 249.39529999999996C 98.27859992980959 249.39529999999996 120.1182888031006 97.16699999999997 145.59792582194012 97.16699999999997C 171.07756284077965 97.16699999999997 192.91725171407063 245.50861999999998 218.39688873291016 245.50861999999998C 243.87652575174968 245.50861999999998 265.7162146250407 22.67229999999998 291.19585164388025 22.67229999999998C 316.6754886627198 22.67229999999998 338.51517753601075 181.37839999999997 363.9948145548503 181.37839999999997C 389.4744515736898 181.37839999999997 411.3141404469808 239.67859999999996 436.7937774658203 239.67859999999996C 436.7937774658203 239.67859999999996 436.7937774658203 239.67859999999996 436.7937774658203 259.11199999999997M 436.7937774658203 239.67859999999996z" fill="url(#SvgjsLinearGradient1285)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskbv4nbamc)" pathTo="M 0 259.11199999999997L 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 249.39529999999996 72.79896291097006 249.39529999999996C 98.27859992980959 249.39529999999996 120.1182888031006 97.16699999999997 145.59792582194012 97.16699999999997C 171.07756284077965 97.16699999999997 192.91725171407063 245.50861999999998 218.39688873291016 245.50861999999998C 243.87652575174968 245.50861999999998 265.7162146250407 22.67229999999998 291.19585164388025 22.67229999999998C 316.6754886627198 22.67229999999998 338.51517753601075 181.37839999999997 363.9948145548503 181.37839999999997C 389.4744515736898 181.37839999999997 411.3141404469808 239.67859999999996 436.7937774658203 239.67859999999996C 436.7937774658203 239.67859999999996 436.7937774658203 239.67859999999996 436.7937774658203 259.11199999999997M 436.7937774658203 239.67859999999996z" pathFrom="M -1 259.11199999999997L -1 259.11199999999997L 72.79896291097006 259.11199999999997L 145.59792582194012 259.11199999999997L 218.39688873291016 259.11199999999997L 291.19585164388025 259.11199999999997L 363.9948145548503 259.11199999999997L 436.7937774658203 259.11199999999997"></path><path id="SvgjsPath1290" d="M 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 249.39529999999996 72.79896291097006 249.39529999999996C 98.27859992980959 249.39529999999996 120.1182888031006 97.16699999999997 145.59792582194012 97.16699999999997C 171.07756284077965 97.16699999999997 192.91725171407063 245.50861999999998 218.39688873291016 245.50861999999998C 243.87652575174968 245.50861999999998 265.7162146250407 22.67229999999998 291.19585164388025 22.67229999999998C 316.6754886627198 22.67229999999998 338.51517753601075 181.37839999999997 363.9948145548503 181.37839999999997C 389.4744515736898 181.37839999999997 411.3141404469808 239.67859999999996 436.7937774658203 239.67859999999996" fill="none" fill-opacity="1" stroke="#6fd088" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskbv4nbamc)" pathTo="M 0 259.11199999999997C 25.47963701883952 259.11199999999997 47.31932589213054 249.39529999999996 72.79896291097006 249.39529999999996C 98.27859992980959 249.39529999999996 120.1182888031006 97.16699999999997 145.59792582194012 97.16699999999997C 171.07756284077965 97.16699999999997 192.91725171407063 245.50861999999998 218.39688873291016 245.50861999999998C 243.87652575174968 245.50861999999998 265.7162146250407 22.67229999999998 291.19585164388025 22.67229999999998C 316.6754886627198 22.67229999999998 338.51517753601075 181.37839999999997 363.9948145548503 181.37839999999997C 389.4744515736898 181.37839999999997 411.3141404469808 239.67859999999996 436.7937774658203 239.67859999999996" pathFrom="M -1 259.11199999999997L -1 259.11199999999997L 72.79896291097006 259.11199999999997L 145.59792582194012 259.11199999999997L 218.39688873291016 259.11199999999997L 291.19585164388025 259.11199999999997L 363.9948145548503 259.11199999999997L 436.7937774658203 259.11199999999997"></path><g id="SvgjsG1283" class="apexcharts-series-markers-wrap" data:realIndex="1"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1357" r="0" cx="0" cy="0" class="apexcharts-marker wyu97xpqy no-pointer-events" stroke="#ffffff" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1275" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1284" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1351" x1="0" y1="0" x2="436.7937774658203" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1352" x1="0" y1="0" x2="436.7937774658203" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1353" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1354" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1355" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1358" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1359" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect1268" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1315" class="apexcharts-yaxis" rel="0" transform="translate(22.799972534179688, 0)"><g id="SvgjsG1316" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1317" font-family="Helvetica, Arial, sans-serif" x="20" y="41.4" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1318">400k</tspan></text><text id="SvgjsText1319" font-family="Helvetica, Arial, sans-serif" x="20" y="106.178" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1320">300k</tspan></text><text id="SvgjsText1321" font-family="Helvetica, Arial, sans-serif" x="20" y="170.956" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1322">200k</tspan></text><text id="SvgjsText1323" font-family="Helvetica, Arial, sans-serif" x="20" y="235.73399999999998" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1324">100k</tspan></text><text id="SvgjsText1325" font-family="Helvetica, Arial, sans-serif" x="20" y="300.51199999999994" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1326">0k</tspan></text></g></g><g id="SvgjsG1265" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 175px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(15, 156, 243);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(111, 208, 136);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 520px; height: 351px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-end d-none d-md-inline-block">
                                <div class="dropdown">
                                    <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">This Years<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Revenue</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5>17,493</h5>
                                            <p class="text-muted text-truncate mb-0">Marketplace</p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5>$44,960</h5>
                                            <p class="text-muted text-truncate mb-0">Last Week</p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div>
                                            <h5>$29,142</h5>
                                            <p class="text-muted text-truncate mb-0">Last Month</p>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                        <div class="card-body py-0 px-2" style="position: relative;">
                            <div id="column_line_chart" class="apex-charts" dir="ltr" style="min-height: 365px;"><div id="apexcharts91kk0yfsj" class="apexcharts-canvas apexcharts91kk0yfsj apexcharts-theme-light" style="width: 503px; height: 350px;"><svg id="SvgjsSvg1360" width="503" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1362" class="apexcharts-inner apexcharts-graphical" transform="translate(64.16683319091797, 30)"><defs id="SvgjsDefs1361"><clipPath id="gridRectMask91kk0yfsj"><rect id="SvgjsRect1368" width="441.45602874755855" height="281.412" x="-17.116851501464843" y="-1.15" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask91kk0yfsj"><rect id="SvgjsRect1369" width="425.2223257446289" height="297.11199999999997" x="-9" y="-9" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1367" x1="0" y1="0" x2="0" y2="279.11199999999997" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="279.11199999999997" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1413" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1414" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1416" font-family="Helvetica, Arial, sans-serif" x="0" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1417">Jan</tspan><title>Jan</title></text><text id="SvgjsText1419" font-family="Helvetica, Arial, sans-serif" x="37.0202114313299" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1420">Feb</tspan><title>Feb</title></text><text id="SvgjsText1422" font-family="Helvetica, Arial, sans-serif" x="74.0404228626598" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1423">Mar</tspan><title>Mar</title></text><text id="SvgjsText1425" font-family="Helvetica, Arial, sans-serif" x="111.06063429398968" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1426">Apr</tspan><title>Apr</title></text><text id="SvgjsText1428" font-family="Helvetica, Arial, sans-serif" x="148.0808457253196" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1429">May</tspan><title>May</title></text><text id="SvgjsText1431" font-family="Helvetica, Arial, sans-serif" x="185.10105715664946" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1432">Jun</tspan><title>Jun</title></text><text id="SvgjsText1434" font-family="Helvetica, Arial, sans-serif" x="222.1212685879794" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1435">Jul</tspan><title>Jul</title></text><text id="SvgjsText1437" font-family="Helvetica, Arial, sans-serif" x="259.14148001930926" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1438">Aug</tspan><title>Aug</title></text><text id="SvgjsText1440" font-family="Helvetica, Arial, sans-serif" x="296.1616914506392" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1441">Sep</tspan><title>Sep</title></text><text id="SvgjsText1443" font-family="Helvetica, Arial, sans-serif" x="333.1819028819691" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1444">Oct</tspan><title>Oct</title></text><text id="SvgjsText1446" font-family="Helvetica, Arial, sans-serif" x="370.20211431329903" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1447">Nov</tspan><title>Nov</title></text><text id="SvgjsText1449" font-family="Helvetica, Arial, sans-serif" x="407.22232574462896" y="308.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1450">Dec</tspan><title>Dec</title></text></g><line id="SvgjsLine1451" x1="-13.966851501464843" y1="280.11199999999997" x2="421.1891772460937" y2="280.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"></line></g><g id="SvgjsG1466" class="apexcharts-grid"><g id="SvgjsG1467" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1481" x1="-13.966851501464843" y1="0" x2="421.1891772460937" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1482" x1="-13.966851501464843" y1="55.822399999999995" x2="421.1891772460937" y2="55.822399999999995" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1483" x1="-13.966851501464843" y1="111.64479999999999" x2="421.1891772460937" y2="111.64479999999999" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1484" x1="-13.966851501464843" y1="167.4672" x2="421.1891772460937" y2="167.4672" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1485" x1="-13.966851501464843" y1="223.28959999999998" x2="421.1891772460937" y2="223.28959999999998" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1486" x1="-13.966851501464843" y1="279.11199999999997" x2="421.1891772460937" y2="279.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1468" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1469" x1="0" y1="280.11199999999997" x2="0" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1470" x1="37.0202114313299" y1="280.11199999999997" x2="37.0202114313299" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1471" x1="74.0404228626598" y1="280.11199999999997" x2="74.0404228626598" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1472" x1="111.0606342939897" y1="280.11199999999997" x2="111.0606342939897" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1473" x1="148.0808457253196" y1="280.11199999999997" x2="148.0808457253196" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1474" x1="185.1010571566495" y1="280.11199999999997" x2="185.1010571566495" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1475" x1="222.1212685879794" y1="280.11199999999997" x2="222.1212685879794" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1476" x1="259.14148001930926" y1="280.11199999999997" x2="259.14148001930926" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1477" x1="296.1616914506392" y1="280.11199999999997" x2="296.1616914506392" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1478" x1="333.1819028819691" y1="280.11199999999997" x2="333.1819028819691" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1479" x1="370.20211431329903" y1="280.11199999999997" x2="370.20211431329903" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1480" x1="407.22232574462896" y1="280.11199999999997" x2="407.22232574462896" y2="286.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1488" x1="0" y1="279.11199999999997" x2="407.2223257446289" y2="279.11199999999997" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1487" x1="0" y1="1" x2="0" y2="279.11199999999997" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1370" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1371" class="apexcharts-series" rel="1" seriesName="2020" data:realIndex="0"><path id="SvgjsPath1373" d="M -6.293435943326083 279.11199999999997L -6.293435943326083 150.72047999999998L 6.293435943326083 150.72047999999998L 6.293435943326083 150.72047999999998L 6.293435943326083 279.11199999999997L 6.293435943326083 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M -6.293435943326083 279.11199999999997L -6.293435943326083 150.72047999999998L 6.293435943326083 150.72047999999998L 6.293435943326083 150.72047999999998L 6.293435943326083 279.11199999999997L 6.293435943326083 279.11199999999997z" pathFrom="M -6.293435943326083 279.11199999999997L -6.293435943326083 279.11199999999997L 6.293435943326083 279.11199999999997L 6.293435943326083 279.11199999999997L 6.293435943326083 279.11199999999997L -6.293435943326083 279.11199999999997" cy="150.72047999999998" cx="6.293435943326083" j="0" val="23" barHeight="128.39151999999999" barWidth="12.586871886652165"></path><path id="SvgjsPath1374" d="M 30.726775488003817 279.11199999999997L 30.726775488003817 44.65791999999999L 43.313647374655986 44.65791999999999L 43.313647374655986 44.65791999999999L 43.313647374655986 279.11199999999997L 43.313647374655986 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 30.726775488003817 279.11199999999997L 30.726775488003817 44.65791999999999L 43.313647374655986 44.65791999999999L 43.313647374655986 44.65791999999999L 43.313647374655986 279.11199999999997L 43.313647374655986 279.11199999999997z" pathFrom="M 30.726775488003817 279.11199999999997L 30.726775488003817 279.11199999999997L 43.313647374655986 279.11199999999997L 43.313647374655986 279.11199999999997L 43.313647374655986 279.11199999999997L 30.726775488003817 279.11199999999997" cy="44.65791999999999" cx="43.313647374655986" j="1" val="42" barHeight="234.45407999999998" barWidth="12.586871886652165"></path><path id="SvgjsPath1375" d="M 67.74698691933371 279.11199999999997L 67.74698691933371 83.7336L 80.33385880598587 83.7336L 80.33385880598587 83.7336L 80.33385880598587 279.11199999999997L 80.33385880598587 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 67.74698691933371 279.11199999999997L 67.74698691933371 83.7336L 80.33385880598587 83.7336L 80.33385880598587 83.7336L 80.33385880598587 279.11199999999997L 80.33385880598587 279.11199999999997z" pathFrom="M 67.74698691933371 279.11199999999997L 67.74698691933371 279.11199999999997L 80.33385880598587 279.11199999999997L 80.33385880598587 279.11199999999997L 80.33385880598587 279.11199999999997L 67.74698691933371 279.11199999999997" cy="83.7336" cx="80.33385880598587" j="2" val="35" barHeight="195.37839999999997" barWidth="12.586871886652165"></path><path id="SvgjsPath1376" d="M 104.76719835066362 279.11199999999997L 104.76719835066362 128.39151999999999L 117.35407023731578 128.39151999999999L 117.35407023731578 128.39151999999999L 117.35407023731578 279.11199999999997L 117.35407023731578 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 104.76719835066362 279.11199999999997L 104.76719835066362 128.39151999999999L 117.35407023731578 128.39151999999999L 117.35407023731578 128.39151999999999L 117.35407023731578 279.11199999999997L 117.35407023731578 279.11199999999997z" pathFrom="M 104.76719835066362 279.11199999999997L 104.76719835066362 279.11199999999997L 117.35407023731578 279.11199999999997L 117.35407023731578 279.11199999999997L 117.35407023731578 279.11199999999997L 104.76719835066362 279.11199999999997" cy="128.39151999999999" cx="117.35407023731578" j="3" val="27" barHeight="150.72047999999998" barWidth="12.586871886652165"></path><path id="SvgjsPath1377" d="M 141.78740978199352 279.11199999999997L 141.78740978199352 39.075680000000006L 154.3742816686457 39.075680000000006L 154.3742816686457 39.075680000000006L 154.3742816686457 279.11199999999997L 154.3742816686457 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 141.78740978199352 279.11199999999997L 141.78740978199352 39.075680000000006L 154.3742816686457 39.075680000000006L 154.3742816686457 39.075680000000006L 154.3742816686457 279.11199999999997L 154.3742816686457 279.11199999999997z" pathFrom="M 141.78740978199352 279.11199999999997L 141.78740978199352 279.11199999999997L 154.3742816686457 279.11199999999997L 154.3742816686457 279.11199999999997L 154.3742816686457 279.11199999999997L 141.78740978199352 279.11199999999997" cy="39.075680000000006" cx="154.3742816686457" j="4" val="43" barHeight="240.03631999999996" barWidth="12.586871886652165"></path><path id="SvgjsPath1378" d="M 178.80762121332344 279.11199999999997L 178.80762121332344 156.30271999999997L 191.39449309997562 156.30271999999997L 191.39449309997562 156.30271999999997L 191.39449309997562 279.11199999999997L 191.39449309997562 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 178.80762121332344 279.11199999999997L 178.80762121332344 156.30271999999997L 191.39449309997562 156.30271999999997L 191.39449309997562 156.30271999999997L 191.39449309997562 279.11199999999997L 191.39449309997562 279.11199999999997z" pathFrom="M 178.80762121332344 279.11199999999997L 178.80762121332344 279.11199999999997L 191.39449309997562 279.11199999999997L 191.39449309997562 279.11199999999997L 191.39449309997562 279.11199999999997L 178.80762121332344 279.11199999999997" cy="156.30271999999997" cx="191.39449309997562" j="5" val="22" barHeight="122.80927999999999" barWidth="12.586871886652165"></path><path id="SvgjsPath1379" d="M 215.82783264465334 279.11199999999997L 215.82783264465334 184.21391999999997L 228.41470453130552 184.21391999999997L 228.41470453130552 184.21391999999997L 228.41470453130552 279.11199999999997L 228.41470453130552 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 215.82783264465334 279.11199999999997L 215.82783264465334 184.21391999999997L 228.41470453130552 184.21391999999997L 228.41470453130552 184.21391999999997L 228.41470453130552 279.11199999999997L 228.41470453130552 279.11199999999997z" pathFrom="M 215.82783264465334 279.11199999999997L 215.82783264465334 279.11199999999997L 228.41470453130552 279.11199999999997L 228.41470453130552 279.11199999999997L 228.41470453130552 279.11199999999997L 215.82783264465334 279.11199999999997" cy="184.21391999999997" cx="228.41470453130552" j="6" val="17" barHeight="94.89808" barWidth="12.586871886652165"></path><path id="SvgjsPath1380" d="M 252.84804407598324 279.11199999999997L 252.84804407598324 106.06255999999999L 265.4349159626354 106.06255999999999L 265.4349159626354 106.06255999999999L 265.4349159626354 279.11199999999997L 265.4349159626354 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 252.84804407598324 279.11199999999997L 252.84804407598324 106.06255999999999L 265.4349159626354 106.06255999999999L 265.4349159626354 106.06255999999999L 265.4349159626354 279.11199999999997L 265.4349159626354 279.11199999999997z" pathFrom="M 252.84804407598324 279.11199999999997L 252.84804407598324 279.11199999999997L 265.4349159626354 279.11199999999997L 265.4349159626354 279.11199999999997L 265.4349159626354 279.11199999999997L 252.84804407598324 279.11199999999997" cy="106.06255999999999" cx="265.4349159626354" j="7" val="31" barHeight="173.04943999999998" barWidth="12.586871886652165"></path><path id="SvgjsPath1381" d="M 289.8682555073131 279.11199999999997L 289.8682555073131 156.30271999999997L 302.45512739396526 156.30271999999997L 302.45512739396526 156.30271999999997L 302.45512739396526 279.11199999999997L 302.45512739396526 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 289.8682555073131 279.11199999999997L 289.8682555073131 156.30271999999997L 302.45512739396526 156.30271999999997L 302.45512739396526 156.30271999999997L 302.45512739396526 279.11199999999997L 302.45512739396526 279.11199999999997z" pathFrom="M 289.8682555073131 279.11199999999997L 289.8682555073131 279.11199999999997L 302.45512739396526 279.11199999999997L 302.45512739396526 279.11199999999997L 302.45512739396526 279.11199999999997L 289.8682555073131 279.11199999999997" cy="156.30271999999997" cx="302.45512739396526" j="8" val="22" barHeight="122.80927999999999" barWidth="12.586871886652165"></path><path id="SvgjsPath1382" d="M 326.88846693864303 279.11199999999997L 326.88846693864303 156.30271999999997L 339.4753388252952 156.30271999999997L 339.4753388252952 156.30271999999997L 339.4753388252952 279.11199999999997L 339.4753388252952 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 326.88846693864303 279.11199999999997L 326.88846693864303 156.30271999999997L 339.4753388252952 156.30271999999997L 339.4753388252952 156.30271999999997L 339.4753388252952 279.11199999999997L 339.4753388252952 279.11199999999997z" pathFrom="M 326.88846693864303 279.11199999999997L 326.88846693864303 279.11199999999997L 339.4753388252952 279.11199999999997L 339.4753388252952 279.11199999999997L 339.4753388252952 279.11199999999997L 326.88846693864303 279.11199999999997" cy="156.30271999999997" cx="339.4753388252952" j="9" val="22" barHeight="122.80927999999999" barWidth="12.586871886652165"></path><path id="SvgjsPath1383" d="M 363.90867836997296 279.11199999999997L 363.90867836997296 212.12511999999998L 376.4955502566251 212.12511999999998L 376.4955502566251 212.12511999999998L 376.4955502566251 279.11199999999997L 376.4955502566251 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 363.90867836997296 279.11199999999997L 363.90867836997296 212.12511999999998L 376.4955502566251 212.12511999999998L 376.4955502566251 212.12511999999998L 376.4955502566251 279.11199999999997L 376.4955502566251 279.11199999999997z" pathFrom="M 363.90867836997296 279.11199999999997L 363.90867836997296 279.11199999999997L 376.4955502566251 279.11199999999997L 376.4955502566251 279.11199999999997L 376.4955502566251 279.11199999999997L 363.90867836997296 279.11199999999997" cy="212.12511999999998" cx="376.4955502566251" j="10" val="12" barHeight="66.98687999999999" barWidth="12.586871886652165"></path><path id="SvgjsPath1384" d="M 400.92888980130283 279.11199999999997L 400.92888980130283 189.79616L 413.515761687955 189.79616L 413.515761687955 189.79616L 413.515761687955 279.11199999999997L 413.515761687955 279.11199999999997z" fill="rgba(15,156,243,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 400.92888980130283 279.11199999999997L 400.92888980130283 189.79616L 413.515761687955 189.79616L 413.515761687955 189.79616L 413.515761687955 279.11199999999997L 413.515761687955 279.11199999999997z" pathFrom="M 400.92888980130283 279.11199999999997L 400.92888980130283 279.11199999999997L 413.515761687955 279.11199999999997L 413.515761687955 279.11199999999997L 413.515761687955 279.11199999999997L 400.92888980130283 279.11199999999997" cy="189.79616" cx="413.515761687955" j="11" val="16" barHeight="89.31584" barWidth="12.586871886652165"></path></g></g><g id="SvgjsG1385" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1386" class="apexcharts-series" seriesName="2019" data:longestSeries="true" rel="1" data:realIndex="1"><path id="SvgjsPath1412" d="M 0 150.72047999999998L 37.0202114313299 100.48031999999998L 74.0404228626598 128.39151999999999L 111.06063429398971 66.98687999999999L 148.0808457253196 128.39151999999999L 185.10105715664952 100.48031999999998L 222.12126858797942 128.39151999999999L 259.1414800193093 66.98687999999999L 296.1616914506392 156.30271999999997L 333.1819028819691 106.06255999999999L 370.20211431329903 161.88495999999998L 407.2223257446289 189.79616" fill="none" fill-opacity="1" stroke="rgba(111,208,136,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2.3" stroke-dasharray="0" class="apexcharts-line" index="1" clip-path="url(#gridRectMask91kk0yfsj)" pathTo="M 0 150.72047999999998L 37.0202114313299 100.48031999999998L 74.0404228626598 128.39151999999999L 111.06063429398971 66.98687999999999L 148.0808457253196 128.39151999999999L 185.10105715664952 100.48031999999998L 222.12126858797942 128.39151999999999L 259.1414800193093 66.98687999999999L 296.1616914506392 156.30271999999997L 333.1819028819691 106.06255999999999L 370.20211431329903 161.88495999999998L 407.2223257446289 189.79616" pathFrom="M -1 279.11199999999997L -1 279.11199999999997L 37.0202114313299 279.11199999999997L 74.0404228626598 279.11199999999997L 111.06063429398971 279.11199999999997L 148.0808457253196 279.11199999999997L 185.10105715664952 279.11199999999997L 222.12126858797942 279.11199999999997L 259.1414800193093 279.11199999999997L 296.1616914506392 279.11199999999997L 333.1819028819691 279.11199999999997L 370.20211431329903 279.11199999999997L 407.2223257446289 279.11199999999997"></path><g id="SvgjsG1387" class="apexcharts-series-markers-wrap" data:realIndex="1"><g id="SvgjsG1389" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1390" r="3.5" cx="0" cy="150.72047999999998" class="apexcharts-marker wo15pkvux" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="1" default-marker-size="3.5"></circle><circle id="SvgjsCircle1391" r="3.5" cx="37.0202114313299" cy="100.48031999999998" class="apexcharts-marker w7p8i4q94" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1392" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1393" r="3.5" cx="74.0404228626598" cy="128.39151999999999" class="apexcharts-marker wbvib9p6i" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1394" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1395" r="3.5" cx="111.06063429398971" cy="66.98687999999999" class="apexcharts-marker w5gq3yl74i" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1396" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1397" r="3.5" cx="148.0808457253196" cy="128.39151999999999" class="apexcharts-marker wuvsnj89q" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1398" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1399" r="3.5" cx="185.10105715664952" cy="100.48031999999998" class="apexcharts-marker wukrac6s7h" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1400" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1401" r="3.5" cx="222.12126858797942" cy="128.39151999999999" class="apexcharts-marker w7eqospth" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1402" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1403" r="3.5" cx="259.1414800193093" cy="66.98687999999999" class="apexcharts-marker whkqezyhr" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="7" j="7" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1404" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1405" r="3.5" cx="296.1616914506392" cy="156.30271999999997" class="apexcharts-marker wrbfu5cqo" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="8" j="8" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1406" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1407" r="3.5" cx="333.1819028819691" cy="106.06255999999999" class="apexcharts-marker w1o07oa7y" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="9" j="9" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1408" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1409" r="3.5" cx="370.20211431329903" cy="161.88495999999998" class="apexcharts-marker w3jlsuyry" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="10" j="10" index="1" default-marker-size="3.5"></circle></g><g id="SvgjsG1410" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMask91kk0yfsj)"><circle id="SvgjsCircle1411" r="3.5" cx="407.2223257446289" cy="189.79616" class="apexcharts-marker wutmj81x9f" stroke="#6fd088" fill="#6fd088" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="11" j="11" index="1" default-marker-size="3.5"></circle></g></g></g><g id="SvgjsG1372" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1388" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1489" x1="-13.966851501464843" y1="0" x2="421.1891772460937" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1490" x1="-13.966851501464843" y1="0" x2="421.1891772460937" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1491" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1492" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1493" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1494" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1495" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect1366" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1452" class="apexcharts-yaxis" rel="0" transform="translate(16.199981689453125, 0)"><g id="SvgjsG1453" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1454" font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1455">50k</tspan></text><text id="SvgjsText1456" font-family="Helvetica, Arial, sans-serif" x="20" y="87.32239999999999" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1457">40k</tspan></text><text id="SvgjsText1458" font-family="Helvetica, Arial, sans-serif" x="20" y="143.14479999999998" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1459">30k</tspan></text><text id="SvgjsText1460" font-family="Helvetica, Arial, sans-serif" x="20" y="198.96719999999996" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1461">20k</tspan></text><text id="SvgjsText1462" font-family="Helvetica, Arial, sans-serif" x="20" y="254.78959999999995" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1463">10k</tspan></text><text id="SvgjsText1464" font-family="Helvetica, Arial, sans-serif" x="20" y="310.61199999999997" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1465">0k</tspan></text></g></g><g id="SvgjsG1363" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 175px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(15, 156, 243);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(111, 208, 136);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 520px; height: 351px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>

                            <h4 class="card-title mb-4">Latest Transactions</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th style="width: 120px;">Salary</th>
                                    </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                    <tr>
                                        <td><h6 class="mb-0">Charles Casey</h6></td>
                                        <td>Web Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            23
                                        </td>
                                        <td>
                                            04 Apr, 2021
                                        </td>
                                        <td>$42,450</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td><h6 class="mb-0">Alex Adams</h6></td>
                                        <td>Python Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                        </td>
                                        <td>
                                            28
                                        </td>
                                        <td>
                                            01 Aug, 2021
                                        </td>
                                        <td>$25,060</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                        <td>Senior Javascript Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            35
                                        </td>
                                        <td>
                                            15 Jun, 2021
                                        </td>
                                        <td>$59,350</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                        <td>React Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            25
                                        </td>
                                        <td>
                                            01 March, 2021
                                        </td>
                                        <td>$23,700</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                        <td>Senior Web Designer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            38
                                        </td>
                                        <td>
                                            01 Jan, 2021
                                        </td>
                                        <td>$69,185</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td><h6 class="mb-0">Den Simpson</h6></td>
                                        <td>Web Designer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                        </td>
                                        <td>
                                            21
                                        </td>
                                        <td>
                                            01 Sep, 2021
                                        </td>
                                        <td>$37,845</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td><h6 class="mb-0">Mahek Torres</h6></td>
                                        <td>Senior Laravel Developer</td>
                                        <td>
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                        </td>
                                        <td>
                                            32
                                        </td>
                                        <td>
                                            20 May, 2021
                                        </td>
                                        <td>$55,100</td>
                                    </tr>
                                    <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end">
                                <select class="form-select shadow-none form-select-sm">
                                    <option selected="">Apr</option>
                                    <option value="1">Mar</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Jan</option>
                                </select>
                            </div>
                            <h4 class="card-title mb-4">Monthly Earnings</h4>

                            <div class="row">
                                <div class="col-4">
                                    <div class="text-center mt-4">
                                        <h5>3475</h5>
                                        <p class="mb-2 text-truncate">Market Place</p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-4">
                                    <div class="text-center mt-4">
                                        <h5>458</h5>
                                        <p class="mb-2 text-truncate">Last Week</p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-4">
                                    <div class="text-center mt-4">
                                        <h5>9062</h5>
                                        <p class="mb-2 text-truncate">Last Month</p>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="mt-4" style="position: relative;">
                                <div id="donut-chart" class="apex-charts" style="min-height: 264.7px;"><div id="apexchartsolxzxdw6j" class="apexcharts-canvas apexchartsolxzxdw6j apexcharts-theme-light" style="width: 298px; height: 264.7px;"><svg id="SvgjsSvg1496" width="298" height="264.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1498" class="apexcharts-inner apexcharts-graphical" transform="translate(19, 0)"><defs id="SvgjsDefs1497"><clipPath id="gridRectMaskolxzxdw6j"><rect id="SvgjsRect1500" width="268" height="286" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskolxzxdw6j"><rect id="SvgjsRect1501" width="266" height="288" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1502" class="apexcharts-pie"><g id="SvgjsG1503" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle1504" r="88.91756097560976" cx="131" cy="131" fill="transparent"></circle><g id="SvgjsG1505" class="apexcharts-slices"><g id="SvgjsG1506" class="apexcharts-series apexcharts-pie-series" seriesName="MarketxPlace" rel="1" data:realIndex="0"><path id="SvgjsPath1507" d="M 131 9.195121951219505 A 121.8048780487805 121.8048780487805 0 1 1 126.39072354321841 252.71763589153073 L 127.63522818654944 219.85387420081742 A 88.91756097560976 88.91756097560976 0 1 0 131 42.08243902439024 L 131 9.195121951219505 z" fill="rgba(15,156,243,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="182.16867469879517" data:startAngle="0" data:strokeWidth="2" data:value="42" data:pathOrig="M 131 9.195121951219505 A 121.8048780487805 121.8048780487805 0 1 1 126.39072354321841 252.71763589153073 L 127.63522818654944 219.85387420081742 A 88.91756097560976 88.91756097560976 0 1 0 131 42.08243902439024 L 131 9.195121951219505 z" stroke="#ffffff"></path></g><g id="SvgjsG1508" class="apexcharts-series apexcharts-pie-series" seriesName="LastxWeek" rel="2" data:realIndex="1"><path id="SvgjsPath1509" d="M 126.39072354321841 252.71763589153073 A 121.8048780487805 121.8048780487805 0 0 1 20.553228507298755 79.63912984267765 L 50.37385681032809 93.5065647851547 A 88.91756097560976 88.91756097560976 0 0 0 127.63522818654944 219.85387420081742 L 126.39072354321841 252.71763589153073 z" fill="rgba(111,208,136,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="112.77108433734938" data:startAngle="182.16867469879517" data:strokeWidth="2" data:value="26" data:pathOrig="M 126.39072354321841 252.71763589153073 A 121.8048780487805 121.8048780487805 0 0 1 20.553228507298755 79.63912984267765 L 50.37385681032809 93.5065647851547 A 88.91756097560976 88.91756097560976 0 0 0 127.63522818654944 219.85387420081742 L 126.39072354321841 252.71763589153073 z" stroke="#ffffff"></path></g><g id="SvgjsG1510" class="apexcharts-series apexcharts-pie-series" seriesName="LastxMonth" rel="3" data:realIndex="2"><path id="SvgjsPath1511" d="M 20.553228507298755 79.63912984267765 A 121.8048780487805 121.8048780487805 0 0 1 130.9787410384385 9.195123806413875 L 130.9844809580601 42.082440378682136 A 88.91756097560976 88.91756097560976 0 0 0 50.37385681032809 93.5065647851547 L 20.553228507298755 79.63912984267765 z" fill="rgba(255,187,68,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="65.06024096385545" data:startAngle="294.93975903614455" data:strokeWidth="2" data:value="15" data:pathOrig="M 20.553228507298755 79.63912984267765 A 121.8048780487805 121.8048780487805 0 0 1 130.9787410384385 9.195123806413875 L 130.9844809580601 42.082440378682136 A 88.91756097560976 88.91756097560976 0 0 0 50.37385681032809 93.5065647851547 L 20.553228507298755 79.63912984267765 z" stroke="#ffffff"></path></g></g></g><g id="SvgjsG1512" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"><text id="SvgjsText1513" font-family="Helvetica, Arial, sans-serif" x="131" y="136" text-anchor="middle" dominant-baseline="auto" font-size="17px" font-weight="600" fill="#6c757d" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Ethereum</text></g></g><line id="SvgjsLine1514" x1="0" y1="0" x2="262" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1515" x1="0" y1="0" x2="262" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1499" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(15, 156, 243);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(111, 208, 136);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 187, 68);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 299px; height: 266px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>

    </div>
@endsection
