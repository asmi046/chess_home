@extends('layouts.login')


@section('title_force', 'Квартира: ' . $flat->type . ' ' . $flat->area3)
@section('description_force', 'Подробная информация о квартире')

@section('main')
    <section class="flat_data">
        <div class="container_main">
            <h1>{{ 'Квартира: ' . $flat->type . ' ' . $flat->area3 }}</h1>

            @php
                $gallery = $flat->owerFlatInformation?->gallery ?? [];
            @endphp

            <div class="flat_data__content">
                <div class="flat_data__gallery">
                    @if (!empty($gallery))
                        <div class="swiper flat_gallery_swiper">
                            <div class="swiper-wrapper">
                                @foreach ($gallery as $slide)
                                    @php
                                        $imagePath = $slide['path'] ?? null;
                                        $imageTitle = trim((string) ($slide['title'] ?? ''));
                                        $imageAlt = $imageTitle !== '' ? $imageTitle : 'Фото квартиры ' . $flat->area3;
                                    @endphp
                                    <div class="swiper-slide">
                                        @if ($imagePath)
                                            <img src="{{ asset('flat_data/' . ltrim($imagePath, '/')) }}"
                                                alt="{{ $imageAlt }}">
                                        @else
                                            <div class="flat_data__empty_slide">Фото недоступно</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @else
                        <div class="flat_data__empty_gallery">Галерея пока не заполнена</div>
                    @endif
                </div>

                <div class="flat_data__details">
                    <table>
                        <tbody>
                            <tr>
                                <th>Секция</th>
                                <td>{{ $flat->section?->name ?? 'Не указано' }}</td>
                            </tr>
                            <tr>
                                <th>Этаж</th>
                                <td>{{ $flat->floor }}</td>
                            </tr>
                            <tr>
                                <th>Номер</th>
                                <td>{{ $flat->number }}</td>
                            </tr>
                            <tr>
                                <th>Тип</th>
                                <td>{{ $flat->type }}</td>
                            </tr>
                            <tr>
                                <th>Площадь, м2</th>
                                <td>{{ $flat->area3 }}</td>
                            </tr>
                            <tr>
                                <th>Площадь жилая, м2</th>
                                <td>{{ $flat->area1 }}</td>
                            </tr>
                            <tr>
                                <th>Площадь общая, м2</th>
                                <td>{{ $flat->area2 }}</td>
                            </tr>
                            <tr>
                                <th>Цена за м2</th>
                                <td>{{ number_format((float) $flat->price_per_meter, 0, ',', ' ') }} ₽</td>
                            </tr>
                            <tr>
                                <th>Цена</th>
                                <td>{{ number_format((float) $flat->price_total, 0, ',', ' ') }} ₽</td>
                            </tr>
                            <tr>
                                <th>Адрес</th>
                                <td>{{ $flat->owerFlatInformation?->address ?? 'Не указано' }}</td>
                            </tr>
                            <tr>
                                <th>Город</th>
                                <td>{{ $flat->owerFlatInformation?->city ?? 'Не указано' }}</td>
                            </tr>
                            <tr>
                                <th>Страна</th>
                                <td>{{ $flat->owerFlatInformation?->country ?? 'Не указано' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
