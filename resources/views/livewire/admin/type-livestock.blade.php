<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت نوع دام</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="نام دام" style="margin-top: 10px" required wire:model.debounce.1000ms="title">
                                            @error('title') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <label class="form-check-label font-medium-1" for="inlineCheckbox1">داروها:</label>
                                        <div class="col-md-12 mt-2">
                                           @foreach($medicineGet as $medicine)
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label font-medium-1" for="inlineCheckbox1">{{ $medicine['title'] }}</label>
                                                    <input class="form-check-input" type="checkbox" name="medicine" id="inlineCheckbox1" value="{{ $medicine['id'] }}"  wire:model="medicine.{{$medicine['id']}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body mt-4">
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
