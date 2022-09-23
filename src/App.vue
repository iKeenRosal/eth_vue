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
          <GameList v-if="newgames.length" :newgames="newgames" @fireEditForm="updateFormAppVue" @deleteRecord="deleteRecord"/>
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
            <EditGame @editgame-submitted="editGame" :currentGameData="currentGameData" :newgames="newgames" @fireEditFormSubmit="updateFormSubmitAppVue" @cancelUpdate="cancelUpdate"/>
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
    updateFormAppVue: function(currentgame) { 
      this.editAction = true;
      this.addAction = false;
      this.currentGameData = currentgame; //for now sending name. pass array later.
    },
    updateFormSubmitAppVue: function(currentgame) {
      this.currentGameData.publisher = currentgame['publisher'].value;
      this.currentGameData.name = currentgame['name'].value;
      this.currentGameData.nickname = currentgame['nickname'].value;
      this.currentGameData.rating = currentgame['rating'].value;
    },
    cancelUpdate: function() {
      this.editAction = false;
      this.addAction = true;
    },
    cancelAdd: function() {
      alert('nothing changes here');
    },
    deleteRecord: function(index) {
      this.rowCounter--;
      this.newgames.splice(index, 1);

      if(this.rowCounter==0)
      {
        this.hasGames = false;
      }
    },
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
