<script setup>
import axios from 'axios';
import { ref, reactive, onMounted } from 'vue'

const search = ref('')
const customers = reactive({})

// onMounted(() => {
//   axios.get('/api/user')
//   .then( res => {
//     console.log(res.data)
//   })
// })

const isShow = ref(false)
const toggleStatus = () => { isShow.value = !isShow.value }

const searchCustomers = async () => {
  try {
    await axios.get(`/api/searchCustomers/?search=${search.value}`)
      .then(res => {
        console.log(res.data)
        customers.value = res.data
      })
    toggleStatus()
  } catch (e) {
    console.log(e)
  }
}

const emit = defineEmits(['update:customerId'])

const setCustomer = e => {
  search.value = e.kana
  emit('update:customerId', e.id)
  toggleStatus()
}

</script>

<template>
  <!-- 下記のコードはほぼ公式のコピペであるが、buttonオンリーではsubmitで画面遷移が走るので、type="button"として-->
  <div v-show="isShow" class="modal" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container w-2/3" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <!-- モーダルウィンドウ内のタイトルと×ボタン　スタート -->
          <h2 class="modal__title" id="modal-1-title">
            顧客検索結果
          </h2>
          <button @click="toggleStatus" type="button" class="modal__close" aria-label="Close modal"
            data-micromodal-close></button>

        </header>
        <main class="modal__content" id="modal-1-content">
          <!-- 初期状態ではcustomersは空なので、以下を出力するとエラーが起こってしまうので、v-ifでデータが入っていれば出力する -->
          <div v-if="customers.value" class="lg:w-2/3 w-full mx-auto overflow-auto">
            <!-- 以前、顧客一覧画面(Purchase/create) -->
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr>
                  <th
                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                    id</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カナ</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- customersはreactiveなので、customers.dataではなくcustomers.value.dataと書かないとデータを出力できない -->
                <tr v-for="customer in customers.value.data" :key="customer.id">
                  <td class="border-b-2 border-gray-200 px-4 py-2">


                    <button @click="setCustomer({ id: customer.id, kana: customer.kana })" type="button"
                      class="text-blue-400">{{ customer.id }}</button>

                  </td>
                  <td class="border-b-2 border-gray-200 px-4 py-2">{{ customer.name }}</td>
                  <td class="border-b-2 border-gray-200 px-4 py-2">{{ customer.kana }}</td>
                  <td class="border-b-2 border-gray-200 px-4 py-2">{{ customer.tel }}</td>
                </tr>
              </tbody>
            </table>
          </div>

        </main>
        <footer class="modal__footer">
          <button @click="toggleStatus" type="button" class="modal__btn" data-micromodal-close
            aria-label="Close this dialog window">閉じる</button>
        </footer>
      </div>
    </div>
  </div>

  <input name="customer" v-model="search"
    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

  <button @click="searchCustomers" type="button" data-micromodal-trigger="modal-1"
    class="mt-2 flex mx-auto text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg">検索する</button>
</template>
