<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت شناسنامه</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="نام دام" style="margin-top: 10px" wire:model.defer="nameLive">
                                            @error('nameLive') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control round" type="text" placeholder="جستجوی دامدار" wire:model="searchLivestock">
                                            <select  class="select round mt-1" tabindex="1" style="width: 100%;" wire:model="owner">
                                                <option value="">نام دامدار انتخاب کنید</option>
                                                @foreach($livestock as $item)
                                                    <option value="{{ $item['id'] }}"> {{ $item['name'].' '.$item['mobile'] }}  </option>
                                                @endforeach
                                            </select>
                                            @error('owner') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="form-control round addpo" wire:model.defer="typeLivestock">
                                                    <option value="">نوع دام را انتخاب کنید</option>
                                                @foreach($option as $item)
                                                        <option value="{{ $item['id'] }}" > {{ $item['title'] }}  </option>
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
                                                <input value="" id="dateBirth" type="text" class="persianDatePicker form-control round addpo"
                                                            placeholder="تاریخ تولد" style="margin-top: 10px" wire:model.defer="dateBirth">
                                                @error('dateBirth') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <input style="margin-top: 10px" type="text" id="roundText" class="form-control round addpo" placeholder="نژاد" wire:model.defer="race">
                                                @error('race') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <select style="margin-top: 10px" class="form-control round addpo" wire:model.defer="sex">
                                                    <option value="">جنسیت</option>
                                                    <option value="male">نر</option>
                                                    <option value="female">ماده</option>
                                                </select>
                                                @error('sex') <span class="mt-2 text-danger">{{ $message }}</span> @enderror

                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="color" class="form-control round addpo" placeholder="رنگ" style="margin-top: 10px" wire:model.defer="color">
                                                @error('color') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
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

    <script>


       /* document.addEventListener('livewire:load', function () {

        @this.set('dateBirth', 'aaaaa', true);

        });*/

    </script>

