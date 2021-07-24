<!-- Start Modal ticket edit -->
@if (isset($answer))
        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        پاسخ و تمدید پیام
                    </h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-ui dt-sl">
                                <form class="form-account" action="">
                                    <div class="row">

                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    پاسخ پشتیبان
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                @if (isset($answer->message))
                                                    <textarea readonly class="input-ui pr-2 text-right">{{$answer->message}}</textarea>
                                                @else
                                                    <textarea readonly class="input-ui pr-2 text-right">هنوز پاسخی به پیام شما داده نشده است</textarea>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    نوشتن پاسخ
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <textarea class="input-ui pr-2 text-right" placeholder="پاسخ خود را اینجا بنویسید"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 pr-4 pl-4">
                                            <button type="button" class="btn btn-sm btn-primary btn-submit-form">
                                                پاسخ
                                            </button>
                                            <button type="button" class="btn-link-border float-left mt-2">انصراف
                                                و بازگشت</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- Google Map Start -->
                                <div class="goole-map">
                                    <img src="/img/icon/mosalas-400.png" class="img-fluid">
                                </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@else
        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        پاسخ پیام
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-ui dt-sl">
                                <form class="form-account" action="">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    پاسخ پشتیبان
                                                </h4>
                                            </div>
                                            <div class="form-row text-center">
                                                <p>پاسخی موجود نمی باشد</p>
                                            </div>
                                        </div>

                                        <div class="col-12 pr-4 pl-4">
                                            <button type="button" class="btn btn-sm btn-primary btn-submit-form">
                                                پاسخ
                                            </button>
                                            <button type="button" class="btn-link-border float-left mt-2">انصراف
                                                و بازگشت</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- Google Map Start -->
                            <div class="goole-map">
                                <div id="map-edit" style="height:440px"></div>
                            </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
<!-- End Modal ticket edit -->
