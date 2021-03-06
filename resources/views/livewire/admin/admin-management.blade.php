<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">مدیریت ادمینها</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="" class="form-control round addpo" placeholder="نام و نام خانوادگی" style="margin-top: 10px" required wire:model.debounce.1000ms="name">
                                            @error('name') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input style="margin-top: 10px" type="text" id="" class="form-control round addpo" maxlength="100" minlength="5" placeholder="ایمیل" wire:model.debounce.1000ms="email">
                                            @error('email') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="tel" style="margin-top: 10px" class="form-control round" maxlength="11" minlength="11"
                                                   placeholder="شماره موبایل" required wire:model.debounce.1000ms="mobile">
                                            @error('mobile') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="password" class="form-control round"
                                                   placeholder="رمز عبور" style="margin-top: 10px" wire:model.debounce.1000ms="password">
                                            @error('password') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="password" id="" class="form-control round addpo"
                                                   placeholder="تکرار رمز عبور" style="margin-top: 10px" wire:model.debounce.1000ms="password_confirmation">
                                            @error('password_confirmation') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
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
                        <h2 class="content-header">لیست ادمینها</h2>
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
                                            <th class="border-top-0">نام</th>
                                            <th class="border-top-0">ایمیل</th>
                                            <th class="border-top-0">موبایل</th>
                                            <th class="border-top-0">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #FFFFFF;text-align: center">
                                        @php
                                            $cnt=1;
                                        @endphp
                                        @foreach($listAdmins as $index => $items)
                                            @if($items['role'] != 1 or auth()->user()['role'] == 1)
                                                <tr>
                                                    <td> {{ $cnt++ }} </td>
                                                    <td class="text-truncate"><h5>{{ $items['name'] }}</h5></td>
                                                    <td class="text-truncate">{{ $items['email'] }}</td>
                                                    <td class="text-truncate">{{ $items['mobile'] }}</td>
                                                    <td class="text-truncate">
                                                        <a href=" {{ route('admin.edit',$items['id']) }}" class="btn btn-sm btn-outline-success round mb-0">ویرایش</a>
                                                        <button wire:click="setId({{ $items['id'] }})" class="btn btn-sm btn-outline-danger round mb-0 delete-button" data-toggle="modal" >حذف</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{ $listAdmins->links() }}
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
</script>
<script src="{{ mix('/js/app.js') }}"></script>
