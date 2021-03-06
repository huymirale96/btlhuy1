@extends('layout.master')
@section('title', 'Real Estate')
@section('parentPageTitle', 'Dashboard')


@section('content')

<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body">
                <h3 class="number count-to" data-from="0" data-to="128" data-speed="2000" data-fresh-interval="700" >128</h3>                        
                <p class="text-muted">New Project</p>
                <div class="progress progress-xs">
                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <small>Change 27%</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body">
                <h3 class="number count-to" data-from="0" data-to="758" data-speed="2000" data-fresh-interval="700" >758</h3>
                <p class="text-muted">Total Project</p>
                <div class="progress progress-xs">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <small>Change 9%</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body">
                <h3 class="number count-to" data-from="0" data-to="2521" data-speed="2000" data-fresh-interval="700" >2521</h3>
                <p class="text-muted">Properties for Rent</p>
                <div class="progress progress-xs">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <small>Change 17%</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="body">
                <h3>$ 24,500</h3>
                <p class="text-muted">Total Earnings(Years)</p>
                <div class="progress progress-xs">
                    <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <small>Change 13%</small>
            </div>
        </div>
    </div>            
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Property Stats</h2>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">                            
                <div id="m_bar_chart" class="graph"></div>                            
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card top_counter">
            <div class="body">
                <div class="icon text-info"><i class="fa fa-building"></i> </div>
                <div class="content">
                    <div class="text">Properties</div>
                    <h5 class="number">53,251</h5>
                </div>
            </div>                        
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card top_counter">
            <div class="body">
                <div class="icon text-warning"><i class="fa fa-area-chart"></i> </div>
                <div class="content">
                    <div class="text">Growth</div>
                    <h5 class="number">62%</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card top_counter">
            <div class="body">
                <div class="icon text-danger"><i class="fa fa-shopping-cart"></i> </div>
                <div class="content">
                    <div class="text">Total Sales</div>
                    <h5 class="number">$3205</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card top_counter">
            <div class="body">
                <div class="icon"><i class="fa fa-tag"></i> </div>
                <div class="content">
                    <div class="text">Rented</div>
                    <h5 class="number">3,217</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Income Analysis<small>8% High then last month</small></h2>
                
            </div>
            <div class="body">                            
                <div class="sparkline-pie text-center">6,4,8</div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Sales Income<small >All Earnings are in million $</small></h2>
            </div>
            <div class="body">
                <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                    data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                    data-offset="90" data-width="100%" data-height="100px" data-line-Width="1" data-line-Color="#ffcd55"
                    data-fill-Color="#ffcd55">2,4,3,1,5,7,3,2</div>
                <div class="stats-report">
                    <div class="stat-item">
                    <h5>Overall</h5>
                    <b class="col-indigo">7,000</b></div>
                    <div class="stat-item">
                    <h5>2016</h5>
                    <b class="col-indigo">2,000</b></div>
                    <div class="stat-item">
                    <h5>2017</h5>
                    <b class="col-indigo">5,000</b></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Rent Income<small>All Earnings are in million $</small></h2>                            
            </div>
            <div class="body">                           
                <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                data-offset="90" data-width="100%" data-height="100px" data-line-Width="1" data-line-Color="#02b5b2"
                data-fill-Color="#02b5b2">5,1,2,1,4,3,9,2</div>
                <div class="stats-report">
                    <div class="stat-item">
                    <h5>Overall</h5>
                    <b class="col-indigo">3,200</b></div>
                    <div class="stat-item">
                    <h5>2016</h5>
                    <b class="col-indigo">1,200</b></div>
                    <div class="stat-item">
                    <h5>2017</h5>
                    <b class="col-indigo">2,000</b></div>
                </div>
            </div>
        </div>
    </div>                            
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Property List</h2>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">                          
            <div class="table-responsive">
                <table class="table table-hover m-b-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>BHK</th>
                            <th>Properties Type</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Area (Sq.Ft.)</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 BHK</td>
                            <td>Apartment</td>
                            <td>70 Bowman St. South Windsor, CT 06074</td>
                            <td>Ready To Move</td>
                            <td>839</td>
                            <td>$ 398</td>
                        </tr>
                        <tr>
                            <td>1 BHK</td>
                            <td>Apartment</td>
                            <td>123 6th St. Melbourne, FL 32904</td>
                            <td>Under Construction</td>
                            <td>1870 & 1994</td>
                            <td>$ 425</td>
                        </tr>
                        <tr>
                            <td>5 BHK</td>
                            <td>Apartment</td>
                            <td>123 6th St. Melbourne, FL 32904</td>
                            <td>Under Construction</td>
                            <td>839</td>
                            <td>$ 1,800</td>
                        </tr>
                        <tr>
                            <td>Villa</td>
                            <td>Villa</td>
                            <td>44 Shirley Ave. West Chicago, IL 60185</td>
                            <td>Ready To Move</td>
                            <td>2400</td>
                            <td>$ 2,500</td>
                        </tr>
                        <tr>
                            <td>1 BHK</td>
                            <td>Apartment</td>
                            <td>70 Bowman St. South Windsor, CT 06074</td>
                            <td>Under Construction</td>
                            <td>839</td>
                            <td>$ 421</td>
                        </tr>
                        <tr>
                            <td>1.5 BHK</td>
                            <td>Apartment</td>
                            <td>123 6th St. Melbourne, FL 32904</td>
                            <td>New Launch</td>
                            <td>1826 & 1948</td>
                            <td>$ 780</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

@stop
