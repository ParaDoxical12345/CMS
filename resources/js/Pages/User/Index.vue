<template>
 <Sidebar>
        <Head title="Users"/>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
        </template>

        <div class="px-2 mt-5">
            <div class="p-4 mx-2">
                <div class="flex ">
                    <h1 class="text-3xl font-medium text-gray-700 "></h1>
                    <Link href="/user/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 mr-4" >Add User</Link>
                </div>
            <div class="w-full px-2">
                <div class="h-12">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- <div class="p-6 text-gray-900">You're logged in!</div> -->

                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Id</th>
                                    <th class="py-3 px-6 text-center">User</th>
                                    <th class="py-3 px-6 text-center">Role</th>
                                    <!-- <th class="py-3 px-6 text-center">Specialization</th>
                                    <th class="py-3 px-6 text-center">Services</th>
                                    <th class="py-3 px-6 text-center">Contact No</th> -->
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light" >

                                <tr  class="border-b border-gray-200 hover:bg-gray-100" v-for="user in users" :key="user.id">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">

                                            <p class="font-medium">{{ user.id }}</p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium">{{ user.firstname }} {{ user.lastname }}</p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center" v-for="role in user.roles" :key="role.id">
                                            <p class="font-medium">{{ role.name }}</p>
                                        </div>
                                    </td>
                                    <!-- <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium">{{ user.gender }}</p>
                                        </div>
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium">{{ doc.specialization }}</p>
                                        </div>
                                    </td> -->
                                    <!-- <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center" v-for="service in doc.services" :key="service.id">
                                            <p class="font-medium">{{ service.name }}</p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium">{{ doc.user.contact_no }}</p>
                                        </div>
                                    </td> -->
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium">
                                                <span class=" remarks-cell bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ user.status ? 'Active' : 'Inactive' }}</span>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <!-- <div class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                                <a href="#" class="btn" @click="toggleStatus(doc)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />
                                                      </svg>
                                                </a>
                                            </div> -->
                                            <div class="flex item-center justify-center">
                                                <!-- <div class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" v-if="!doc.status">
                                                    <a href="#" class="btn" @click="activateDoctor">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />
                                                          </svg>
                                                    </a>
                                                </div>
                                                <div class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" v-if="doc.status">
                                                    <a href="#" class="btn" @click="deactivateDoctor">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />
                                                          </svg>
                                                    </a>
                                                </div> -->
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <Link :href="'/user/show/'+ user.id" title="Show Details">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </Link>


                                            </div>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                                <Link :href=" '/user/edit/' + user.id" class="btn" title="Edit Doctor">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </Link>
                                            </div>
                                            <div class="w-4  ml-2 mr-2 transform hover:text-red-500 hover:scale-110">
                                                <Link href="#" @click="remove(user)" class="btn" title="Delete Doctor">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </Link>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
    </div>
 </Sidebar>
</template>

<script setup>
  import Sidebar from '@/Layouts/Sidebar.vue';
    import { ref } from 'vue';
    import { Link, router, useForm, Head } from '@inertiajs/vue3';

defineProps({
    users: Array,
})
</script>
