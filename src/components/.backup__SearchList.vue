<template>
    This is inside SearchList.vue
    <table id="thirdTable">
      <thead>
        <tr>
          <th v-for="col in columns">{{col}}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="row in rows">
          <td v-for="col in columns">{{row[col]}}</td>
        </tr>
      </tbody>
    </table>
</template>

  var thirdTable = new Vue({
    el: '#thirdTable',
    data: {
      rows: [
        { id: 1, name: "Chandler Bing", phone: '305-917-1301', profession: 'IT Manager' },
        { id: 2, name: "Ross Geller", phone: '210-684-8953', profession: 'Paleontologist' },
        { id: 3, name: "Rachel Green", phone: '765-338-0312', profession: 'Waitress'},
        { id: 4, name: "Monica Geller", phone: '714-541-3336', profession: 'Head Chef' },
        { id: 5, name: "Joey Tribbiani", phone: '972-297-6037', profession: 'Actor' },
        { id: 6, name: "Phoebe Buffay", phone: '760-318-8376', profession: 'Masseuse' }
      ]
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


<style>
  table {
    font-family: 'Open Sans', sans-serif;
    width: 750px;
    border-collapse: collapse;
    border: 3px solid #44475C;
    margin: 10px 10px 0 10px;
  }

  table th {
    text-transform: uppercase;
    text-align: left;
    background: #44475C;
    color: #FFF;
    padding: 8px;
    min-width: 30px;
  }

  table td {
    text-align: left;
    padding: 8px;
    border-right: 2px solid #7D82A8;
  }
  table td:last-child {
    border-right: none;
  }
  table tbody tr:nth-child(2n) td {
    background: #D4D8F9;
  }
</style>