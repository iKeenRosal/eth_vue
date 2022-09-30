//import Vue from 'vue';
import { createApp } from 'vue'
import Vuex from 'vuex';

createApp.use(Vuex);

export const store = new Vuex.Store({
    state: {
        editAction: false,
        addAction: true,
        hasGames: false,
        rowCounter: 0,
        searchedGames: [],
        currentGameData: [],
        allgames: [
            {index: 0, publisher: "Activision", name: "Saga", nickname: "top down", rating:"5"},
            {index: 1, publisher: "Roblox Corporation", name: "Roblox", nickname: "Nephew's Favorite Games", rating:"5"},
            {index: 2, publisher: "Moonton", name: "Mobile Legends: Bang Bang", nickname: "ML or MLBB - mobile multiplayer", rating:"5"},
        ]
    },
    // mutations: {
    // }
});