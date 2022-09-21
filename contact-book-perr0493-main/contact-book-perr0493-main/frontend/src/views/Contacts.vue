<template>

<h1 class="mb-5 mt-3 display-2">Contact Book</h1>
<form @submit.prevent>
    <input class="mb-3 " type="text" placeholder="search" v-model="search">
     <router-link class="btn btn-outline-primary p-1 ms-5" to="/Create">New Contact</router-link>
</form>

<!-- New Contact -->
   


<router-link v-for="contact in filteredContacts.sort((a, b) => (a.last_name > b.last_name) ? 1 : -1)"
:key="contact.id"
:to="'/contact/' + contact.id">
<div class="card m-4">
    <h2>{{contact.first_name}} {{contact.last_name}}</h2>
</div>
</router-link>


</template>


<script>

export default {
  name: 'Contacts',
  data: function () {
    return { 
      contacts: [],
      search: ''
      }
  },

  created: async function () {
    const response = await fetch('http://contact-book-perr0493.test/api/contacts')
    const contacts = await response.json()

    this.contacts = contacts
  },

  computed: {
    filteredContacts: function () {
      return this.contacts.filter(contact => contact.first_name.toLowerCase().includes(this.search.toLowerCase()) || contact.last_name.toLowerCase().includes(this.search.toLowerCase()) || contact.email.toLowerCase().includes(this.search.toLowerCase()) )
    }
  }

}
</script>






<style>



</style>