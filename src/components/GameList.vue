<template>
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
    <table id="listOfGames" class="table table-bordered table-stripped mr-20">
        <thead>
          <tr class="text-center bg-dark text-light">
            <th>Index</th>
            <th>Publisher</th>
            <th>Name</th>
            <th>Nickname</th>
            <th>Rating</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center" v-for="(game, index) in games" :key="index" >
            <td>{{ game.index }}</td>
            <td>{{ game.publisher }}</td> 
            <td>{{ game.name }}</td>
            <td>{{ game.nickname }}</td>
            <td>{{ game.rating }}</td>
            <td><button class="text-success" @click='editGame(game)'><i class="fa fa-edit"></i></button></td>
            <td><button class="text-danger" @click='deleteGame(index)'><i class="fa fa-trash"></i></button></td>
          </tr>
        </tbody>
    </table>
</template>


<script>
export default {
  el: '#listOfGames',
  //name: 'GameList',
  data () {
    return {
      games: [],
      currentPage: 1,
      elementsPerPage: 2,
      ascending: false,
      sortColumn: '',
      gamesSearched: '',
      hasGames: false,
      errorMsg: false,
      successMsg: false,
    }
  },
  methods: {
    onLoad: function() {
      this.games = this.$store.state.allgames;
      if (this.$store.state.allgames != null) {
        this.$store.state.hasGames = true;
        this.hasGames = true;
      }
      this.$store.state.rowCounter = this.$store.state.allgames.length;
    },
    editGame: function(currentgame) {
      this.currentGame = currentgame;
      this.$store.state.currentGameData = currentgame; 
      this.$store.state.editAction = true;
      this.$store.state.addAction = false;
    },
    deleteGame: function(index) {
      this.$store.state.rowCounter--;
      this.$store.state.allgames.splice(index, 1);

      if (this.$store.state.rowCounter==0) {
        this.$store.state.hasGames = false;
      }
    },
    //---------- Sorting and Pagination addition below -----------//
    // CURRENTLY DOESN"T WORK.. 
  //   "sortTable": function sortTable(col) {
  //     if (this.sortColumn === col) {
  //       this.ascending = !this.ascending;
  //     } else {
  //       this.ascending = true;
  //       this.sortColumn = col;
  //     }

  //     var ascending = this.ascending;

  //     this.rows.sort(function(a, b) {
  //       if (a[col] > b[col]) {
  //         return ascending ? 1 : -1
  //       } else if (a[col] < b[col]) {
  //         return ascending ? -1 : 1
  //       }
  //       return 0;
  //     })
  //   },
  //   "num_pages": function num_pages() {
  //     return Math.ceil(this.rows.length / this.elementsPerPage);
  //   },
  //   "get_rows": function get_rows() {
  //     var start = (this.currentPage-1) * this.elementsPerPage;
  //     var end = start + this.elementsPerPage;
  //     return this.rows.slice(start, end);
  //   },
  //   "change_page": function change_page(page) {
  //     this.currentPage = page;
  //   }
  },
  computed: {
    // "columns": function columns() {
    //   if (this.rows.length == 0) {
    //     return [];
    //   }
    //   return Object.keys(this.rows[0])
    // },
    allgames() {
      return this.$store.state.allgames;
    },
    searchedGames() {
      return this.$store.state.searchedGames;
    }
  },
  //---------- Sorting and Pagination addition above -----------//
   mounted: function() {
    this.onLoad();
  },
}
</script>