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
                                                <input value="" id="typeLivestock" type="text" class="form-control round addpo"
                                                       placeholder="نوع دام" style="margin-top: 10px" wire:model.defer="typeLivestock">
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

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header"> شناسنامه ها</h2>
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
                                            <th class="border-top-0">سریال</th>
                                            <th class="border-top-0">نام دام</th>
                                            <th class="border-top-0"> نام دامدار</th>
                                            <th class="border-top-0">نوع دام</th>
                                            <th class="border-top-0">تاریخ تولد</th>
                                            <th class="border-top-0">نژاد</th>
                                            <th class="border-top-0">جنسیت</th>
                                            <th class="border-top-0">رنگ</th>
                                            <th class="border-top-0">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #FFFFFF;text-align: center">
                                        @php
                                            $cnt=0;
                                        @endphp
                                        @foreach($listDateBirth as $index => $items)

                                        <tr>
                                            <td class="text-truncate"><h5>{{ $items['serial'] }}</h5></td>
                                            <td class="text-truncate">{{ $items['name'] }}</td>
                                            <td class="text-truncate">{{ $items['livestock']['name'] }}</td>
                                            <td> {{ $items['type_livestock'] }} </td>
                                            <td> {{ $items['date_birth'] }} </td>
                                            <td class="text-truncate"> {{ $items['race'] }}</td>
                                            <td class="text-truncate"> {{ $items['sex'] == "male" ? "نر" : "ماده" }} </td>

                                            <td class="text-truncate"> {{ $items['color'] }}</td>
                                            <td class="text-truncate">
                                                <a href=" {{ route('admin.edit.certificate',$items['id']) }}" class="btn btn-sm btn-outline-success round mb-0">ویرایش</a>
                                                <button wire:click="setId({{ $items['id'] }})" class="btn btn-sm btn-outline-danger round mb-0 delete-button" data-toggle="modal" >حذف</button>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{ $listDateBirth->links() }}
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
                                {{--<div class="modal-body" style="z-index: 1500!important;">
                                    ...
                                </div>--}}
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
                initialValue: true,
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
                @this.set('dateBirth', today, true);

                },

            });
        }
    </script>

<script src="{{ mix('/js/app.js') }}"></script>


