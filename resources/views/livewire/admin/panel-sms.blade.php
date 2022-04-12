<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">پنل پیامک</h2>
                    </div>
                </div>
                <form wire:submit.prevent="send">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                               {{-- <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select style="margin-top: 10px" class="form-control round addpo" wire:model.debounce.1000ms="type">
                                                <option value="50005708637753">50005708637753</option>
                                                <option value="SimCard">SimCard</option>
                                                <option value="News">News</option>
                                            </select>
                                            @error('type') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>--}}

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="متن پیام" style="margin-top: 10px" required wire:model.debounce.1000ms="text">
                                            @error('text') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check form-check-inline mr-2">
                                                    <label class="form-check-label font-medium-1" for="inlineCheckbox1">همه</label>
                                                    <input class="form-check-input" type="checkbox" id="checkAll" style="" >
                                                </div>
                                                @foreach($option as $item)
                                                    <div class="form-check form-check-inline mr-2">
                                                        <label class="form-check-label font-medium-1" for="inlineCheckbox1">{{ $item['name'] }}</label>
                                                        <input class="form-check-input" type="checkbox" name="typeLivestock" id="inlineCheckbox1" value="{{ $item['mobile'] }}"  wire:model="typeLivestock.{{$item['mobile']}}">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
        if ($('#checkAll').is(':checked'))
        {
             $('input[type=checkbox]').each(function () {
                 let val = $(this).val();
                 if (val != "on")
                    @this.set('typeLivestock.'+val, val, true);
             });
        }
    });

</script>
<script src="{{ mix('/js/app.js') }}"></script>
