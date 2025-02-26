@extends('layouts.all')


@section('title_force', "Статистика по продажам")
@section('description_force', "Статистика по продажам")

@section('main')
    <section class="page_head">
        <div class="container_main">
            <div class="box">
                <h2 class="title is-4">Статистика системы</h2>
            </div>
        </div>
    </section>

    <section class="page_content">
        <div class="container_main">
            <table>
                <thead>
                    <tr>
                        <th>Статус</th>
                        <th>Количество</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stat as $key => $item )
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
@endsection

