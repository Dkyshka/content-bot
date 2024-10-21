@extends('web.layouts.app')

@section('content')

    <div class="form-container">
        <div class="form-box container">
            <!-- Gutter g-1 -->
            <div class="row g-1 mt-3">
                <div class="col">
                    <!-- Card Number input -->
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="card" class="form-control" placeholder="0000 0000 0000 0000">
                    </div>
                </div>
            </div>

            <div class="row g-1 mt-3">

                <div class="col">
                    <!-- Card Number input -->
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="expirense" class="form-control" placeholder="00/00">
                    </div>
                </div>
            </div>

            <hr />

            <!-- Information text -->
            <div class="info-text">
                To’lovlar faqatgina UzCard va Humo kartalari orqali amalga oshiriladi.<br />
                Xavfsizlik maqsadida sizning bank kartangiz ma’lumotlari PayMe xizmatining serverlarida saqlanadi.<br />
                <a target="_blank" href="https://cdn.payme.uz/terms/main.html?target=_blank">Payme ofertasi</a>
            </div>

            <!-- Logo and Powered by text -->
            <div class="logo-container">
                <img src="{{ asset('assets/img/payme.png') }}" alt="Payme Logo">
                <div class="powered-by">Powered by Payme</div>
            </div>

            <!-- Кнопка отправки данных (без action) -->
            <div class="text-center mt-4">
                <button class="btn btn-primary" id="submitPayment">Оплатить</button>
            </div>

        </div>
    </div>

{{--    <script>--}}
{{--        // Форматирование ввода номера карты--}}
{{--        document.getElementById('card').addEventListener('input', function (e) {--}}
{{--            let value = e.target.value.replace(/\D/g, ''); // Убираем всё, кроме цифр--}}

{{--            if (value.length > 16) {--}}
{{--                value = value.slice(0, 16); // Обрезаем до 16 цифр--}}
{{--            }--}}

{{--            let formattedValue = value.match(/.{1,4}/g); // Группируем по 4 цифры--}}
{{--            e.target.value = formattedValue ? formattedValue.join(' ') : ''; // Добавляем пробелы--}}
{{--        });--}}

{{--        // Форматирование ввода срока действия карты--}}
{{--        document.getElementById('expirense').addEventListener('input', function (e) {--}}
{{--            let value = e.target.value.replace(/\D/g, ''); // Убираем всё, кроме цифр--}}
{{--            if (value.length >= 3) {--}}
{{--                value = value.slice(0, 2) + '/' + value.slice(2, 4); // Форматируем как MM/YY--}}
{{--            }--}}
{{--            e.target.value = value;--}}
{{--        });--}}

{{--        document.getElementById('submitPayment').addEventListener('click', function () {--}}
{{--            // Собираем данные карты--}}
{{--            const cardNumber = document.getElementById('card').value.replace(/\s/g, ''); // Удаляем пробелы--}}
{{--            const expirationDate = document.getElementById('expirense').value; // Формат MM/YY--}}

{{--            // Логируем данные карты (не забудьте удалить это на продакшене)--}}
{{--            console.log({ cardNumber, expirationDate });--}}

{{--            // Отправляем данные на бэкэнд через AJAX (например, с помощью fetch)--}}
{{--            fetch('{{ route('payment_create') }}', {--}}
{{--                method: 'POST',--}}
{{--                headers: {--}}
{{--                    'Content-Type': 'application/json',--}}
{{--                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Если используете CSRF--}}
{{--                },--}}
{{--                body: JSON.stringify({--}}
{{--                    card_number: cardNumber,--}}
{{--                    expiration_date: expirationDate--}}
{{--                })--}}
{{--            })--}}
{{--                .then(response => response.json())--}}
{{--                .then(data => {--}}
{{--                    if (data.error) {--}}
{{--                        console.error('Ошибка:', data.error);--}}
{{--                    } else {--}}
{{--                        console.log('Успешный ответ:', data);--}}
{{--                        // Обработка успешного ответа--}}
{{--                    }--}}
{{--                })--}}
{{--                .catch((error) => {--}}
{{--                    console.error('Ошибка:', error);--}}
{{--                });--}}
{{--        });--}}
{{--    </script>--}}
@endsection