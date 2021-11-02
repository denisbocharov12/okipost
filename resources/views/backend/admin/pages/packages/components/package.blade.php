@if(count($packages) > 0)
    @foreach($packages as $package)
        <div class="col-sm-6 col-lg-4" id="package-{{$package->id}}">
            <div class="card text-white bg-secondary ">
                <div class="card-header">
                    <div class="row m-0 justify-content-between align-items-center">
                        <div class="col-auto p-0">
                            <span class="text-light pr-2">
                                @if($package->payed($package->track) !== null)
                                    Оплачено
                                @else
                                    Неоплачено
                                @endif
                            </span>
                            <p class="text-white font-weight-bold">Трэк: {{$package->track}}</p>
                        </div>
                        <div class="col-auto p-0 d-flex align-items-center">
                            <div class="dropdown">
                                <a class="border-0 bg-transparent dropdown-toggle btn btn-icon" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt">
                                        <li><a class="text-secondary payed_delete" href="#" data-id="{{$package->id}}"><em class="icon ni ni-delete"></em><span>Удалить</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <h5 class="card-title">Посылка #{{$package->id}}</h5>
                    <p class="card-text text-light">Страна заказа: <span class="text-white font-weight-bold">{{$package->country}}</span></p>
                    <p class="card-text text-light">Стоймость посылки: <span class="text-white font-weight-bold">{{$package->price}} {{$package->currency}}</span></p>
                    @if($package->user !== null)
                    <p class="card-text text-light">Кто: <span class="text-white font-weight-bold">{{$package->user->first_name}} {{$package->user->last_name}}</span></p>
                        <p class="card-text text-light">IDNO: <span class="text-white font-weight-bold">{{$package->user->user_id}}</span></p>
                        <p class="card-text text-light">Email: <a class="text-white font-weight-bold" href="mailto:{{$package->user->email}}">{{$package->user->email}}</a></p>
                        <p class="card-text text-light">Телефон: <a class="text-white font-weight-bold" href="tel:{{$package->user->phone}}">{{$package->user->phone}}</a></p>
                    @endif
                    @if($package->code !== null)
                        <p class="card-text text-light">ID клиента: <span class="text-white font-weight-bold">{{$package->code}}</span></p>
                    @endif
                    <p class="card-text text-light">Комментарий: <span class="text-white font-weight-bold">{{$package->comment}}</span></p>

                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-12">
        <p>Ничего не найдено</p>
    </div>
@endif
