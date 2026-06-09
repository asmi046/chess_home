<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>

@php
    $complexGroups = $flats->groupBy(function ($flat) {
        return (string) ($flat->owerFlatInformation?->dom_click_complex_id ?: $flat->section_id);
    });

    $normalizeRoomCount = static function ($type): int {
        $typeString = mb_strtolower((string) $type);

        if (str_contains($typeString, 'студ')) {
            return 0;
        }

        preg_match('/\d+/', $typeString, $matches);

        return isset($matches[0]) ? (int) $matches[0] : 1;
    };

    $buildPlanLinks = static function ($gallery): array {
        if (!is_array($gallery)) {
            return [];
        }

        return collect($gallery)
            ->map(static function ($photo) {
                if (!is_array($photo) || empty($photo['path'])) {
                    return null;
                }

                return asset('flat_data/' . ltrim($photo['path'], '/'));
            })
            ->filter()
            ->values()
            ->all();
    };
@endphp
<complexes>
    @foreach ($complexGroups as $complexId => $complexFlats)
        @php
            $firstFlat = $complexFlats->first();
            $firstInfo = $firstFlat?->owerFlatInformation;
            $complexName = trim((string) ($firstInfo?->complex_name ?: ''));
            if ($complexName === '') {
                $complexName = trim((string) ($firstInfo?->city ?: '') . ' ' . (string) ($firstInfo?->address ?: ''));
            }
            $complexName = $complexName !== '' ? $complexName : 'ЖК ' . $complexId;
            $complexAddress = $firstInfo?->address ?: 'Адрес уточняется';
            $complexLatitude = $firstInfo?->latitude ?: '0';
            $complexLongitude = $firstInfo?->longitude ?: '0';
            $complexGallery = $buildPlanLinks($firstInfo?->gallery ?? []);
            $buildingId = $complexId;
            $buildingFloors = $complexFlats->max(fn($flat) => (int) ($flat->section?->floor_count ?? 0));
        @endphp
        <complex>
            <id>{{ $complexId }}</id>
            <name>{{ $complexName }}</name>
            <latitude>{{ $complexLatitude }}</latitude>
            <longitude>{{ $complexLongitude }}</longitude>
            <address>{{ $complexAddress }}</address>

            <images>
                @forelse ($complexGallery as $image)
                    <image>{{ $image }}</image>
                @empty
                    <image>{{ asset('img/logo.svg') }}</image>
                @endforelse
            </images>

            <description_main>
                <title>{{ $complexName }}</title>
                <text>{{ 'Квартиры в продаже в ' . $complexName }}</text>
            </description_main>

            <buildings>
                <building>
                    <id>1</id>
                    <fz_214>true</fz_214>
                    <name>{{ $complexName }}</name>
                    <latitude>{{ $complexLatitude }}</latitude>
                    <longitude>{{ $complexLongitude }}</longitude>
                    <address>{{ $complexAddress }}</address>
                    @if ($buildingFloors > 0)
                        <floors>{{ $buildingFloors }}</floors>
                    @endif
                    <building_state>unfinished</building_state>

                    <flats>
                        @foreach ($complexFlats as $flat)
                            @php
                                $flatInfo = $flat->owerFlatInformation;
                                $roomCount = $normalizeRoomCount($flat->type);
                                $planLinks = $buildPlanLinks($flatInfo?->gallery ?? []);
                                $totalArea = (float) ($flat->area3 ?: 0);
                                $livingArea = $totalArea > 0 ? round($totalArea * 0.6, 2) : 0;
                                $kitchenArea = $totalArea > 0 ? round($totalArea * 0.2, 2) : 0;
                            @endphp
                            <flat>
                                <flat_id>{{ $flat->id }}</flat_id>
                                <apartment>{{ $flat->number }}</apartment>
                                <floor>{{ $flat->floor }}</floor>
                                <room>{{ $roomCount }}</room>
                                <plans>
                                    @forelse ($planLinks as $plan)
                                        <plan>{{ $plan }}</plan>
                                    @empty
                                        <plan>{{ route('public_flat', ['id' => $flat->id]) }}</plan>
                                    @endforelse
                                </plans>
                                <price>{{ (int) round((float) $flat->price_total) }}</price>
                                <area>{{ number_format($totalArea, 2, '.', '') }}</area>
                                <living_area>{{ number_format($livingArea, 2, '.', '') }}</living_area>
                                <kitchen_area>{{ number_format($kitchenArea, 2, '.', '') }}</kitchen_area>
                                <housing_type>0</housing_type>
                            </flat>
                        @endforeach
                    </flats>
                </building>
            </buildings>
        </complex>
    @endforeach
</complexes>
