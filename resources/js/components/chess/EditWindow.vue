<template>
    <div :class="{'is-active':props.show}" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content flat_edit_window">
            <div class="box ">
                <div v-if="props.flat" :class="{ 'h_rezerv': props.flat && props.flat.fixation && props.flat.fixation.type === 'Забронирована', 'h_sales': props.flat && props.flat.fixation && props.flat.fixation.type === 'Продана' }" class="flat_modal_data">
                    <p><strong>Квартира №:</strong> {{ props.flat.number }}</p>
                    <p><strong>{{ props.flat.section.name }}</strong> </p>
                    <p><strong>Статус:</strong> {{ (props.flat.fixation)?props.flat.fixation.type:"Свободна" }}  </p>
                    <p><strong>Площадь:</strong> {{ props.flat.area1 }} / {{ props.flat.area2 }} / {{ props.flat.area3 }} м²</p>
                    <p><strong>Цена:</strong> {{ props.flat.price_total }}  ₽</p>
                </div>

                <div class="field">
                    <label class="label">Выберите действие</label>
                        <div  class="select is-success">
                            <select v-model="action">
                                <option value="" disabled selected>Выберите действие</option>
                                <option v-for="(item, index) in actionList" :key="index" :value="item">{{ item }}</option>
                            </select>
                        </div>
                </div>

                <FixationForm></FixationForm>

            </div>
        </div>
        <button @click.prevent="props.hide()" class="modal-close is-large" aria-label="close"></button>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import FixationForm from './FixationForm.vue';

    const props = defineProps({
        show:Boolean,
        flat:Object,
        hide:Function,
    })

    const user_data = window.Auth
    var actionList = ref([])
    var action = ref('')

    const getActionList = () => {
        action.value = ""
        axios.get('/fixation/get_action_list/'+props.flat.id)
        .then((response) => {
            actionList.value = response.data
            console.log(actionList.value)
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    watch(() => props.flat, () => {
        if (props.flat)
            getActionList()
    })

</script>
