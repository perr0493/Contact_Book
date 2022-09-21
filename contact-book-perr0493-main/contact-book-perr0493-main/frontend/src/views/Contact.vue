<template>
  
  <div class="container m-5">

<router-link class="btn btn-outline-primary p-1 " to="/">Back</router-link>
    
 <router-link class="btn btn-outline-primary p-1 ms-5" :to="`/contact/${id}/edit`">Edit Contact</router-link>


    
    
    <h1 class="mt-4 display-2">{{first_name}} {{last_name}}</h1>
    <p class="mt-4 fw-light fs-4 ">{{email}}</p>

    
   

  </div>

</template>





<script>
export default {
  name: 'Contact',
  props: ['id'],
  data: function () {
    return { 
      first_name: '',
      last_name: '',
      email: ''
      }
  },

  created: async function () {
    const response = await fetch('http://contact-book-perr0493.test/api/contacts/' + this.id)
    const contact = await response.json()

    this.first_name = contact.first_name
    this.last_name = contact.last_name
    this.email = contact.email
  },
}
  </script>
