<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div>
          <h3>List of Games</h3>
            <div>
              <hr class="bg-info">
              <div class="alert alert-info" v-if="!hasGames">
                  There is currently no games in the list. Add a new game.
              </div>
              <div class="alert alert-danger" v-if="errorMsg">
                  Keyword(s) was not found
              </div>
              <div class="alert alert-success" v-if="successMsg">
                  Keyword(s) found below
              </div>
          </div>
          <GameList v-if="newgames.length" :newgames="newgames" @fireEditForm="updateFormAppVue"/>
        </div>
      </div>
      <div class="col-lg-3 float-right">
        <div id="actionGameContainer" class="bg-light p-3 border">
          <SearchForm />
        </div>
        <hr class="" />
        <div id="actionGameContainer" class="bg-light p-3 border border-primary">
          <div v-if="editAction">
            <!-- EditGame @editgame-submitted="editGame" v-if="currentGameData.array" :currentGameData="currentGameData"/ -->
            <EditGame @editgame-submitted="editGame" :currentGameData="currentGameData"/>
          </div>
          <div v-if="addAction">
            <AddNewGame @addgame-submitted="addGame" :newgames="newgames"/>
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
      hasGames: false,
      rowCounter: 0,
      currentGameData: [],
      newgames: []
    }
  },
  methods: {
   addGame(newgame) {
      this.newgames.push(newgame);
      this.hasGames = true;
      this.rowCounter++;
    },
    newgameDuplicationChecker() {

    }, 
    editGame(currentgame) {
      alert('edit game submission from App.vue : ' + currentgame.name + ' / ' + currentgame.name);
    },
    updateFormAppVue: function(currentgame) { 
      this.editAction = true;
      this.addAction = false;
      this.currentGameData = currentgame; //for now sending name. pass array later.
    },
  //-----------------START OF ROW DELETION ATTEMPT -------------//
    removeRow: function(index) {
      alert('about to delete this row');
      this.rowCounter--;
      this.newgames.splice(index, 1);
    },
    //-----------------END OF ROW DELETION ATTEMPT -------------//
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
