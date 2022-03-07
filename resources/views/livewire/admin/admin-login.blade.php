<div class="wrapper"><!--Login Page Starts-->
    <section id="login">
        <div class="container-fluid">
            <div class="row full-height-vh">
                <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                    <div class="card px-4 py-2 box-shadow-2 width-400">
                        <div class="card-header text-center">
                            <img src="/client/img/login.png" alt="company-logo" class="mb-3" width="80">
                            <h4 class="text-uppercase text-bold-400 grey darken-1">@lang('messages.login.login')</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <form wire:submit.prevent="login">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="@lang('messages.login.email_or_mobile')" required wire:model.debounce.1000ms="email">
                                            @error('email') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-lg" name="inputPass" id="inputPass" placeholder="@lang('messages.login.password')" required wire:model.debounce.1000ms="password">
                                            @error('password') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center col-md-12">
                                            <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">@lang('messages.login.login')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer grey darken-1">
                            <div class="text-center mb-1">@lang('messages.login.reset_password') <a><b>@lang('messages.login.recovery')</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Login Page Ends-->
</div>
<script src="{{ mix('/js/app.js') }}"></script>

