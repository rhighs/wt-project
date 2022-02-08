import fetch from "node-fetch";
import pg from "pg";
const { Client } = pg;

import dotenv from "dotenv";
dotenv.config({ path: "../.env" });

const fetchSkins = async (maxItems) => {
    const skins = async (offset, limit) => {
        let buildUrl = (offset) =>
            `https://inventories.cs.money/5.0/load_bots_inventory/730?buyBonus=40&isStore=true&limit=${limit}&maxPrice=10000&minPrice=1&offset=${offset}&withStack=true`;
        return fetch(buildUrl(offset))
            .then(res => res.json());
    };

    let i = 0;
    let step = 60;
    let foundItems = [];

    while (foundItems.length < maxItems) {
        let newItems = (await skins(i, step)).items;

        newItems = newItems.filter(newItem => 
            !foundItems.find(item => item.fullName === newItem.fullName)
            && !newItems.find(item => item.fullName === newItem.fullName && item.id !== newItem.id));

        newItems = newItems.filter(async newItem => {
            return await fetch(newItem.img)
                .then(response => response.status === 200);
        });

        foundItems = [...foundItems, ...newItems];
        console.log("Items fetched: ", foundItems.length);
        i += step;
    }

    return foundItems.map(item => ({
        id: item.id,
        image: item.img,
        price: item.price,
        fullName: item.fullName,
        rarity: item.rarity,
        link3d: item["3d"]
    }));
};

// Populate the skins table
(async () => {
    const client = new Client({
        user: process.env.DB_USERNAME,
        host: process.env.DB_HOST,
        database: process.env.DB_DATABASE,
        password: process.env.DB_PASSWORD,
        port: process.env.DB_PORT,
    });

    await fetchSkins(500).then(items => {
        client.connect();

        const queryString = `INSERT INTO skin(id, name, imagelink, link3d, price, rarity) values ($1, $2, $3, $4, $5, $6)`;
        const queryValues = (item) => [item.id, item.fullName, item.image, item.link3d, parseInt(item.price), item.rarity];

        items.forEach(item =>
            client.query(queryString, queryValues(item), (err, res) => {
                if (err) {
                    console.log(err);
                }
            }));
    });

    client.end();
})();
