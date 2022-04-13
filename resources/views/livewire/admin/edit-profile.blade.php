<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ویرایش پروفایل</h2>
                    </div>
                </div>
                <form wire:submit.prevent="change">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="name" name="name" class="form-control round addpo"
                                                   placeholder="نام و نام خانوادگی" style="margin-top: 10px" wire:model.defer="name">
                                            @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="email" name="email" class="form-control round addpo"
                                                   placeholder="نام ایمیل" style="margin-top: 10px" required wire:model.defer="email">
                                            @error('email') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="mobile" name="mobile" class="form-control round addpo"
                                                   placeholder="شماره موبایل" style="margin-top: 10px" required wire:model.defer="mobile">
                                            @error('mobile') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body mt-4">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input id="change" type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo" value="ثبت کن">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">تغییر رمز عبور</h2>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="password" id="" class="form-control round addpo"
                                                   placeholder="رمز عبور" style="margin-top: 10px" wire:model.defer="password">
                                            @error('password') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="password" id="" class="form-control round addpo"
                                                   placeholder="تکرار رمز عبور" style="margin-top: 10px" wire:model.defer="password_confirmation">
                                            @error('password_confirmation') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body mt-4">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input wire:click="changePassword" id="" type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo" value="ثبت کن">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let name = "{{ $users['name'] }}";
        let email = "{{ $users['email'] }}";
        let mobile = "{{ $users['mobile'] }}";

        $("#name").val(name);
        $("#email").val(email);
        $("#mobile").val(mobile);

        $('#change').on('click',function(){
            $('input[type=text]').each(function () {
                @this.set(this.name, $(this).val(), true);
            });
           /* @this.set('mobile', mobile, true)
            @this.set('name', name, true)
            @this.set('email', email, true)*/
        });

    });
</script>

<script src="{{ mix('/js/app.js') }}"></script>
