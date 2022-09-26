<template>
    <table id="listOfGames" class="table table-bordered table-stripped mr-20">
        <thead>
          <tr class="text-center bg-dark text-light">
            <!--th>Index</th-->
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
            <!--td>{{ game.index }}</td-->
            <td>{{ game.publisher }}</td> <!-- plain text -->
            <td>{{ game.name }}</td>
            <td>{{ game.nickname }}</td>
            <td>{{ game.rating }}</td>
            <td><button class="text-success" @click='updateRowForm(index, game)'><i class="fa fa-edit"></i></button></td>
            <td><button class="text-danger" @click='removeRow(index)'><i class="fa fa-trash"></i></button></td>
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
    }
  },
  methods: {
    onLoad() {
      console.log('');
      this.games = this.allgames;
//      if(this.searchedGames != null)
//      {
//        this.games = this.searchedGames;
//      }
    },
    updateRowForm: function(index, currentgame) {
      this.currentGame = currentgame;
      this.$emit('fireEditForm', currentgame);
    },
    removeRow: function(index) {
      this.$emit('deleteRecord', index);

    },
    //---------- Sorting and Pagination addition below -----------//
    // CURRENTLY DOESN"T WORK.. 
    "sortTable": function sortTable(col) {
      if (this.sortColumn === col) {
        this.ascending = !this.ascending;
      } else {
        this.ascending = true;
        this.sortColumn = col;
      }

      var ascending = this.ascending;

      this.rows.sort(function(a, b) {
        if (a[col] > b[col]) {
          return ascending ? 1 : -1
        } else if (a[col] < b[col]) {
          return ascending ? -1 : 1
        }
        return 0;
      })
    },
    "num_pages": function num_pages() {
      return Math.ceil(this.rows.length / this.elementsPerPage);
    },
    "get_rows": function get_rows() {
      var start = (this.currentPage-1) * this.elementsPerPage;
      var end = start + this.elementsPerPage;
      return this.rows.slice(start, end);
    },
    "change_page": function change_page(page) {
      this.currentPage = page;
    }
  },
  computed: {
    "columns": function columns() {
      if (this.rows.length == 0) {
        return [];
      }
      return Object.keys(this.rows[0])
    }
  },
  //---------- Sorting and Pagination addition above -----------//
  props: {
    allgames: {
      type: Array,
      required: true
    },
    searchedGames: {
      type: Array,
      required: true
    }
  },
   mounted: function() {
    this.onLoad();
  },
}
</script>