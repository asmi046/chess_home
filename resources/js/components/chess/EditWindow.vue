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

                <div v-show="!finishAction" class="action_wrapper">
                    <div class="field">
                    <label class="label is-small">Выберите действие</label>
                        <div  class="select is-success is-small">
                            <select v-model="action">
                                <option value="" disabled selected>Выберите действие</option>
                                <option v-for="(item, index) in actionList" :key="index" :value="item">{{ item }}</option>
                            </select>
                        </div>
                    </div>



                    <ClearSales v-if="action == 'Отменить продажу'" :flat="props.flat" :action="clearAction"></ClearSales>
                    <ClearBron v-if="action == 'Снять бронь'" :flat="props.flat" :action="clearAction"></ClearBron>
                    <BronRukForm v-if="action == 'Бронь руководителя'" :flat="props.flat" :action="fixationAction" v-model="fixationData"></BronRukForm>
                </div>
                <div v-show="finishAction" :class="{'is-success':actionSuccess,'is-danger':!actionSuccess}" class="notification">
                    <button @click.prevent="props.hide()" class="delete"></button>
                    {{ actionMeaasge }}
                </div>

                <!-- <FixationForm></FixationForm> -->

            </div>
        </div>
        <button @click.prevent="props.hide()" class="modal-close is-large" aria-label="close"></button>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import BronRukForm from './actions/BronRukForm.vue';
import ClearSales from './actions/ClearSales.vue';
import ClearBron from './actions/ClearBron.vue';

    const props = defineProps({
        show:Boolean,
        flat:Object,
        hide:Function,
    })

    const user_data = window.Auth
    var actionList = ref([])
    var action = ref('')
    var finishAction = ref(false)
    var actionMeaasge = ref("")
    var actionSuccess = ref(true)

    var fixationData = ref({
        client_name:"",
        client_phone:"",
        ddu:"",
        price: (props.flat)?props.flat.price_total:"",
        comment:"",
    })

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

    const clearAction = () => {
        axios.post('/fixation/clear_fixation', {
            action: action.value,
            flat_id: props.flat.id
        })
        .then((response) => {
            if (action.value == "Отменить продажу") {
                actionMeaasge.value = "Продажа квартиры отменена"
            }

            if (action.value == "Снять бронь") {
                actionMeaasge.value = "Бронь отменена"
            }

            finishAction.value = true;
        })
        .catch( (error) => {
            console.log(error)
            actionMeaasge.value = "Произошла ошибка "+error.message;
            actionSuccess.value = false;
            finishAction.value = true;
        });
    }

    const fixationAction = () => {
        var sendetData = {...fixationData.value}
        sendetData['action'] = action.value
        sendetData['flat_id'] = props.flat.id

        axios.post('/fixation/do_fixation', sendetData)
        .then(() => {
            if (action.value == "Бронь руководителя") {
                actionMeaasge.value = "Бронь руководителя создана успешно"
            }

            if (action.value == "Бронировать") {
                actionMeaasge.value = "Бронь успешно оформлена"
            }

            if (action.value == "Продать") {
                actionMeaasge.value = "Продажа успешно оформлена"
            }

            finishAction.value = true;
        })
        .catch( (error) => {
            console.log(error)
            actionMeaasge.value = "Произошла ошибка "+error.message;
            actionSuccess.value = false;
            finishAction.value = true;
        });
    }

    watch(() => props.flat, () => {
        if (props.flat) {
            getActionList()
            finishAction.value = false;
            actionMeaasge.value = "";
        }

    })

</script>
