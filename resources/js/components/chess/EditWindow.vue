<template>
    <div :class="{'is-active':props.show}" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content flat_edit_window">
            <div class="box win_wrapper">

                    <div v-if="props.flat"
                        :class="{
                            'h_rezerv': props.flat && props.flat.fixation && props.flat.fixation.type === 'Забронирована',
                            'h_rezerv_ruk': props.flat && props.flat.fixation && props.flat.fixation.type === 'Бронь руководителя',
                            'h_sales': props.flat && props.flat.fixation && props.flat.fixation.type === 'Продана'
                        }"
                        class="h_white flat_modal_data">
                        <div class="flat">
                            <p><strong>Квартира №:</strong> {{ props.flat.number }}</p>
                            <p><strong>{{ props.flat.section.name }}</strong> </p>
                            <p><strong>Статус:</strong> {{ (props.flat.fixation)?props.flat.fixation.type:"Свободна" }}  </p>
                            <p><strong>Площадь:</strong> {{ props.flat.area1 }} / {{ props.flat.area2 }} / {{ props.flat.area3 }} м²</p>
                            <p><strong>Цена:</strong> {{ props.flat.price_total }}  ₽</p>
                        </div>

                        <div
                            v-if="props.flat.fixation && (user_data.user.rang == 'Администратор' || user_data.user.id == props.flat.fixation.user_id )"
                            class="client"
                        >
                            <p><strong>Ф.И.О:</strong> {{ props.flat.fixation.client_name }}</p>
                            <p><strong>Телефон:</strong> {{ props.flat.fixation.client_phone }}</p>
                            <p><strong>ДДУ:</strong> {{ props.flat.fixation.ddu }}</p>
                            <p><strong>Цена:</strong> {{ props.flat.fixation.price }}</p>
                            <p><strong>Комментарий:</strong> {{ props.flat.fixation.comment }}</p>
                        </div>
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
                        <ClearBronRuk v-if="action == 'Снять бронь руководителя'" :flat="props.flat" :action="clearAction"></ClearBronRuk>
                        <BronRukForm v-if="action == 'Бронь руководителя'" :flat="props.flat" :action="fixationAction" v-model="fixationData"></BronRukForm>
                        <BronForm v-if="action == 'Бронировать'" :flat="props.flat" :action="fixationAction" v-model="fixationData"></BronForm>
                        <BronEditForm v-if="action == 'Редактировать бронь'" :flat="props.flat" :action="fixationAction" v-model="fixationData"></BronEditForm>
                        <PayForm v-if="action == 'Продать'" :flat="props.flat" :action="fixationAction" v-model="fixationData"></PayForm>
                    </div>
                    <div v-show="finishAction" :class="{'is-success':actionSuccess,'is-danger':!actionSuccess}" class="notification">
                        <button @click.prevent="props.hide()" class="delete"></button>
                        {{ actionMeaasge }}
                    </div>


            </div>
        </div>
        <button @click.prevent="props.hide()" class="modal-close is-large" aria-label="close"></button>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import PayForm from './actions/PayForm.vue';
import BronForm from './actions/BronForm.vue';
import BronEditForm from './actions/BronEditForm.vue';
import BronRukForm from './actions/BronRukForm.vue';
import ClearSales from './actions/ClearSales.vue';
import ClearBron from './actions/ClearBron.vue';
import ClearBronRuk from './actions/ClearBronRuk.vue';

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
        client_name:null,
        client_phone:null,
        ddu:null,
        price: (props.flat)?props.flat.price_total:null,
        comment:null,
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

            if (action.value == "Снять бронь руководителя") {
                actionMeaasge.value = "Бронь руководителя отменена"
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
        console.log(fixationData.value);
        if (action.value == "Бронировать") {
            if (fixationData.value.client_name == null)
            {
                alert("Поле 'Имя' клиента должно быть заполнено")
                return;
            }
            if (fixationData.value.client_name == null)
            {
                alert("Поле 'Телефон' должно быть заполнено")
                return;
            }
        }

        if (action.value == "Продать") {
            if (fixationData.value.client_name == null)
            {
                alert("Поле 'Имя' клиента должно быть заполнено")
                return;
            }
            if (fixationData.value.client_name == null)
            {
                alert("Поле 'Телефон' должно быть заполнено")
                return;
            }

            if (fixationData.value.ddu == null)
            {
                alert("Поле 'ДДУ' должно быть заполнено")
                return;
            }

            if (fixationData.value.price == null)
            {
                alert("Поле 'Цена' должно быть заполнено")
                return;
            }
        }

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

            if (action.value == "Редактировать бронь") {
                actionMeaasge.value = "Бронь сохранена"
            }

            if (action.value == "Продать") {
                actionMeaasge.value = "Продажа успешно оформлена"
            }

            actionSuccess.value = true;
            finishAction.value = true;
        })
        .catch( (error) => {
            console.log(error)
            actionMeaasge.value = "Произошла ошибка "+error.message;
            actionSuccess.value = false;
            finishAction.value = true;
        });
    }

    watch(action, () => {
        if (!props.flat.fixation) return
        if ((action.value == "Продать") || (action.value == "Редактировать бронь") ) {
            fixationData.value = {
                client_name: props.flat.fixation.client_name,
                client_phone: props.flat.fixation.client_phone,
                ddu: props.flat.fixation.ddu,
                price: props.flat.fixation.price,
                comment: props.flat.fixation.comment,
            }
        }
    })


    watch(() => props.flat, () => {
        if (props.flat) {
            getActionList()
            finishAction.value = false;
            actionMeaasge.value = "";
            fixationData.value = {
                client_name:null,
                client_phone:null,
                ddu:null,
                price: (props.flat)?props.flat.price_total:null,
                comment:null,
            }
        }

    })

</script>
