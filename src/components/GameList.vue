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
          <tr class="text-center" v-for="(newgame, index) in newgames" :key="index" >
            <!--td>{{ newgame.index }}</td-->
            <td>{{ newgame.publisher }}</td> <!-- plain text -->
            <td>{{ newgame.name }}</td>
            <td>{{ newgame.nickname }}</td>
            <td>{{ newgame.rating }}</td>
            <td><button class="text-success" @click='updateRowForm(index, newgame)'><i class="fa fa-edit"></i></button></td>
            <td><button class="text-danger" @click='removeRow(index)'><i class="fa fa-trash"></i></button></td>
          </tr>
        </tbody>
    </table>
</template>


<script>
export default {
  el: '#listOfGames',
  //name: 'GameList',
  //---------- Sorting and Pagination addition below -----------//
  // CURRENTLY DOESN"T WORK.. 
  data () {
    return {
      currentPage: 1,
      elementsPerPage: 2,
      ascending: false,
      sortColumn: '',
    }
  },
  methods: {
    updateRowForm: function(index, currentgame) {
      this.currentGame = currentgame;
      this.$emit('fireEditForm', currentgame);
    },
    removeRow: function(index) {
      this.$emit('deleteRecord', index);

    },
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
    newgames: {
      type: Array,
      required: true
    }
  },
}
</script>