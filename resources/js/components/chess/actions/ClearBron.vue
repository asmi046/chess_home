<template>
    <div class="clear_flat_data">
        <p><strong>Имя клиента:</strong>{{ props.flat.fixation.client_name }}</p>
        <p><strong>Телефон клиента:</strong>{{ props.flat.fixation.client_phone }}</p>
        <p><strong>Коментарий:</strong>{{ props.flat.fixation.comment }}</p>
        <p><strong>ДДУ:</strong>{{ props.flat.fixation.ddu }}</p>
        <p><strong>Цена продажи:</strong>{{ props.flat.fixation.price }} ₽</p>
        <br>
        <br>
        <button @click.prevent="props.action()" class="button is-success is-small">Снять бронь</button>
    </div>

</template>

<script setup>

const props = defineProps({
    flat:Object,
    action:Function
})


</script>
