<template>
    <EditWindow :show="showEdit" :flat="selectedFlat" :hide="cloaseEdit" ></EditWindow>

    <section class="control_selection" >
        <div class="container_main">
            <div class="box selector_wrapper">
                <div class="field">
                    <label class="label">Секции</label>
                        <div  class="select is-success">
                            <select v-model="selectSection" :disabled="loadet">
                                <option value="0" disabled selected>Выберите секцию</option>
                                <option v-for="item in sectionList" :key="item.id" :value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                </div>

                <div class="history">
                    <div class="h">
                        <div class="cube h_free"></div>
                        <span>Свободна</span>
                    </div>

                    <div class="h">
                        <div class="cube h_rezerv"></div>
                        <span>Резерв</span>
                    </div>

                    <div class="h">
                        <div class="cube h_rezerv_ruk"></div>
                        <span>Руководитель</span>
                    </div>

                    <div class="h">
                        <div class="cube h_sales"></div>
                        <span>Продана</span>
                    </div>
                </div>
            </div>

            <progress v-show="loadet" class="progress is-small is-primary" max="100">15%</progress>

            <h2 class="empty_h2" v-show="flatList.length == 0 && loadet == false">Выберите секцию для отображения шахматки</h2>

            <div class="dashboard">
                <div v-for="(item, key, index) in flatList" :key="index" class="flor">
                    <div class="cell cell_flor_index">
                        <span>{{ key }}</span>
                    </div>
                    <div class="flor_flat_list">
                        <Flat @click.prevent="selectFlat(flat)" v-for="(flat, key, index) in item" :key="index" :flat="flat"></Flat>
                    </div>


                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
    import { ref, watch } from 'vue'
    import Flat from './Flat.vue'
    import EditWindow from './EditWindow.vue'

    const user_data = window.Auth

    var loadet = ref(true)
    var sectionList = ref([])
    var selectSection = ref(0)
    var selectedFlat = ref(null)
    var showEdit = ref(false)

    var flatList = ref([])

    const getSectionList = () => {
        loadet.value = true
        axios.get('/get_section_list')
        .then((response) => {
            sectionList.value = response.data
            // console.log(sectionList.value)
            loadet.value = false
        })
        .catch( (error) => {
            console.log(error)
            loadet.value = false
        });
    }

    watch(selectSection, (newV, oldV) => {
        getChessList()
    })

    const getChessList = () => {

        console.log(selectSection.value)

        loadet.value = true
        axios.get('/get_chess_data_by_section/'+selectSection.value)
        .then((response) => {
            flatList.value = response.data
            console.log(flatList.value)
            loadet.value = false
        })
        .catch( (error) => {
            console.log(error)
            loadet.value = false
        });
    }

    const selectFlat = (flat) => {
        if (user_data.user.rang != 'Администратор' ) return;
        selectedFlat.value = flat
        console.log(flat)
        showEdit.value = true;
    }

    const cloaseEdit = () => {
        // selectedFlat.value = null
        showEdit.value = false;
        getChessList();
    }

    getSectionList()
</script>
