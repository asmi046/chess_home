<template>

<div
    :class="{
        'h_rezerv': props.flat.fixation && props.flat.fixation.type === 'Забронирована',
        'h_rezerv_ruk': props.flat.fixation && props.flat.fixation.type === 'Бронь руководителя',
        'h_sales': props.flat.fixation && props.flat.fixation.type === 'Продана',
        'h_pact': props.flat.fixation && props.flat.fixation.no_pact
        }" class="cell cell_flat cell_parking">
    <div class="head">
        <span class="flat_number">{{ props.flat.number  }}</span>
        <span v-show="props.flat.fixation && props.flat.fixation.user_id == user_data.user.id" class="main_fixation" title="Забронирована/продана Вами"></span>
        <span v-show="props.flat.fixation && props.flat.fixation.no_pay" class="no_pay_fixation" title="Бесплатная бронь"></span>
        <span v-show="props.flat.fixation && props.flat.fixation.no_pact" class="no_pact_fixation" title="Есть договор"></span>
        <span v-show="props.flat.fixation && props.flat.fixation.comment" class="comment_fixation" title="Есть комментарий"></span>

    </div>

    <div class="type">
        {{ props.flat.type }}
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
