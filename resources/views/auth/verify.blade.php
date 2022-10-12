@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите вашу электронную почту') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Письмо с новой ссылкой для подтверждения электронной почты отправлено на ваш почтовый ящик') }}
                        </div>
                    @endif

                    {{__('Для данного действия необходимо подтвердить вашу электронную почту. Для подтверждения электронной почты пройдите по ссылке в письме, отправленном на ваш почтовый ящик.')}}
                    {{ __('Eсли вы не получили ссылку для подвеждения электронной почты') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда для получения новой ссылки') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
