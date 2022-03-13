<div class="main-content">
    <div class="content-wrapper">
        <div class="container-fluid"><!--Calendar Starts-->
            <section id="calendar">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="content-header">ثبت دارو</h2>
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" dir="rtl">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="نام دارو" required wire:model.debounce.1000ms="title">
                                            @error('title') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="roundText" class="form-control round addpo" placeholder="توضیحات" wire:model.debounce.1000ms="description">
                                            @error('description') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
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
<script src="{{ mix('/js/app.js') }}"></script>