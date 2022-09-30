<template>
    <h1>Hi Hello Howdie</h1>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div>
            <GameList />
          </div>
        </div>
        <div class="col-lg-3 float-right">
          <div id="actionGameContainer" class="bg-light p-3 border">
            <SearchForm />
          </div>
          <hr class="" />
          <div id="actionGameContainer" class="bg-light p-3 border border-primary">
              <EditGame />
              <AddNewGame />
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
  // name: 'app',
  components: {
    AddNewGame,
    EditGame,
    SearchForm,
    GameList,
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
