<template>

    <div class="columns">
        <div class="column d-flex">
            <label class="checkbox checbox_flex"> <input type="checkbox" v-model="model.no_pay" />  Бесплатная бронь</label>
        </div>

        <div class="column">
            <div class="field">
                <label class="label is-small">Менеджер<sup>*</sup></label>
                <div class="control">
                    <manager-list v-model="model.user_id" ></manager-list>
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label is-small">Имя клиента<sup>*</sup></label>
                <div class="control">
                    <input v-model="model.client_name" class="input is-small" type="text" placeholder="Введите имя">
                </div>
            </div>


        </div>

        <div class="column">
            <div class="field">
                <label class="label is-small">Телефон клиента<sup>*</sup></label>
                <div class="control">
                    <input
                    v-mask="{mask: '+7(NNN)NNN-NN-NN', model: 'cpf' }"
                    v-model="model.client_phone" class="input is-small" type="text" placeholder="+7 (___) ___-__-__">
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="field">
                <label class="label is-small">ДДУ<sup>*</sup></label>
                <div class="control">
                    <input v-model="model.ddu" class="input is-small" type="text" placeholder="Введите ДДУ">
                </div>
            </div>
        </div>

        <div class="column">
            <div class="field">
                <label class="label is-small">Цена<sup>*</sup></label>
                <div class="control">
                    <input v-model="model.price" class="input is-small" type="text" placeholder="Введите цену">
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

    <button @click.prevent="props.action()" class="button is-success is-small">Продать</button>

</template>

<script setup>
    import ManagerList from './ManagerList.vue'

    const props = defineProps({
        flat:Object,
        action:Function
    })

    const model = defineModel()

    console.log(model)
</script>
