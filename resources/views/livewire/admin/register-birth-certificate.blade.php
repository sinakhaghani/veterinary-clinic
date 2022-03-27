<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت نام دامدار</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="نام" style="margin-top: 10px" required wire:model.debounce.1000ms="name">
                                            @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="form-control round addpo">
                                                    <option value="">نوع دام را انتخاب کنید</option>
                                                @foreach($option as $item)
                                                        <option value="{{ $item['id'] }}" wire:model="typeLivestock.{{$item['id']}}"> {{ $item['title'] }}  </option>
                                                @endforeach
                                                </select>
                                                @error('typeLivestock') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input style="margin-top: 10px" type="text" id="roundText" class="form-control round addpo" placeholder="نژاد" required wire:model.debounce.1000ms="race">
                                                @error('mobile') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="roundText" class="persianDatePicker form-control round addpo" placeholder="تاریخ تولد" style="margin-top: 10px" wire:model.debounce.1000ms="dateBirth">
                                                @error('address') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="roundText" class="form-control round addpo" placeholder="جنس" style="margin-top: 10px" wire:model.debounce.1000ms="sex">
                                                @error('address') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="roundText" class="form-control round addpo" placeholder="رنگ" style="margin-top: 10px" wire:model.debounce.1000ms="color">
                                                @error('address') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
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

