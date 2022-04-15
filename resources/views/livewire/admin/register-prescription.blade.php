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
                                            <select  class="form-control round mt-1" id="owner" style="width: 100%;">
                                                <option class="default-option" value="">نام دامدار انتخاب کنید</option>
                                                @foreach($livestock as $item)
                                                    <option value="{{ $item['id'] }}"> {{ $item['name'].' '.$item['mobile'] }}  </option>
                                                @endforeach
                                            </select>
                                            @error('owner') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select id="certificate" class="form-control round mt-1" style="width: 100%;" wire:model.defer="certificate" disabled="disabled">
                                                <option value="">نام دام</option>
                                            </select>
                                            @error('certificate') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <label class="form-check-label font-medium-1 mb-2" for="inlineCheckbox1">دارو:</label>
                                        <div class="col-md-12">

                                            @foreach($medicines as $item)
                                                <label class="form-check-label font-medium-1 mr-3" for="inlineCheckbox1">{{ $item['title'] }}</label>
                                                <input class="form-check-input" type="checkbox" name="medicine.{{ $item['id'] }}" value="{{ $item['id'] }}" wire:model.defer="medicine.{{$item['id']}}"  >
                                            @endforeach
                                            <br>
                                                @error('medicine') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
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
                                            <div class="col-md-12 col-sm-12">
                                                <input id="submit" type="submit" style="width: 50%;margin-right: 25%;margin-left: 25%" class="btn btn-round btn-info btn-lg spanpo" value="ثبت کن">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

               {{-- <div class="row">
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
                                                <td class="text-truncate"> <button class="btn btn-sm btn-outline-success round mb-0" type="button">ویرایش</button> <button class="btn btn-sm btn-outline-danger round mb-0" type="button" data-toggle="modal" data-target="#bootstrap">حذف</button></td>
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
--}}
            </section>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function () {
        certificate();
    });

    function certificate(){
        $('#owner').on('change', function (){
            $.ajax({
                url: '/admin/ajax-certificate',
                type: 'GET',
                dataType: 'json',
                beforeSend: function() {
                    $('#certificate').attr('disabled', 'disabled');
                    $("#certificate").empty();
                },
                data: {
                    "owner": function () {
                        return $('#owner').val();
                    }
                },

                success: function (data)
                {
                    let options = '<option value="">نام دام</option>';
                    let i;
                    for(i = 0; i < data.length; i++)
                    {
                        let sex = (data[i].sex == "Male") ? "نر" : "ماده";
                        options = options + "<option value='" + data[i].id + "' title='" + data[i].name + "' > (" + data[i].name + ") (" + data[i].race + ") (" + sex + ")" + "</option>";
                    }

                    $('#certificate').append(options);
                    $('#certificate').removeAttr('disabled');

                },
            });
        });
    }
</script>

<script src="{{ mix('/js/app.js') }}"></script>


