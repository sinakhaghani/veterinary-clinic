<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ویرایش اعضاء</h2>
                    </div>
                </div>
                <form wire:submit.prevent="update">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="" class="form-control round addpo"
                                                   placeholder="نام و نام خانوادگی" style="margin-top: 10px" required wire:model.defer="name">
                                            @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control round addpo"
                                                   placeholder="نوع دام" style="margin-top: 10px" required wire:model.defer="typeLivestock">
                                            @error('typeLivestock') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input style="margin-top: 10px" type="tel" id="" class="form-control round addpo" maxlength="11" minlength="11" placeholder="شماره موبایل" required wire:model.defer="mobile">
                                                @error('mobile') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="" class="form-control round addpo" placeholder="آدرس" style="margin-top: 10px" wire:model.defer="address">
                                                @error('address') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select  class="form-control round mt-1" style="width: 100%;" wire:model.defer="gender">
                                                    <option value="">جنسیت</option>
                                                    <option value="m">مرد</option>
                                                    <option value="f">زن</option>
                                                </select>
                                                @error('gender') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo" value="ثبت کن">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </div>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
