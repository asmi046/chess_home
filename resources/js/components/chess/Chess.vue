<template>
    <section class="control_selection" >
        <div class="container">
            <div class="box">

                <div class="field">
                    <label class="label">Секции</label>
                        <div  class="select is-success">
                            <select v-model="selectSection" :disabled="loadet">
                                <option value="0" disabled selected>Выберите секцию</option>
                                <option v-for="item in sectionList" :key="item.id" :value="item.id">{{ item.name }}</option>
                            </select>
                    </div>
                </div>
            </div>

            <progress v-show="loadet" class="progress is-small is-primary" max="100">15%</progress>
        </div>
    </section>
</template>

<script setup>
    import { ref, watch } from 'vue'
    var loadet = ref(true)
    var sectionList = ref([])
    var selectSection = ref(0)

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

    getSectionList()
</script>
