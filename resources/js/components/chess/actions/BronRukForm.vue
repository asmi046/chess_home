<template>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label is-small">Имя клиента</label>
                <div class="control">
                    <input v-model="model.client_name" class="input is-small" type="text" placeholder="Введите имя">
                </div>
            </div>


        </div>

        <div class="column">
            <div class="field">
                <label class="label is-small">Телефон клиента</label>
                <div class="control">
                    <input v-model="model.client_phone" class="input is-small" type="text" placeholder="Введите имя">
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label is-small">ДДУ</label>
                <div class="control">
                    <input v-model="model.ddu" class="input is-small" type="text" placeholder="Введите имя">
                </div>
            </div>
        </div>

        <div class="column">
            <div class="field">
                <label class="label is-small">Цена</label>
                <div class="control">
                    <input v-model="model.price" class="input is-small" type="text" placeholder="Введите имя">
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label is-small">Введите комментарий</label>
        <div class="control">
            <textarea v-model="model.comment" class="textarea is-small" placeholder="Введите комментарий"></textarea>
        </div>
    </div>

    <button @click.prevent="props.action()" class="button is-success is-small">Создать бронь руководителя</button>

</template>

<script setup>
    const props = defineProps({
        flat:Object,
        action:Function
    })

    const model = defineModel()

    console.log(model)
</script>
