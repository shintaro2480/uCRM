<!-- 大元はIertia/Create.vueからコードを引っ張ってきている -->
<!-- なぜなら、新規投稿フォームを改良すればレコード1件分の表示画面を作りやすいから-->

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import { nl2br } from '@/common'

defineProps({ 
    item: Object
 })

import { Inertia } from '@inertiajs/inertia'

const deleteItem = id => { 
 Inertia.delete(route('items.destroy', {item: id}), { 
 onBefore: () => confirm('本当に削除しますか?') 
 }) 
}

</script>

    <template>
        <Head title="商品詳細" />

        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品詳細</h2>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            
                            <section class="text-gray-600 body-font relative">
                                
                                    <div class="container px-5 py-2 mx-auto">
                                        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto mb-4">
                                        <!-- 商品登録ページに飛ばす -->
                                         
                                            <Link as="button" :href="route('items.edit', {item: item.id})" class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集する</Link>
                                            <button @click="deleteItem(item.id)" class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">削除する</button>
                                        </div>
                                        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto mb-4">
                                            
                                            <!-- <button @click="deleteItem(item.id)" >削除する</button> -->
                                        </div>

                                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                            <div class="flex flex-wrap -m-2">

                                                <div class="w-full">
                                                    <div class="relative">
                                                        <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                                        <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        {{ item.name }}
                                                        </div>
                                                        </div>
                                                </div>

                                                <div class="w-full">
                                                    <div class="relative">
                                                        <label for="name" class="leading-7 text-sm text-gray-600">ID</label>
                                                        <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        {{ item.id }}
                                                        </div>
                                                        </div>
                                                </div>

                                                <div class="w-full">
                                                    <div class="relative">
                                                        <label for="name" class="leading-7 text-sm text-gray-600">メモ</label>
                                                        <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        <!-- {{nl2br(item.memo)}}とすると、<br>タグがそのまま出力されてしまうので、v-htmlで対応する -->
                                                            <div v-html="nl2br(item.memo)"></div>
                                                        </div>
                                                        </div>
                                                </div>

                                                <div class="w-full">
                                                    <div class="relative">
                                                        <label for="name" class="leading-7 text-sm text-gray-600">価格</label>
                                                        <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        {{ item.price }}
                                                        </div>
                                                        </div>
                                                </div>

                                                <div class="w-full">
                                                    <div class="relative">
                                                        <label for="name" class="leading-7 text-sm text-gray-600">販売中</label>
                                                        <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        <span v-if="item.is_selling === 1">販売中</span>
                                                        <span v-if="item.is_selling === 0">販売停止</span>
                                                        </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="w-full mt-6">
                                                    <Link as="button" :href="route('items.index')" class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品一覧に戻る</Link>
                                                </div>
                                
                                            </div>
                                        </div>
                                    </div>
                                
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </template>