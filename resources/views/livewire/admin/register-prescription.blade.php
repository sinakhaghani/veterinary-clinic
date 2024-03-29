<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت نسخه</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control round" type="text" placeholder="جستجوی دامدار" wire:model="searchLivestock">
                                            <select  class="form-control round mt-1" id="owner" style="width: 100%;" wire:model="owner">
                                                <option class="default-option" value="">نام دامدار انتخاب کنید</option>
                                                @foreach($livestock as $item)
                                                    <option value="{{ $item['id'] }}"> {{ $item['name'].' '.$item['mobile'] }}  </option>
                                                @endforeach
                                            </select>
                                            @error('owner') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input value="" id="description" type="text" class="form-control round addpo"
                                                       placeholder="توضیحات" style="margin-top: 10px" wire:model.defer="description">
                                                @error('description') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <form></form>
                                                <input id="submit" type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo" value="ثبت کن">
                                            </div>

                                            <div class="col-md-6 col-sm-12" wire:ignore>
                                                <form id="formPdf" method="get">
                                                    <button id="submit"  type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo"> تبدیل به PDF </button>
                                                </form>
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
                        <h2 class="content-header"> داروها</h2>
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
                                            <th class="border-top-0">نام مالک</th>
                                            <th class="border-top-0">توضیحات</th>
                                            <th class="border-top-0">تاریخ ثبت</th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #FFFFFF;text-align: center">
                                        @php
                                            $cnt=0;
                                        @endphp
                                        @foreach($listPrescription as $index => $items)
                                            <tr>
                                                <td class="text-truncate"><h5>{{ $items['livestock']['name'] ?? "" }}</h5></td>
                                                <td class="text-truncate">{{ $items['description'] }}</td>
                                                <td class="text-truncate">{{ $items['date'] }}</td>
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
                        {{ $listPrescription->links() }}
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

        $('#owner').on('change', function() {
            let url = `{{ route('pdf.prescription') }}/${this.value}`
            console.log(url)
            $('#formPdf').attr('action', url);
        });
    });

    function checkDelete(){
        $(".delete-button").click(function(){
            $('.modal').addClass('fade');
            $('.modal').addClass('show');
            $('.modal').css("padding-top", "200px");
            $('.modal').css("display", "block");
            $('.modal').css("padding-left", "17px");
            $('.back-modal').css("display", "block");
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


