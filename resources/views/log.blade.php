@extends('layouts.all')


@section('title_force', "Лог событий")
@section('description_force', "Лог событий")

@section('main')
    <section class="page_head">
        <div class="container_main">
            <div class="box">
                <h2 class="title is-4">Лог событий</h2>
            </div>
        </div>
    </section>

    <section class="page_content">
        <div class="container_main">
            <div class="box log_filter">
                <form action="{{ route('log') }}" method="GET">
                    <div class="select is-primary is-small">
                        <select name="event_name">
                            <option value="0"  disabled selected>Выберите тип события</option>
                            @if (isset($filter['events']))
                                @foreach ($filter['events'] as $key => $item)
                                    <option @selected(request('event_name') === $key) value="{{$key}}"> {{ $key }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="select is-primary is-small">
                        <select name="user_id">
                            <option value="0" disabled selected>Выберите пользователя</option>
                            @if (isset($filter['users']))
                                @foreach ($filter['users'] as $key => $item)
                                    <option @selected(request('user_id') === $item) value="{{$item}}"> {{ $key }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="select is-primary is-small">
                        <select name="section_id">
                            <option value="0" disabled selected>Выберите секцию</option>
                            @if (isset($filter['users']))
                                @foreach ($filter['sections'] as $key => $item)
                                    <option @selected(request('section_id') === $item) value="{{$item}}"> {{ $key }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <input
                        class="input is-small"
                        type="text"
                        name="flat_number"
                        value="{{ request('flat_number') }}"
                        placeholder="№ квартиры"
                    />

                    <div class="control">
                        <a href="{{ route('log') }}" class="button is-warning is-small">Сбросить</a>
                        <button class="button is-primary is-small">Выбрать</button>
                    </div>

                </form>
            </div>

            <div class="table_wrapper">
                <table class="log_table">
                    <thead>
                        <tr>
                            <th>Дата и время</th>
                            <th>IP</th>
                            <th>Событие</th>
                            <th>Пользователь</th>
                            <th>Секция</th>
                            <th>Квартира</th>
                            <th>Клиент</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($log as  $item )
                            <tr>
                                <td>{{ date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                                <td>{{ $item->ip }}</td>
                                <td>{{ $item->event_name }}</td>

                                <td>
                                    {{ $item->user_name }}<br>
                                    {{ $item->user_email }}<br>
                                </td>

                                <td>{{ $item->section_name }}</th>
                                <td>
                                    <strong>№:</strong> {{ $item->flat_number }}<br>
                                    <strong>Тип:</strong> {{ $item->flat_type }}
                                </td>
                                <td>
                                    {{ $item->client_name }}<br>
                                    {{ $item->client_phone }}<br>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <x-pagination :tovars="$log"></x-pagination>
        </div>
    </section>


@endsection

