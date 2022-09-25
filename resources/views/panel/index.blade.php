@extends('panel.layout')

@section('content')

  <div class="row" style="padding:7px;">
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <div class="ibox-tools">
                                      <span class="label label-success float-right">Accounts</span>
                                  </div>
                                  <h5>Accounts</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">599</h1>
                                  <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                                  <small></small>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <div class="ibox-tools">
                                      <span class="label label-info float-right">Annual</span>
                                  </div>
                                  <h5>Orders</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">275,800</h1>
                                  <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                  <small>New orders</small>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <div class="ibox-tools">
                                      <span class="label label-primary float-right">Today</span>
                                  </div>
                                  <h5>visits</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">106,120</h1>
                                  <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                  <small>New visits</small>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <div class="ibox-tools">
                                      <span class="label label-danger float-right">Low value</span>
                                  </div>
                                  <h5>User activity</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">80,600</h1>
                                  <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                  <small>In first month</small>
                              </div>
                          </div>
              </div>
          </div>

@endsection
