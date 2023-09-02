<template>
  <div>
    <nav class="bg-sky-400 w-full flex justify-between py-2 px-2 sm:sticky sm:top-0 fixed">
      <h1 class="text-2xl bold">Logo</h1>
        <input  @keyup="find" class="w-[40%] bg-white border outline-none px-2 py-1 rounded-lg" type="text">
      <div>
        <p>Setting</p>
      </div>
    </nav>
    
    <div class="sm:flex justify-between">     
      <div class="sm:w-3/4 pt-4">
        <div v-for="(todo, index) in this.todos" :key="index" >
          <div class="p-3">
              <div class="bg-gray-200 shadow-md rounded-sm px-2 py-2">
                 <div class="flex justify-between">
                  <h1 class="text-xl font-bold">{{ todo.title }}</h1>
                  <button @click="deleteTodo(todo.id)">
                      <i class="fa-solid fa-trash" style="color: #d51a1a; padding-top : 20px;"></i>
                  </button>
                 </div>
                  <p>{{ todo.todo }}</p>
              </div>             
            </div>
        </div>
        <div class="sm:flex sm:justify-between sm:px-4 sm:w-1/2 sm:mx-auto m-2 sm:my-4 w-full">
          <button :disabled="current_page <= 1" @click="paginatePrevious" class=" px-4 float-left"> <i class="fa-solid fa-arrow-left fa-lg"></i></button>  
          <span v-for="page in pages" :key="page">
              <span @click="paginateRandom(page)" class="text-center px-3 py-1.5 rounded-full border-4" :class="current_page == page ? 'bg-blue-500' : ''  " v-if="page >= 1 && page <= last_page">
                {{ page }}
              </span>
          </span>      
          <button :disabled="current_page >= last_page" @click="paginateNext" class=" px-4 py-0.5 float-right"><i class="fa-solid fa-arrow-right fa-lg"></i></button>
        </div>
      </div>
      <div class="sm:w-1/4 p-4">
        <div class="w-full">
            <h1 class="text-2xl bold sm:mt-2">Create A ToDo</h1>
          <form @submit.prevent="createTodo" class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4 p-2">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
              <input v-model="FormTodo.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="House Work"/>
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="todo">Todo</label>
              <input v-model="FormTodo.todo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Clean ours house"/>
            </div>
            <div>
                <button class="bg-violet-300 px-4 py-2 rounded-sm">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


import axios from 'axios'   
export default {
    mounted () {
       this.getTodo(this.current_page)
    },
    data() {
        return {  
            current_page : 1,
            pages : [],
            last_page : null,
            todos : [],
            FormTodo : {
                title : '',
                todo : ''
            }
        }
    },
    methods : {
      paginateNext()
    {
      this.current_page++;
      this.getTodo(this.current_page);
    },
    paginatePrevious(){
      this.current_page--;
      this.getTodo(this.current_page);
    },
    paginateRandom(page) {
      this.getTodo(page)
    },
    find (event) {
        axios.get('http://localhost:8000/api/to-dos/name/'+ event.target.value).then(res => {
          this.todos = res.data.data.data
          this.current_page = res.data.data.current_page
          this.pages = [];
            for (let i = this.current_page - 2; i < this.current_page + 3 ; i++) {
              this.pages.push(i)
            }
          this.last_page = res.data.data.last_page
        }).catch(err => {
          console.log(err);
        })
      },
      deleteTodo(id) {
        axios.delete(`http://localhost:8000/api/to-dos/`+id).then(res => {
          this.getTodo()
        }).catch(err => {
          console.log(err)
        })
      },
      getTodo(page) {
        axios.get(`http://localhost:8000/api/to-dos?page=${page}`).then((res) => {
          this.todos = res.data.data
          this.current_page = res.data.current_page
          this.pages = [];
            for (let i = this.current_page - 2; i < this.current_page + 3 ; i++) {
              this.pages.push(i)
            }
          this.last_page = res.data.last_page
        }).catch((err) => {
          console.log(err);
        })
      },
      createTodo () {
        axios.post('http://localhost:8000/api/to-dos' , this.FormTodo).then(res => {
          this.getTodo()
        }).catch(err => {
          console.log(err);
        })
      }
    }
};
</script>

<style scoped>

</style>





//