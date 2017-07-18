<template>
    <div class="form-group">
      <input  @keyup="fetchData()" type="text" name="search" id="search" class="form-control" v-model="search" placeholder="Search by Corporator's name"></input>
      <span></span>
    <table class="table">
    <thead>
      <tr>
        <td>Name</td>
        <td>Party</td>
        <td>Area</td>
      </tr>
    </thead>
    <tbody  v-for="models in model.data">
    <tr>
      <td><a v-bind:href=" 'corporators/' + models.id">{{models.name}}</a></td>
      <td>{{models.party}}</td>
      <td>{{models.ward.name}}-{{models.area.name}}</td>
    </tr>
    </tbody>

    </table>
</div>

</template>

<script>
import axios from 'axios'
    export default {
        data() {
          return {
            model: {},
            search: '',
            url: 'search'

          }
        },
        created:function() {
         this.fetchData()
        },
        methods: {
        fetchData() {
          var vm = this
          axios.get(`${this.url}?search=${this.search}`)
            .then(function(response){
            Vue.set(vm.$data,'model',response.data.model)
            })
        }
      },

      }

</script>
