
    <div class="main-content">
        <div class="content-wrapper">
            <div class="container-fluid"><!--Statistics cards Starts-->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="card-block pt-2 pb-0">
                                    <div class="media">
                                        <div class="media-body white text-left">
                                            <h4 class="font-medium-5 card-title mb-0">{{ $numberPrescription }}</h4>
                                            <span class="grey darken-1">تعداد کل نسخه ها</span>
                                        </div>
                                        <div class="media-right text-right">
                                            <i class="fa fa-shopping-basket font-large-1 primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <div id="Widget-line-chart" class="height-150 lineChartWidget WidgetlineChart mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="card-block pt-2 pb-0">
                                    <div class="media">
                                        <div class="media-body white text-left">
                                            <h4 class="font-medium-5 card-title mb-0">{{$numberCertificate}}</h4>
                                            <span class="grey darken-1">تعداد شناسنامه ها</span>
                                        </div>
                                        <div class="media-right text-right">
                                            <i class="icon-wallet font-large-1 warning"></i>
                                        </div>
                                    </div>
                                </div>
                                <div id="Widget-line-chart1" class="height-150 lineChartWidget WidgetlineChart1 mb-2">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="card-block pt-2 pb-0">
                                    <div class="media">
                                        <div class="media-body white text-left">
                                            <h4 class="font-medium-5 card-title mb-0">{{ $numberLivestock }}</h4>
                                            <span class="grey darken-1">تعداد کل اعضاء</span>
                                        </div>
                                        <div class="media-right text-right">
                                            <i class="fa fa-user-circle-o font-large-1 success"></i>
                                        </div>
                                    </div>
                                </div>
                                <div id="Widget-line-chart2" class="height-150 lineChartWidget WidgetlineChart2 mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Statistics cards Ends-->
                <!--Line with Area Chart 1 Starts-->
                <div class="row">
                    <div class="col-12 col-md-8" id="recent-sales">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title-wrap bar-primary">
                                    <h4 class="card-title">شناسنامه های جدید
                                    </h4>
                                </div>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table class="table table-hover table-xl mb-0" id="recent-orders">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">نام</th>
                                            <th class="border-top-0">مالک
                                            </th>
                                            <th class="border-top-0">نوع دام</th>
                                            <th class="border-top-0">تاریخ تولد</th>
                                            <th class="border-top-0">جنسیت</th>
                                            <th class="border-top-0">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($certificateLatest as $certificate)
                                        <tr>
                                            <td class="text-truncate">{{ $certificate['name'] }}</td>
                                            <td class="text-truncate">{{ $certificate['livestock']['name'] ?? "" }}</td>
                                            <td>
                                                {{ $certificate['type_livestock'] }}
                                            </td>
                                            <td>
                                                {{ $certificate['date_birth'] }}

                                            </td>
                                            <td>
                                                {{ ($certificate['sex'] == 'male') ? 'نر' : 'ماده' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.edit.certificate',$certificate['id']) }}" class="btn btn-sm btn-outline-danger round mb-0" type="button">مشاهده</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title-wrap bar-primary">
                                    <h4 class="card-title">جدید ترین دامدارها
                                    </h4>
                                </div>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table class="table table-hover table-xl mb-0" id="recent-orders">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">نام
                                            </th>
                                            <th class="border-top-0">تاریخ ثبت نام</th>
                                            <th class="border-top-0"> موبایل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($livestockLatest as $livestock)
                                            <tr>
                                                <td class="text-truncate">{{ $livestock['name'] }}</td>
                                                <td class="text-truncate">{{ $livestock['mobile'] }}</td>
                                                <td>
                                                    {{ $livestock['date'] }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Line with Area Chart 1 Ends-->


            </div>
        </div>
    </div>
