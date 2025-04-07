<template>

        <div class="select is-small">
            <select v-model="model">
                <option selected disabled value="0">Выберите менеджера</option>
                <option  v-for="(item, key, index) in managers" :key="index" :value="item.id">{{ item.name }}</option>
            </select>
        </div>

</template>

<script setup>
import { ref } from 'vue';


var managers = ref([])
const model = defineModel()

console.log(model)

const getManagerList = () => {
        managers.value = []
        axios.get('/fixation/get_manager_list')
        .then((response) => {
            managers.value = response.data
        })
        .catch( (error) => {
            console.log(error)
        });
    }

    getManagerList()

</script>
