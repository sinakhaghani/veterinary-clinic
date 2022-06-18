<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت نام مراجعه کننده</h2>
                    </div>
                </div>
                <form wire:submit.prevent="show">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control round" type="text" placeholder="جستجوی اعضاء" wire:model="searchOwner">
                                            <select  class="form-control round mt-1" tabindex="1" style="width: 100%;" {{--wire:model.defer="owner"--}}>
                                                <option value="">نام اعضاء انتخاب کنید</option>
                                                @foreach($listOwner as $item)
                                                    <option wire:click="setId({{ $item['id'] }})" value="{{ $item['id'] }}"> {{ $item['name'].' '.$item['mobile'] }}  </option>
                                                @endforeach
                                            </select>
                                            @error('owner') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    @if(!empty($listReferred))
                                                    <table class="table table-hover table-xl mb-0" style="margin-top: 100px" id="recent-orders">
                                                        <thead style="color: #000000;text-align: center">
                                                        <tr>
                                                            <th class="border-top-0">ردیف</th>
                                                            <th class="border-top-0">نام مالک</th>
                                                            <th class="border-top-0">توضیحات </th>
                                                            <th class="border-top-0">تاریخ ثبت</th>
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
                                                                <td class="text-truncate">{{ $items['description'] }}</td>
                                                                <td class="text-truncate">{{ $items['date'] }}</td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                        {{ $listReferred->links() }}
                                                    @endif
                                                </div>
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
