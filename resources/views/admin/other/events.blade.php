@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Управление событиями</h2>

        <div class="card shadow-sm mb-4">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Событие</th>
                            <th scope="col">Иконка</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Дата начала</th>
                            <th scope="col">Дата окончания</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Хэллоуин</td>
                            <td>
                                {{-- Встроенный SVG для тыквы --}}
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='orange' style="width: 30px; height: 30px; vertical-align: middle;">
                                    <path d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-3.87 0-7-3.13-7-7 0-.96.22-1.87.62-2.7L12 15l6.38-6.7c.4.83.62 1.74.62 2.7 0 3.87-3.13 7-7 7zm-5.06-9.14l-1.59-1.59c-.39.39-.73.82-1.04 1.28L6.94 11.2C6.27 10.53 5.67 9.87 5.06 9.14zM12 4c2.21 0 4 1.79 4 4v2H8V8c0-2.21 1.79-4 4-4zm5.06 5.14c-.67.67-1.27 1.33-1.88 2.06l-1.59 1.59c.39-.39.73-.82 1.04-1.28L17.06 9.14z'/>
                                </svg>
                            </td>
                            <td id="halloweenStatus">{{ $settings->is_halloween_enabled ? 'Включено' : 'Выключено' }}</td>
                            <td>
                                <input type="date" class="form-control event-date-input"
                                       data-event-name="halloween" data-date-type="start_date"
                                       value="{{ optional($settings->halloween_start_date)->format('Y-m-d') }}">
                            </td>
                            <td>
                                <input type="date" class="form-control event-date-input"
                                       data-event-name="halloween" data-date-type="end_date"
                                       value="{{ optional($settings->halloween_end_date)->format('Y-m-d') }}">
                            </td>
                            <td>
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input event-toggle" type="checkbox" id="halloweenSwitch"
                                           data-event-name="halloween" {{ $settings->is_halloween_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label visually-hidden" for="halloweenSwitch">Переключить Хэллоуин</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Зимний снег</td>
                            <td>
                                {{-- Встроенный SVG для снежинки --}}
                                <svg fill='#a6e7ff' xmlns='http://www.w3.org/2000/svg' width='30px' height='30px' viewBox='0 0 50 50' style="vertical-align: middle;">
                                    <path d='M24.97-.03A2 2 0 0 0 23 2v4.17l-1.9-1.89a2 2 0 0 0-1.43-.6 2 2 0 0 0-1.39 3.43L23 11.83v9.7l-8.4-4.85-1.74-6.46a2 2 0 0 0-1.9-1.51A2 2 0 0 0 9 11.25l.7 2.6-3.64-2.1a2 2 0 0 0-.95-.28 2 2 0 0 0-1.05 3.75l3.63 2.1-2.57.69a2 2 0 1 0 1.04 3.86l6.43-1.72L21.02 25l-8.41 4.85-6.4-1.72a2 2 0 0 0-.6-.07A2 2 0 0 0 5.18 32l2.53.67-3.64 2.1a2 2 0 1 0 2 3.47l3.63-2.1-.67 2.5a2 2 0 1 0 3.87 1.04l1.7-6.36L23 28.5v9.68l-4.68 4.68a2 2 0 1 0 2.83 2.83L23 43.83V48a2 2 0 1 0 4 0v-4.17l1.88 1.87a2 2 0 1 0 2.82-2.83l-4.7-4.7v-9.7l8.4 4.85 1.74 6.46A2 2 0 1 0 41 38.75l-.7-2.6 3.64 2.1a2 2 0 1 0 2-3.47l-3.64-2.1 2.56-.68a2 2 0 0 0-.5-3.94 2 2 0 0 0-.54.07l-6.41 1.72-8.38-4.83 8.43-4.86 6.38 1.7a2 2 0 1 0 1.03-3.85l-2.5-.68 3.57-2.05a2 2 0 0 0-.91-3.75 2 2 0 0 0-1.1.28l-3.64 2.1.7-2.6a2 2 0 0 0-2.03-2.54 2 2 0 0 0-1.84 1.51l-1.73 6.46L27 21.57v-9.74l4.72-4.72a2 2 0 1 0-2.83-2.83L27 6.18V2a2 2 0 0 0-2.03-2.03z'/>
                                </svg>
                            </td>
                            <td id="snowStatus">{{ $settings->is_snow_enabled ? 'Включено' : 'Выключено' }}</td>
                            <td>
                                <input type="date" class="form-control event-date-input"
                                       data-event-name="snow" data-date-type="start_date"
                                       value="{{ optional($settings->snow_start_date)->format('Y-m-d') }}">
                            </td>
                            <td>
                                <input type="date" class="form-control event-date-input"
                                       data-event-name="snow" data-date-type="end_date"
                                       value="{{ optional($settings->snow_end_date)->format('Y-m-d') }}">
                            </td>
                            <td>
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input event-toggle" type="checkbox" id="snowSwitch"
                                           data-event-name="snow" {{ $settings->is_snow_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label visually-hidden" for="snowSwitch">Переключить Зимний снег</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="text-muted text-center mt-3">Изменения применяются сразу.</p>
    </div>
@endsection

@push('scripts')
{{-- Подключаем Toastify.js для уведомлений, если еще не подключен в layout --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggles = document.querySelectorAll('.event-toggle');
        const dateInputs = document.querySelectorAll('.event-date-input');

        toggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const eventName = this.dataset.eventName;
                const isEnabled = this.checked;
                const statusElementId = `${eventName}Status`;

                fetch('{{ route("admin.events.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        event_name: eventName,
                        is_enabled: isEnabled
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(`Event '${eventName}' enabled status updated: ${isEnabled}`);
                        document.getElementById(statusElementId).innerText = isEnabled ? 'Включено' : 'Выключено';

                        Toastify({
                            text: `Статус "${eventName}" успешно ${isEnabled ? 'включен' : 'выключен'}.`,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            stopOnFocus: true,
                        }).showToast();

                    } else {
                        console.error('Ошибка при обновлении статуса:', data.message);
                        this.checked = !isEnabled;
                        Toastify({
                            text: `Ошибка при изменении статуса "${eventName}": ${data.message || 'Неизвестная ошибка'}.`,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            stopOnFocus: true,
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error('Ошибка сети или сервера при обновлении статуса:', error);
                    this.checked = !isEnabled;
                    Toastify({
                        text: 'Произошла ошибка при отправке запроса на изменение статуса.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        stopOnFocus: true,
                    }).showToast();
                });
            });
        });

        dateInputs.forEach(input => {
            input.addEventListener('change', function() {
                const eventName = this.dataset.eventName;
                const dateType = this.dataset.dateType;
                const dateValue = this.value;

                const requestBody = {
                    event_name: eventName,
                    [dateType]: dateValue
                };

                fetch('{{ route("admin.events.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(requestBody)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(`Event '${eventName}' ${dateType} updated: ${dateValue}`);
                        Toastify({
                            text: `Дата "${dateType}" для "${eventName}" успешно обновлена.`,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            stopOnFocus: true,
                        }).showToast();
                    } else {
                        console.error('Ошибка при обновлении даты:', data.message);
                        Toastify({
                            text: `Ошибка при обновлении даты "${dateType}" для "${eventName}": ${data.message || 'Неизвестная ошибка'}.`,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            stopOnFocus: true,
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error('Ошибка сети или сервера при обновлении даты:', error);
                    Toastify({
                        text: 'Произошла ошибка при отправке запроса на изменение даты.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        stopOnFocus: true,
                    }).showToast();
                });
            });
        });
    });
</script>
@endpush