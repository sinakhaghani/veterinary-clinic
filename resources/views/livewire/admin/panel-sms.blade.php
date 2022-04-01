<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">پنل پیامک</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select style="margin-top: 10px" class="form-control round addpo" wire:model.debounce.1000ms="type">
                                                <option value="50005708637753">50005708637753</option>
                                                <option value="SimCard">SimCard</option>
                                                <option value="News">News</option>
                                            </select>
                                            @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="متن پیام" style="margin-top: 10px" required wire:model.debounce.1000ms="text">
                                            @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($option as $item)
                                                    <div class="form-check form-check-inline mr-2">
                                                        <label class="form-check-label font-medium-1" for="inlineCheckbox1">{{ $item['name'] }}</label>
                                                        <input class="form-check-input" type="checkbox" name="typeLivestock" id="inlineCheckbox1" value="{{ $item['id'] }}"  wire:model="typeLivestock.{{$item['id']}}">
                                                    </div>
                                                @endforeach
                                                @error('typeLivestock') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
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
