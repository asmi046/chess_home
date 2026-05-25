{{ '<?xml version="1.0" encoding="UTF-8"?>' }}
<realty-feed generated-at="{{ now()->toAtomString() }}">
    @foreach ($flats as $flat)
        @php
            $flatInfo = $flat->owerFlatInformation;
            $gallery = $flatInfo?->gallery ?? [];
            $rooms = preg_replace('/\D+/', '', (string) $flat->type);
            $rooms = $rooms !== '' ? $rooms : '1';
        @endphp
        <offer internal-id="{{ $flat->id }}">
            <type>продажа</type>
            <property-type>жилая</property-type>
            <category>квартира</category>
            <url>{{ route('public_flat', ['id' => $flat->id]) }}</url>
            <creation-date>{{ optional($flat->created_at)->toAtomString() }}</creation-date>
            <last-update-date>{{ optional($flat->updated_at)->toAtomString() }}</last-update-date>
            <location>
                <country>{{ $flatInfo?->country }}</country>
                <locality-name>{{ $flatInfo?->city }}</locality-name>
                <address>{{ $flatInfo?->address }}</address>
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
