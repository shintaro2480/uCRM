<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link} from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import FlashMessage from '@/Components/FlashMessage.vue';
//import { onMounted } from 'vue';
import { ref } from 'vue';
//searchCustomersメソッドでコントローラーにsearch.valueを渡す際にInertiaが必要なので、読み込んでおく

//pagenation用のビュー
import Pagination from '@/Components/Pagination.vue'

//コントローラーからのデータを受け取る
defineProps({ 
    //pagenate()で受け取っているので、ArrayではなくObjectで受け取る
    customers: Object
})

//リアクティブ変数。初期値は空文字
const search = ref('');

// ref の値を取得するには .valueが必要 
//Inertia.getによって、ページ全体をリロードせずに、一部のコンテンツだけが更新される、という解釈で正しいらしい
const searchCustomers = () => { 
 Inertia.get(route('customers.index', { search: search.value })) 
}

// onMounted( () => {
//     console.log(props.customers)
//     console.log(props.customers.last_page)
// })


</script>


<template> 

<Head title="顧客一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客一覧</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <section class="text-gray-600 body-font">
                            <div class="container px-5 mb-6 mx-auto">
                                <FlashMessage/>

                                <div class="flex mt-4 lg:w-2/3 w-full mx-auto mb-4">
                                    <input type="text" name="search" v-model="search"> 
                                    <button class="bg-blue-300 text-white py-2 px-2" @click="searchCustomers">検索</button>
                                </div>

                                    <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto mb-4">
                                        <!-- 顧客登録ページに飛ばす -->
                                        <Link as="button" :href="route('customers.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">顧客登録</Link>
                                    </div>

                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">


                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">id</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">指名</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カナ</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="customer in customers.data" :key="customer.id"> 
                                            <td class="border-b-2 border-gray-200 px-4 py-2">
                                                    {{ customer.id }}
                                            </td> 
                                            <td class="border-b-2 border-gray-200 px-4 py-2">{{ customer.name }}</td> 
                                            <td class="border-b-2 border-gray-200 px-4 py-2">{{ customer.kana }}</td> 
                                            <td class="border-b-2 border-gray-200 px-4 py-2">{{ customer.tel }}</td> 
                                            </tr>
                                    </tbody>
                                </table>
                                </div>

                            </div>
                            <Pagination class="mt-6" :links="customers.links"></Pagination> 
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>





</template>
