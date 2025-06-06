@extends('front_end.template.layout')
@section('header')

@stop

@section('content')
<div class="body-overlay fs-wrapper search-form-overlay close-search-form"></div>
            <!--header-end-->
            <!--warpper-->
            <div class="wrapper">
                <!--content-->
                <div class="content" style=" background: #faf6f2;">
                    <!--section-->
                       <div class="section hero-section inner-head" style=" background: #faf6f2;">
                        <div class="hero-section-wrap">
                            <div class="hero-section-wrap-item">
                                <div class="container">
                                    <div class="hero-section-container">

                                        <div class="hero-section-title_container">

                                            <div class="hero-section-title">
                                                <h2 >{{ __('messages.checkout') }}</h2>

                                            </div>

                                        </div>
                                        <div class="hs-scroll-down-wrap">
                                            <div class="scroll-down-item">
                                                <div class="mousey">
                                                    <div class="scroller"></div>
                                                </div>
                                                <span>{{ __('messages.scroll_down_to_discover') }}</span>
                                            </div>
                                            <div class="svg-corner svg-corner_white"  style="bottom:0;left:-40px;"></div>
                                        </div>


                                    </div>
                                </div>
                                <div class="bg-wrap bg-hero bg-parallax-wrap-gradien fs-wrapper" data-scrollax-parent="true">
                                    <div class="bg" data-bg="{{ asset('') }}front-assets/images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                                </div>
                                <div class="svg-corner svg-corner_white"  style="bottom:64px;right: 0;z-index: 100"></div>
                            </div>
                        </div>
                    </div>


                    <!--section-end-->
                    <!--container-->
                    <div class="container">
                        <!--breadcrumbs-list-->
                        <!-- <div class="breadcrumbs-list bl_flat">
                            <a href="#">Home</a><span>About Us</span>
                            <div class="breadcrumbs-list_dec"><i class="fa-thin fa-arrow-up"></i></div>
                        </div> -->
                        <!--breadcrumbs-list end-->
                    </div>
                    <!--container end-->
                    <!--main-content-->
                    <div class="main-content ms_vir_height">
                            <!--container-->
                                    <div class="container">
                                        <!--boxed-container-->
                                        <div class="boxed-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="card p-2">
                                                        <?php
                                                            $rent = $property->price;
                                                            $deposit = $rent;
                                                            $administrative_fee  = $rent/2;
                                                            $total = $rent+$deposit+$administrative_fee;

                                                        ?>

                                                        <div class="card text-start">
                                                                            <div class="card-body">
                                                                                <form id="rentCalculatorForm" data-parsley-validate="true" action="{{ url('get_payment_dates') }}" >
                                                                                    @csrf()
                                                                                    <input type="hidden" name="property_id" value="{{$property->id}}">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label for="loanAmount" class="form-label">{{ __('messages.desired_rental_duration') }} <small style="font-size: 10px !important;">{{ __('messages.in_months') }}</small></label>
                                                                                            <input type="text" data-parsley-type="integer" class="form-control" id="desired_rental_duration" required  data-parsley-type-message="{{ __('messages.this_value_should_be_a_valid_integer') }}" data-parsley-required-message="" name="desired_rental_duration" data-parsley-greater-than-zero="true">
                                                                                        </div>



                                                                                        <div class="col-md-4">

                                                                                            <button type="submit" class="btn btn-warning w-100" style="border-radius: 4px; margin-top: 30px">{{ __('messages.show_payment_dates') }}</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive ">
                                                                                    <table class="payment-table table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>{{ __('messages.payment') }}</th>
                                                                                                <th>{{ __('messages.month') }}</th>
                                                                                                <th>{{ __('messages.amount') }}</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="calculate_em_tbody">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-start">
                                                    <div class="listing-item mb-2">
                                                        <div class="geodir-category-listing border">
                                                            <div class="geodir-category-content border-0">
                                                                <h3 class="mb-1">
                                                                    <a href="{{ url('property-details/'.$property->slug) }}"> {{$property->name}}</a>
                                                                </h3>
                                                                <div class="user-dasboard-menu_header-avatar mt-2">
                                                                    <img style="width: 40px; height: 40px" src="{{ asset('') }}front-assets/images/avatar/profile-icon.png" alt="">
                                                                    <span style="margin-top: 9px;"> <strong>{{ \Auth::user()->name }}</strong></span>
                                                                    <!-- <div class="db-menu_modile_btn"><strong>{{ __('messages.menu') }}</strong><i class="fa-regular fa-bars"></i></div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{ url('book-rent-now', $property->id) }}" method="get" data-parsley-validate="true">
                                                        <ul class="list-group mb-3">
                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.unit_number') }}</h6>
                                                                </div>
                                                                <span class="text-dark">{{ $property->apartment_no }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __("messages.beds") }}</h6>
                                                                </div>
                                                                <span class="text-dark">{{ $property->bedrooms }} </span>
                                                            </li>

                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.net_area') }}</h6>
                                                                </div>
                                                                <span class="text-dark">{{ $property->area }} m2</span>
                                                            </li>

                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.monthly_rental_cost') }}</h6>
                                                                </div>
                                                                <span class="text-dark">{{ moneyFormat($property->price) }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.security_deposit') }}</h6>
                                                                </div>
                                                                <span class="text-dark">{{ moneyFormat($deposit) }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.administrative_fee') }}</h6>
                                                                </div>
                                                                <span class="text-dark">{{ moneyFormat($administrative_fee) }}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.amount_due_at_booking') }}</h6>
                                                                </div>
                                                                <span class="text-dark" style="font-weight: 600">{{ moneyFormat($total) }}</span>
                                                            </li>

                                                            <li class="list-group-item d-flex justify-content-between lh-condensed py-3 total_rent_li d-none">
                                                                <div>
                                                                    <h6 class="my-0">{{ __('messages.total_rent') }}</h6>
                                                                </div>
                                                                <span class="text-dark total_rent_span" style="font-weight: 600"></span>
                                                            </li>

                                                        </ul>
                                                        <div class="card d-block p-3 text-center">

                                                            <h6 class="my-0">{{ __('messages.payable_amount') }}</h6>
                                                            <span class="text-dark fs-4 dp_span d-block mb-3" style="font-weight: 600">{{ moneyFormat($total) }}</span>
                                                            <!-- <a href="{{ url('book-now', $property->id) }}" class="whatsapp-btn commentssubmit_fw mt-3">{{ __('messages.pay') }}</a> -->
                                                            <div class="form-check form-check-inline me-0">
  <input class="form-check-input " type="checkbox" id="inlineCheckbox1" value="option1" data-parsley-errors-container="#agree_err" required data-parsley-required-message="{{ __('messages.please_accept_terms') }}">
  <label class="form-check-label" for="inlineCheckbox1">{{ __('messages.agree') }}</label>
</div>


<a href="#" class="d-inline-block text-decoration-underline" data-bs-toggle="modal" data-bs-target="#terms">{{ __('messages.terms_conditions') }}</a>
<br>
<span id="agree_err"></span><div class="modal fade" id="terms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Terms & conditions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5">
      <div class="agent-card-item_text-item text-start">
                                                            <h4><a href="agent-single.html">Reservation</a></h4>

<ul style="list-style-type: disc;">
    <li >A non-refundable reservation fee of half a month’s rent must be paid for the unit. This amount is non-refundable in case of cancellation.</li>
    <li>The reservation is valid for seven (7) days from the date the reservation fee is paid.</li>
    <li>The client must complete all rental procedures within the seven (7) day period.</li>
    <li>If the client fails to comply, the reservation will be automatically canceled, and the client will not be entitled to a refund of the reservation fee or any compensation from the company.</li>
</li>
</ul>
  </div>

  <div class="agent-card-item_text-item text-start mt-3">
                                                            <h4><a href="agent-single.html">Rental</a></h4>

<ul style="list-style-type: disc;">
    <li >The tenant must pay the security deposit and administrative fees upon confirming the reservation.</li>
    <li >All paid amounts (including rent, security deposit, and administrative fees) are non-refundable in case of cancellation.</li>
    <li >The apartment is designated for residential use only and cannot be used for commercial or illegal purposes.</li>
    <li >The lease term specified in the agreement must be adhered to, and any extension must be coordinated in advance.</li>
    <li >The company reserves the right to amend the terms and conditions at any time with notification to tenants via the website.</li>
    <li >The client must ensure the monthly rent is paid on time.</li>

</ul>
  </div>
<h4 class="fs-5 fw-bold mt-3">Sales Terms and Conditions
</h4>
  <div class="agent-card-item_text-item text-start mt-3">
                                                            <h4><a href="agent-single.html">Reservation</a></h4>

<ul style="list-style-type: disc;">
    <li >A non-refundable reservation fee of 10,000 Qatari Riyals must be paid for the unit. This amount is non-refundable in case of cancellation.</li>
    <li >The reservation is valid for thirty (30) days from the date the reservation fee is paid.</li>
    <li >The client must complete all procedures for contract signing and payment of the due amount within the thirty (30) day period.</li>
    <li >If the client fails to comply, the reservation will be automatically canceled, and the client will not be entitled to a refund of the reservation fee or any compensation from the company.</li>

</ul>
  </div>

  <div class="agent-card-item_text-item text-start mt-3">
                                                            <h4><a href="agent-single.html">Purchase</a></h4>

<ul style="list-style-type: disc;">
    <li >A down payment, along with non-refundable administrative fees, must be paid, which can be done electronically or through the company’s office. </li>
    <li >The client must pay all future installments according to the schedule outlined in the contract.</li>
    <li >The company reserves the right to take legal action in case of any breach of the contract terms.</li>

</li>

</ul>
  </div>

      </div>

    </div>
  </div>
</div>

                                                            <button type="submit" name="submit" value="book" class="whatsapp-btn commentssubmit_fw mt-3">{{ __('messages.pay') }}</button>


                                                            <a href="#" class="btn-black commentssubmit_fw mt-2" data-bs-toggle="modal" data-bs-target="#Disclaimer">
                                                            {{ __('messages.reserve_now') }}
                                                                                                                        </a>
                                                                                                                    <!-- Modal -->
                                                            <div class="modal fade" id="Disclaimer" tabindex="-1" role="dialog" aria-labelledby="DisclaimerTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title fs-5 fw-bold">{{ __('messages.disclaimer') }}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <p class="text-center " style="font-size: 14px;
                                                                    font-weight: 300; lighn-height: normal">{{ __('messages.minimum_amount_to_reserve_is_1000_qar_reservation_is_valid_for_7_days_amount_is_non_refundable_in_case_of_cancellation') }}</p>
                                                                    </div>
                                                                    <div class="modal-footer text-center justify-content-center">

                                                                        <button type="submit" name="submit" value="reserve" class="btn commentssubmit commentssubmit_fw">{{ __('messages.agree') }}</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--boxed-container end-->
                                    </div>
                                </div>

@stop

@section('script')
<script>

</script>
@stop
