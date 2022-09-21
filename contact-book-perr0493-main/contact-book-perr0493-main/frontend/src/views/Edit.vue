<template>

<h1 class="mb-4 mt-3">Edit Contact</h1>

<form  class="row g-3" @submit.prevent="saveContact">

<div class="col-md-8">
    <input class="form-control mb-2" type="text" required placeholder="First Name" v-model="first_name">
</div>

<div class="col-md-8">
    <input class="form-control mb-2" type="text" required placeholder="Last Name" v-model="last_name">
</div>

<div class="col-md-8">
    <input class="form-control mb-2"  type="text" required placeholder="Email" v-model="email">
</div>

<div class="col-12">
    <router-link class="btn btn-outline-primary" to="/">Back</router-link>

    <button class= "btn btn-outline-primary ms-3 ">Save Contact</button>

    <button class= "btn btn-outline-danger ms-3" @click="removeContact">DELETE</button>
</div>

    
</form>

  

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

    this.first_name = contact.first_name,
    this.last_name = contact.last_name,
    this.email = contact.email
  },

  methods: {
    saveContact: async function () {
      const contact = {
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email
      }

      const response = await fetch ('http://contact-book-perr0493.test/api/contacts/' + this.id, {
        method: 'PUT',
        body: JSON.stringify(contact),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      const json = await response.json()

      this.$router.push('/contact/' + json.id)
    },

    removeContact: async function () {
        const response = await fetch ('http://contact-book-perr0493.test/api/contacts/' + this.id, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json'
          }
        })

        this.$router.push('/')
      }
    }
  }


</script>



<style>



</style>