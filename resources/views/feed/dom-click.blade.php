<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>

<realty-feed xmlns="http://webmaster.yandex.ru/schemas/feed/realty/2010-06">
    <generation-date>{{ now()->toAtomString() }}</generation-date>
    @foreach ($flats as $flat)
        @php
            $flatInfo = $flat->owerFlatInformation;
            $gallery = $flatInfo?->gallery ?? [];
            $rooms = preg_replace('/\D+/', '', (string) $flat->type);
            $rooms = $rooms !== '' ? $rooms : '1';
        @endphp
        <offer internal-id="{{ $flat->id + 3 }}">
            <type>продажа</type>
            <property-type>жилая</property-type>
            <category>квартира</category>
            <building-state>unfinished</building-state>
            <deal-status>ФЗ 214</deal-status>
            <floors-total>{{ $flat->section->floor_count }}</floors-total>
            <url>{{ route('public_flat', ['id' => $flat->id]) }}</url>

            <sales-agent>
                <organization>ООО «СЗ «БЕРЕГ ГУРЗУФА»</organization>
                <category>developer</category>
                <phone>+79282085752</phone>
            </sales-agent>
            <creation-date>{{ optional($flat->created_at)->toAtomString() }}</creation-date>
            <last-update-date>{{ $flat->updated_at ? optional($flat->updated_at)->toAtomString() : optional($flat->created_at)->toAtomString() }}</last-update-date>
            <location>
                <country>{{ $flatInfo?->country }}</country>
                <locality-name>{{ $flatInfo?->city }}</locality-name>
                <address>{{ $flatInfo?->address }}</address>
                @if (!empty($flatInfo?->latitude))
                    <latitude>{{ $flatInfo->latitude }}</latitude>
                @endif
                @if (!empty($flatInfo?->longitude))
                    <longitude>{{ $flatInfo->longitude }}</longitude>
                @endif
            </location>
            <price>
                <value>{{ (int) round((float) $flat->price_total) }}</value>
                <currency>RUR</currency>
            </price>
            <area>
            <value>{{ $flat->area3 }}</value>
            <unit>кв.м</unit>
            </area>
            <floor>{{ $flat->floor }}</floor>
            <rooms>{{ $rooms }}</rooms>
            @foreach ($gallery as $photo)
                @if (!empty($photo['path']))
                    <image>{{ asset('flat_data/' . ltrim($photo['path'], '/')) }}</image>
                @endif
            @endforeach
            <description>{{ 'Квартира ' . $flat->type . ' площадью ' . $flat->area3 . ' м2' }}</description>
        </offer>
    @endforeach
</realty-feed>
