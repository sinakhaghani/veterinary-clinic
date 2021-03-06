<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت نام مراجعه کننده</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control round" type="text" placeholder="جستجوی اعضاء" wire:model="searchOwner">
                                            <select  class="form-control round mt-1" tabindex="1" style="width: 100%;" wire:model="owner">
                                                <option value="">نام اعضاء انتخاب کنید</option>
                                                @foreach($listOwner as $item)
                                                    <option value="{{ $item['id'] }}"> {{ $item['name'].' '.$item['mobile'] }}  </option>
                                                @endforeach
                                            </select>
                                            @error('owner') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <input type="text" class="form-control round addpo persianDatePicker"
                                                       placeholder="تاریخ مراجعه بعدی" style="margin-top: 10px" wire:model.debounce.1000ms="next_visit">
                                                @error('next_visit') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" id="dateBirth" class="form-control round addpo"
                                                       placeholder="مبلغ" maxlength="30" style="margin-top: 10px" wire:model.debounce.1000ms="amount">
                                                @error('amount') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input id="register" type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo" value="ثبت کن">
                                            </div>
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
                        <div class="row">
                            <div class="col-lg-2">
                                <h6 class="content-header" style="font-size: 18px">لیست مراجعه کننده ها</h6>
                            </div>
                            <div class="col-lg-4">
                                <form action="">
                                    <div class="position-relative has-icon-left">
                                        <input wire:model="searchList" type="text"
                                               class="form-control form-control round" style="width:100%;margin-top: 15px" placeholder="جستجو با نام ">

                                        <div class="form-control-position">
                                            <i class="ft-search info"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="background-color: #1E9FF2">
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table class="table table-hover table-xl mb-0" id="recent-orders">
                                        <thead style="color: #FFFFFF;text-align: center">
                                        <tr>
                                            <th class="border-top-0">ردیف</th>
                                            <th class="border-top-0">نام مالک</th>
                                            <th class="border-top-0">مبلغ</th>
                                            <th class="border-top-0">تاریخ ثبت</th>
                                            <th class="border-top-0">تاریخ مراجعه بعدی</th>
                                            <th class="border-top-0">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #FFFFFF;text-align: center">
                                        @php
                                            $cnt = collect($listReferred)->toArray()['current_page'] * 10 - 9;
                                        @endphp
                                        @foreach($listReferred as $index => $items)

                                            <tr>
                                                <td> {{ $cnt++ }} </td>
                                                <td class="text-truncate"><h5>{{ $items['livestock']['name'] ?? "" }}</h5></td>
                                                <td class="text-truncate">{{ $items['amount'] }}</td>
                                                <td class="text-truncate">{{ $items['date'] }}</td>
                                                <td class="text-truncate">{{ $items['livestock']['next_visit'] ?? "" }}</td>
                                                <td class="text-truncate">
                                                    <button wire:click="setId({{ $items['id'] }})" class="btn btn-sm btn-outline-danger round mb-0 delete-button" data-toggle="modal" >حذف</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{ $listReferred->links() }}
                    </div>
                </div>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog"  role="document">
                        <div class="modal-content"  >
                            <div class="modal-header" >
                                <h5 class="modal-title" id="exampleModalLabel">آیا از حذف اطمینان دارید؟</h5>
                                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer" >
                                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">بستن</button>
                                <button wire:click.prevent="delete()" type="button" class="btn btn-danger">حذف کن</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

            </section>
        </div>
    </div>
</div>

<div class="back-modal" style=" background-color: black;opacity: 0.3; position: absolute;width: 100%;height: 100%; z-index: 500;display: none;bottom: 0px;top: 0px"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function () {
        checkDelete();
        datePicker();
    });

    function checkDelete(){
        $(".delete-button").click(function(){
            $('.modal').addClass('fade');
            $('.modal').addClass('show');
            $('.modal').css("padding-top", "200px");
            $('.modal').css("display", "block");
            $('.modal').css("padding-left", "17px");
            $('.back-modal').css("display", "block");
            // window.scrollTo(0, 0);
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });
        $(".close-modal").click(function(){
            $('.modal').removeClass('fade');
            $('.modal').removeClass('show');
            $('.modal').css("display", "none");
            $('.back-modal').css("display", "none");
        });
    }

    function datePicker(){
        $(".persianDatePicker").persianDatepicker({
            autoClose: true,
            initialValueType: 'gregorian',
            persianDigit: true,
            initialValue: false,
            observer: true,
            calendarType: 'persian',
            calendar:{
                persian: {
                    locale:'en'
                },
                gregorian:{
                    locale:'en'
                }
            },
            format: 'YYYY/MM/DD',
            onSelect: function(unix){
                String.prototype.toEnglishDigit = function() {
                    let find = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                    let replace = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                    let replaceString = this;
                    let regex;
                    for (let i = 0; i < find.length; i++) {
                        regex = new RegExp(find[i], "g");
                        replaceString = replaceString.replace(regex, replace[i]);
                    } return replaceString;
                };
                String.prototype.changeFormatDate = function() {
                    let newArray = [];
                    let array = this.split("/");
                    array.forEach(function (item,index){
                        if (item.length == 1){
                            return newArray[index] = '0'+item;
                        }
                        else {
                            return newArray[index] = item;
                        }
                    });
                    return newArray.join("/");
                };
                let today = new Date(unix).toLocaleDateString('fa-IR').toEnglishDigit().changeFormatDate();
            @this.set('next_visit', today, true);

            },

        });
    }
</script>
<script src="{{ mix('/js/app.js') }}"></script>
