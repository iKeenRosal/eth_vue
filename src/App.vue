<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div>
          <h3>List of Games</h3>
            <div>
              <hr class="bg-info">
              <div class="alert alert-danger" v-if="errorMsg">
                  Keyword(s) was not found
              </div>
              <div class="alert alert-success" v-if="successMsg">
                  Keyword(s) found below
              </div>
          </div>
          <GameList v-if="newgames.length" :newgames="newgames" />
        </div>
      </div>
      <div class="col-lg-3 float-right">
        <div id="actionGameContainer" class="bg-light p-3 border">
          <SearchForm />
        </div>
        <hr class="" />
        <div id="actionGameContainer" class="bg-light p-3 border">
          <div v-if="editAction">
            <EditGame />
          </div>
          <div v-if="addAction">
            <AddNewGame @addgame-submitted="addGame" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddNewGame from './components/AddNewGame.vue'
import EditGame from './components/EditGame.vue'
import SearchForm from './components/SearchForm.vue'
import GameList from './components/GameList.vue'

export default {
  name: 'App',
  components: {
    AddNewGame,
    EditGame,
    SearchForm,
    GameList,
  },
  data () {
    return {
      editAction: false,
      addAction: true,
      newgames: []
    }
  },
  methods: {
   addGame(newgame) {
      this.newgames.push(newgame)
    }
  },
}

</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
