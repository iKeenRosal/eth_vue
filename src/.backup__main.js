import Vue from 'vue'
// import App from './App'
//import router from './router'


require('./assets/css/styles.css');

const app = Vue.createApp({
  data () {
    return {
      errorMsg: false,
      successMsg: false
    }
  }
});





  
/*



  var sixthTable = new Vue({
    el: '#sixthTable',
    data () {
        return {
            currentPage: 1,
            elementsPerPage: 3,
            ascending: false,
            sortColumn: '',
            rows: [
              { publisher: 'Pone', name: "Chandler Game", nickname: 'Pone Chandler Game', rating: '5' },
              { publisher: 'Ptwo', name: "Ross Game", nickname: 'Ptwo Ross Game', rating: '4' },
              { publisher: 'Pthree', name: "Rachel Game", nickname: 'Pthree Rachel Game', rating: '4'},
              { publisher: 'Pfour', name: "Monica Game", nickname: 'Pfour Monica Game', rating: '4' },
              { publisher: 'Pfive', name: "Joey Game", nickname: 'Pfive Joey Game', rating: '3' },
              { publisher: 'Psix', name: "Joey Game", nickname: 'Psix Joey Game', rating: '1' }
            ]
        }
    },
    methods: {
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
    }
  });
  
  //*/