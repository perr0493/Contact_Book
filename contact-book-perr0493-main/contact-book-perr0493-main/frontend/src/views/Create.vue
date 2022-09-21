<template>

<h1 class="mb-4 mt-3">Add Contact</h1>

<form class="row g-3" @submit.prevent="createContact">

<div class="col-md-8">

    <input class="form-control mb-2" type="text" required placeholder="First Name" v-model="first_name">
</div>
<div class="col-md-8">
    <input class="form-control mb-2" type="text" required placeholder="Last Name" v-model="last_name">
</div>

<div class="col-md-8">
    <input class="form-control mb-2" type="text" required placeholder="Email" v-model="email">
</div>
<div class="col-12">
    <router-link class="btn btn-outline-primary" to="/">Back</router-link>
</div>

<div class="col-12">

    <button class="btn btn-outline-primary">Create Contact</button>

</div>
</form>

</template>


<script>

export default {
  name: 'Create',
  data: function () {
    return { 
      first_name: '',
      last_name: '',
      email: ''
      }
  },

  methods: {
    createContact: async function () {
      const contact = {
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email
      }

      const response = await fetch ('http://contact-book-perr0493.test/api/contacts', {
        method: 'POST',
        body: JSON.stringify(contact),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      const json = await response.json()

      this.$router.push('/contact/' + json.id)
      
    }
  }
}

</script>


