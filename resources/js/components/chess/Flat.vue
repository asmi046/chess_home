<template>

<div :class="{ 'h_rezerv': props.flat.fixation && props.flat.fixation.type === 'Забронирована', 'h_sales': props.flat.fixation && props.flat.fixation.type === 'Продана' }" class="cell cell_flat">
    <div class="head">
        <span class="flat_number">{{ props.flat.number  }}</span>
        <span class="flat_type">{{ props.flat.type }}</span>
        <span v-show="props.flat.fixation && props.flat.fixation.user_id == user_data.user.id" class="main_fixation" title="Забронирована/продана Вами"></span>
    </div>
    <div class="area">
        <span>{{ props.flat.area1 }}/{{ props.flat.area2 }}/{{ props.flat.area3 }}</span>
    </div>
    <div class="price">
        <span>за м² {{ props.flat.price_per_meter }} ₽</span>
        <span>Цена: {{ props.flat.price_total }} ₽</span>
    </div>
</div>

</template>

<script setup>
const props = defineProps(
    {
        flat: Object
    }
)

const user_data = window.Auth
</script>
